<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'request';
				$data['title'] = 'Form Request Managements';
				$data['user'] = $user;
				$data['request'] = $this->m_request->getRequest();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/form-request', $data);
				$this->load->view('include/footer');
				
			} else if ($user['role_id'] == 3) {
				$data['menu'] = 'request';
				$data['title'] = 'Form Request Managements';
				$data['user'] = $user;
				$data['request'] = $this->m_request->getRequest();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/mgr-sidebar', $data);
				$this->load->view('manager/form-request', $data);
				$this->load->view('include/footer');

			} else {
				$data['menu'] = 'request';
				$data['title'] = 'Form Request Managements';
				$data['user'] = $user;
				$data['request'] = $this->m_request->getRequest();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/user-sidebar', $data);
				$this->load->view('user/form-request', $data);
				$this->load->view('include/footer');
				
			}
		}
		
	}

	public function addRequest()
	{
		$data = [
			'name' => $this->input->post('name'),
			'dept' => $this->input->post('dept'),
			'position' => $this->input->post('position'),
			'material' => $this->input->post('material'),
			'product_name' => $this->input->post('product_name'),
			'spec' => $this->input->post('spec'),
			'brand' => $this->input->post('brand'),
			'qty' => $this->input->post('qty'),
			'allocation' => $this->input->post('allocation'),
			'note' => $this->input->post('note'),
			'is_approved' => 0,
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_request->save($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request created successfully!</div>');
		redirect('request');
	}

	public function editRequest()
	{
		$id = $this->input->post('id');
		$data = [
			'name' => $this->input->post('name'),
			'dept' => $this->input->post('dept'),
			'position' => $this->input->post('position'),
			'material' => $this->input->post('material'),
			'product_name' => $this->input->post('product_name'),
			'spec' => $this->input->post('spec'),
			'brand' => $this->input->post('brand'),
			'qty' => $this->input->post('qty'),
			'allocation' => $this->input->post('allocation'),
			'note' => $this->input->post('note'),
			'is_approved' => $this->input->post('is_approved'),
			'updatedAt' => date('Y-m-d'),
			'updatedBy' => $this->session->userdata('username')
		];
		$this->m_request->update($data, $id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request updated successfully!</div>');
		redirect('request');
	}

	public function delRequest($id)
	{	
		$this->m_request->delete($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request deleted successfully!</div>');
		redirect('request');
	}

	public function exportExcel()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
							->setLastModifiedBy('My Notes Code')
							->setTitle("Data Permintaan")
							->setSubject("Permintaan")
							->setDescription("Laporan Semua Data Permintaan")
							->setKeywords("Data Permintaan");
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
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PERMINTAAN ASSET - ".$tanggal); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		$excel->setActiveSheetIndex(0)->setCellValue('A2', "Laporan Data Permintaan Asset IT PT Iron Bird"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A2:I2'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A4', "NO"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B4', "Employee"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C4', "Dept"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D4', "Position"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E4', "Material Name");
		$excel->setActiveSheetIndex(0)->setCellValue('F4', "Speck/ Type");
		$excel->setActiveSheetIndex(0)->setCellValue('G4', "Description"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H4', "Brand"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I4', "Qty"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J4', "Allocation");
		$excel->setActiveSheetIndex(0)->setCellValue('K4', "Note");

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$form_request = $this->m_request->getRequest();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($form_request as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->name);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->dept);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->position);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->material);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->product_name);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->spec);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->brand);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->qty);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->allocation);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->note);
		
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Permintaan Asset");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Permintaan Asset.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

}

/* End of file Controllername.php */
