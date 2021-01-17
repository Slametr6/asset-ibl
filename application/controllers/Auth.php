<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('admin/user');
		} 

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = 'login';
			$data['title'] = 'Login Page';
			$this->load->view('include/auth-header', $data);
			$this->load->view('auth/login');
			$this->load->view('include/auth-footer');

		} else {
			$this->_cekLogin();
		}
	}

	private function _cekLogin()
	{
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		//jika user ada
		if ($user) {
			//jika user aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($pass, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);

					if ($user['role_id'] == 1) {
						redirect('admin');

					} else {
						redirect('user');
					}

				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not activating!</div>');
				redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout successfully</div>');
		redirect('auth');
	}

	
	public function addUser()
	{
		$this->form_validation->set_rules('user', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[password1]');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Username must be unique!</div>');
			redirect('admin/user');

		} else {
			$data = [
				'user' => htmlspecialchars($this->input->post('user', TRUE)),
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'image' => 'avatar.png',
				'role_id' => 2,
				'is_active' => 1,
				'createdat' => date('Y-m-d'),
				'createdby' => $this->session->userdata('username')
			];
			$this->m_auth->save($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation account created successfully!</div>');
			redirect('admin/user');
		}
	}

	public function editUser()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();
		$this->form_validation->set_rules('user', 'Full name', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/user');

		} else {
			$upload_img = $_FILES['image']['name'];

			if ($upload_img) {
				$config['upload_path'] = 'assets/images/profile/';
				$config['allowed_types'] = 'jpg|gif|png|jpeg|JPG|PNG';
				$config['max_size'] = '1024';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$def_img = $user['image'];
					if ($def_img != 'avatar.png') {
						unlink(FCPATH.'assets/images/profile/'.$def_img);
					}
					$new_img = $this->upload->data('file_name');
					$this->db->set('image', $new_img);

				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				'user' => htmlspecialchars($this->input->post('user', TRUE)),
				'username' => htmlspecialchars($this->input->post('username', TRUE)),
				'role_id' => htmlspecialchars($this->input->post('role_id', TRUE)),
				'is_active' => htmlspecialchars($this->input->post('is_active', TRUE)),
				'email' => htmlspecialchars($this->input->post('email', TRUE)),
				'updatedat' => date('Y-m-d'),
				'updatedby' => $username
			];
			$id = $this->input->post('user_id');
			$this->m_auth->update($data, $id);
			// var_dump($data, $id);			
			
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User updated successfully!</div>');
			redirect('admin/user');
		}
		
	}

	public function delUser($id)
	{
		$this->m_auth->delete($id);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User deleted successfully!</div>');
		redirect('admin/user');
	}

	public function changePassword()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();
		
		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
		$this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[5]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm Password', 'trim|required|matches[new_password1]');
		
		if ($this->form_validation->run() == FALSE) {
			if($user['role_id'] == 1) {
				redirect('admin');

			} else {
				redirect('user');
			}

		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $user['password'])) {
				if($user['role_id'] == 1) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
					redirect('admin');
	
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
					redirect('user');
				}

			} else {
				// password tidak boleh sama
				if ($current_password == $new_password) {
					if($user['role_id'] == 1) {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password must be diferent from current password!</div>');
						redirect('admin');
		
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password must be diferent from current password!</div>');
						redirect('user');
					}

				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$password = $this->input->post('password', $password_hash);

					$this->db->set('password', $password_hash)
								->where('username', $username)
								->update('users');

					if($user['role_id'] == 1) {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed successfully</div>');
						redirect('admin');

					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed successfully</div>');
						redirect('user');
					}

				}
			}
		}
		
	}

	public function resetPassword()
	{
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[5]|matches[password1]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password failed to reset!</div>');
			redirect('admin/user');
			
		} else {
			$id = $this->input->post('user_id');
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

			$this->db->set('password', $password)
						->where('user_id', $id)
						->update('users');

			// var_dump($id, $password);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been reseted!</div>');
			redirect('admin/user');

		}
	}

	public function exportExcel(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
							->setLastModifiedBy('My Notes Code')
							->setTitle("Data User")
							->setSubject("User")
							->setDescription("Laporan Semua Pengguna Aplikasi Asset IBL")
							->setKeywords("Data Asset");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = [
		  	'font' => ['bold' => true], // Set font nya jadi bold
			'alignment' => [
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['style'  => PHPExcel_Style_Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['style'  => PHPExcel_Style_Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['style'  => PHPExcel_Style_Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
			'alignment' => [
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['style'  => PHPExcel_Style_Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['style'  => PHPExcel_Style_Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['style'  => PHPExcel_Style_Border::BORDER_THIN] // Set border left dengan garis tipis
		  	]
		];
		$tanggal = date('d-m-Y');
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA USER - ".$tanggal); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		$excel->setActiveSheetIndex(0)->setCellValue('A2', "Laporan Data User Pengguna Aplikasi Aset IBL"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A2:I2'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A4', "NO"); // Set kolom A4 dengan tulisan NO
		$excel->setActiveSheetIndex(0)->setCellValue('B4', "Name"); // Set kolom B4 dengan tulisan Name
		$excel->setActiveSheetIndex(0)->setCellValue('C4', "Username"); // Set kolom C4 dengan tulisan Username
		$excel->setActiveSheetIndex(0)->setCellValue('D4', "Imange"); // Set kolom D4 dengan tulisan Imange
		$excel->setActiveSheetIndex(0)->setCellValue('E4', "Role"); // Set kolom E4 dengan tulisan Role
		$excel->setActiveSheetIndex(0)->setCellValue('F4', "Is Active"); // Set kolom F4 dengan tulisan Is Active
		$excel->setActiveSheetIndex(0)->setCellValue('G4', "Email"); // Set kolom G4 dengan tulisan Email

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$user = $this->m_auth->getUser();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($user as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->user);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->username);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->image);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->role_id);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->is_active);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->email);
		
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom F
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom G
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data User");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data User.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
	
	public function printPDF(){

		$tanggal = date('d-m-Y');
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(150, 8, 'DATA USER - '.$tanggal, 0, 1, 'L');
        $pdf->SetFont('Arial','B',12);
		$pdf->Cell(150, 8, 'Laporan Data User Pengguna Aplikasi Aset IBL', 0, 1, 'L');
		$pdf->SetAutoPageBreak(true, 0);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 8,'',0, 1);
        $pdf->SetFont('Arial','B', 9);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(30, 8, "Name", 1, 0, 'C');
        $pdf->Cell(30, 8, "Username", 1, 0, 'C');
        $pdf->Cell(30, 8, "Image", 1, 0, 'C');
		$pdf->Cell(30, 8, "Role", 1, 0, 'C');
        $pdf->Cell(30, 8, "Is Active", 1, 0, 'C');
        $pdf->Cell(30, 8, "Email", 1, 1, 'C');
		
		$pdf->SetFont('Arial','', 9);
		$users = $this->m_auth->getUser();
		$no = 1;
        foreach ($users as $user){
            $pdf->Cell(10, 8, $no, 1, 0, 'C');
			$pdf->Cell(30, 8, $user->user, 1, 0, 'C');
        	$pdf->Cell(30, 8, $user->username, 1, 0, 'C');
        	$pdf->Cell(30, 8, $user->image, 1, 0, 'C');
        	$pdf->Cell(30, 8, $user->role_id, 1, 0, 'C');
        	$pdf->Cell(30, 8, $user->is_active, 1, 0, 'C');
        	$pdf->Cell(30, 8, $user->email, 1, 1, 'C');
			// $pdf->Ln();
			$no++;
		}

		ob_end_clean();
		$pdf->Output('Data User - '.$tanggal.'.pdf', 'I');
		
	}

}
