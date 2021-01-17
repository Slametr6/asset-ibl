<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		$checkId = $this->m_asset->checkNoEq();
		$getId = substr($checkId, 3, 4);
		$idNow = $getId+1;
		$data = array('no_eq' => $idNow);

		if ($username == '') {
			redirect('auth');
			
		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'asset';
				$data['title'] = 'Asset Managements';
				$data['user'] = $user;
				$data['asset'] = $this->m_asset->getAsset();
				$data['cat'] = $this->m_asset->getCat();
				$data['location'] = $this->m_asset->getLocation();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/asset', $data);
				$this->load->view('include/footer');
				
			} else {
				$data['menu'] = 'asset';
				$data['title'] = 'Asset Managements';
				$data['user'] = $user;
				$data['asset'] = $this->m_asset->getAsset();
				$data['cat'] = $this->m_asset->getCat();
				$data['location'] = $this->m_asset->getLocation();

				$this->load->view('include/header', $data);
				$this->load->view('include/user-sidebar', $data);
				$this->load->view('user/asset', $data);
				$this->load->view('include/footer');
			}
		}
		
	}

	public function addAsset()
	{
		$this->m_asset->checkNoEq();
		$data = [
			'category' => $this->input->post('category'),
			'no_eq' => $this->input->post('eq_code'),
			'no_asset' => $this->input->post('no_asset'),
			'sn' => $this->input->post('sn'),
			'descript' => $this->input->post('descript'),
			'location' => '300001',
			'conditions' => 'ok',
			'status' => 'not_use',
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_asset->save($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Asset created successfully!</div>');
		redirect('asset');
	}

	public function editAsset()
	{
		$data = [
			'category' => $this->input->post('category'),
			'no_eq' => $this->input->post('no_eq'),
			'no_asset' => $this->input->post('no_asset'),
			'sn' => $this->input->post('sn'),
			'descript' => $this->input->post('descript'),
			'location' => $this->input->post('location'),
			'conditions' => $this->input->post('conditions'),
			'status' => $this->input->post('status'),
			'updatedAt' => date('Y-m-d'),
			'updatedBy' => $this->session->userdata('username')
		];
		$id = $this->input->post('asset_id');
		$this->m_asset->update($data, $id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Asset updated successfully!</div>');
		redirect('asset');
	}

	public function delAsset($id)
	{	
		$this->m_asset->delete($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Asset deleted successfully!</div>');
		redirect('asset');
	}

	public function exportExcel(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
							->setLastModifiedBy('My Notes Code')
							->setTitle("Data Asset")
							->setSubject("Asset")
							->setDescription("Laporan Semua Data Asset")
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
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA ASSET - ".$tanggal); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		$excel->setActiveSheetIndex(0)->setCellValue('A2', "Laporan Data Asset IT PT Iron Bird"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A2:I2'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A4', "NO"); // Set kolom A4 dengan tulisan NO
		$excel->setActiveSheetIndex(0)->setCellValue('B4', "Category"); // Set kolom B4 dengan tulisan Category
		$excel->setActiveSheetIndex(0)->setCellValue('C4', "No EQ"); // Set kolom C4 dengan tulisan No EQ
		$excel->setActiveSheetIndex(0)->setCellValue('D4', "No Asset"); // Set kolom D4 dengan tulisan No Asset
		$excel->setActiveSheetIndex(0)->setCellValue('E4', "SN"); // Set kolom E4 dengan tulisan SN
		$excel->setActiveSheetIndex(0)->setCellValue('F4', "Desc"); // Set kolom F4 dengan tulisan Desc
		$excel->setActiveSheetIndex(0)->setCellValue('G4', "Location"); // Set kolom G4 dengan tulisan Location
		$excel->setActiveSheetIndex(0)->setCellValue('H4', "Condition"); // Set kolom H4 dengan tulisan Condition
		$excel->setActiveSheetIndex(0)->setCellValue('I4', "Status"); // Set kolom I4 Iengan tulisan Status

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

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$asset = $this->m_asset->getAsset();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($asset as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->category);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->no_eq);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->no_asset);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->sn);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->descript);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->location);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->conditions);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->status);
		
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
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Asset");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Asset.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
	
	public function cetakPDF(){

		$tanggal = date('d-m-Y');
		$pdf = new FPDF('L','mm','Legal');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(300, 8, 'DATA ASSET - '.$tanggal, 0, 1, 'L');
        $pdf->SetFont('Arial','B',12);
		$pdf->Cell(300, 8, 'Laporan Data Asset IT PT Iron Bird', 0, 1, 'L');
		$pdf->SetAutoPageBreak(true, 0);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 8,'',0, 1);
        $pdf->SetFont('Arial','B', 9);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(40, 8, "Category", 1, 0, 'C');
        $pdf->Cell(20, 8, "No EQ", 1, 0, 'C');
        $pdf->Cell(30, 8, "No Asset", 1, 0, 'C');
		$pdf->Cell(25, 8, "SN", 1, 0, 'C');
        $pdf->Cell(145, 8, "Desc", 1, 0, 'C');
        $pdf->Cell(20, 8, "Location", 1, 0, 'C');
        $pdf->Cell(20, 8, "Condition", 1, 0, 'C');
		$pdf->Cell(20, 8, "Status", 1, 1, 'C');
		
		$pdf->SetFont('Arial','', 9);
		$assets = $this->m_asset->getAsset();
		$no = 1;
        foreach ($assets as $asset){
            $pdf->Cell(10, 8, $no, 1, 0, 'C');
			$pdf->Cell(40, 8, $asset->category, 1, 0, 'C');
        	$pdf->Cell(20, 8, $asset->no_eq, 1, 0, 'C');
        	$pdf->Cell(30, 8, $asset->no_asset, 1, 0, 'C');
        	$pdf->Cell(25, 8, $asset->sn, 1, 0, 'C');
        	$pdf->Cell(145, 8, $asset->descript, 1, 0, '');
        	$pdf->Cell(20, 8, $asset->location, 1, 0, 'C');
        	$pdf->Cell(20, 8, $asset->conditions, 1, 0, 'C');
			$pdf->Cell(20, 8, $asset->status, 1, 1, 'C');
			// $pdf->Ln();
			$no++;
			
		}

		ob_end_clean();
		$pdf->Output('Data Asset - '.$tanggal.'.pdf', 'I');
		
	}

	public function userAsset()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');
			
		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'user-asset';
				$data['title'] = 'User Asset Managements';
				$data['user'] = $user;
				$data['userasset'] = $this->m_asset->getUserAsset();
				$data['unit'] = $this->m_asset->getUnit();
				$data['asset'] = $this->m_asset->getAsset();
				$data['employe'] = $this->m_employe->getEmploye();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/user-asset', $data);
				$this->load->view('include/footer');
				
			} else {
				$data['menu'] = 'asset';
				$data['title'] = 'Asset Managements';
				$data['user'] = $user;
				$data['userasset'] = $this->m_asset->getUserAsset();
				$data['unit'] = $this->m_asset->getUnit();
				$data['asset'] = $this->m_asset->getAsset();
				$data['employe'] = $this->m_employe->getEmploye();
				
				$this->load->view('include/header', $data);
				$this->load->view('include/user-sidebar', $data);
				$this->load->view('user/user-asset', $data);
				$this->load->view('include/footer');
			}
		}
		
	}

	public function addUserAsset()
	{
		$data = [
			'category' => $this->input->post('category'),
			'no_eq' => $this->input->post('eq_code'),
			'no_asset' => $this->input->post('no_asset'),
			'sn' => $this->input->post('sn'),
			'descript' => $this->input->post('descript'),
			'nik' => $this->input->post('nik'),
			'emp_name' => $this->input->post('emp_name'),
			'gender' => $this->input->post('gender'),
			'dept' => $this->input->post('dept'),
			'branch' => $this->input->post('branch'),
			'location' => $this->input->post('location'),
			'qty' => $this->input->post('qty'),
			'unit_id' => $this->input->post('unit_id'),
			'conditions' => $this->input->post('conditions'),
			'status' => $this->input->post('status'),
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_asset->saveUserAsset($data);
		var_dump($data);

		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User asset created successfully!</div>');
		// redirect('asset/userasset');
	}

	public function editUserAsset()
	{
		$data = [
			'category' => $this->input->post('category'),
			'no_eq' => $this->input->post('eq_code'),
			'no_asset' => $this->input->post('no_asset'),
			'sn' => $this->input->post('sn'),
			'descript' => $this->input->post('descript'),
			'nik' => $this->input->post('nik'),
			'emp_name' => $this->input->post('emp_name'),
			'gender' => $this->input->post('gender'),
			'dept' => $this->input->post('dept'),
			'branch' => $this->input->post('branch'),
			'location' => $this->input->post('location'),
			'qty' => $this->input->post('qty'),
			'unit_id' => $this->input->post('unit_id'),
			'conditions' => $this->input->post('conditions'),
			'status' => $this->input->post('status'),
			'updatedAt' => date('Y-m-d'),
			'updatedBy' => $this->session->userdata('username')
		];
		$id = $this->input->post('userasset_id');
		$this->m_asset->updateUserAsset($data, $id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User asset updated successfully!</div>');
		redirect('asset/userasset');
	}

	public function delUserAsset($id)
	{	
		$this->m_asset->deleteUserAsset($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User asset deleted successfully!</div>');
		redirect('asset/userasset');
	}

	public function Category()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		$checkId = $this->m_asset->checkCatId();
		$getId = substr($checkId, 2, 4);
		$idNow = $getId+1;
		$data = array('cat_id' => $idNow);

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'category';
				$data['title'] = 'Category Managements';
				$data['user'] = $user;
				$data['category'] = $this->m_asset->getCat();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/category', $data);
				$this->load->view('include/footer');
				
			} else {
				redirect('user');
			}
		}
		
	}

	public function addCat()
	{
		$this->m_asset->checkCatId();
		$data = [
			'cat_id' => $this->input->post('cat_code'),
			'cat_name' => $this->input->post('cat_name'),
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_asset->saveCat($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category created successfully!</div>');
		redirect('asset/category');
	}

	public function delCat($id)
	{	
		$this->m_asset->delCat($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category deleted successfully!</div>');
		redirect('asset/category');
	}

	public function Location()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		$checkId = $this->m_asset->checkLocationId();
		$getId = substr($checkId, 2, 4);
		$idNow = $getId+1;
		$data = array('location_id' => $idNow);

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'location';
				$data['title'] = 'Location Managements';
				$data['user'] = $user;
				$data['location'] = $this->m_asset->getLocation();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/location', $data);
				$this->load->view('include/footer');
				
			} else {
				redirect('user');
			}
		}
		
	}

	public function addLocation()
	{
		$this->m_asset->checkLocationId();
		$data = [
			'location_id' => $this->input->post('location_code'),
			'description' => $this->input->post('description'),
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_asset->saveLocation($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Location created successfully!</div>');
		redirect('asset/location');
	}

	public function delLocation($id)
	{	
		$this->m_asset->delLocation($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Location deleted successfully!</div>');
		redirect('asset/location');
	}

	public function Unit()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'unit';
				$data['title'] = 'Unit Managements';
				$data['user'] = $user;
				$data['unit'] = $this->m_asset->getUnit();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/unit', $data);
				$this->load->view('include/footer');
				
			} else {
				redirect('user');
			}
		}
		
	}

	public function addUnit()
	{
		$data = [
			'unit' => $this->input->post('unit'),
			'description' => $this->input->post('description'),
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_asset->saveUnit($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Unit created successfully!</div>');
		redirect('asset/unit');
	}

	public function delUnit($id)
	{	
		$this->m_asset->delUnit($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Unit deleted successfully!</div>');
		redirect('asset/unit');
	}

}

/* End of file Asset.php */
