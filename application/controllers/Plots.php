<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plots extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_posisi');
		$this->load->model('M_pegawai');
		$this->dataCustomers = $this->M_pegawai->select_all();
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPosisi'] = $this->M_posisi->select_all();
	

		$data['page'] 		= "posisi";
		$data['judul'] 		= "Plots Data";
		$data['deskripsi'] 	= "Manage Data Plots";
		$data['modal_tambah_posisi'] = show_my_modal('modals/modal_tambah_posisi', 'tambah-posisi', $data);
		// echo '<pre>'; print_r($data); exit();
		$this->template->views('plots/home', $data);

	}

	public function tampil() {
		$data['dataPosisi'] = $this->M_posisi->select_all();
		$this->load->view('plots/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('customer_id', 'Customer', 'trim|required');
		$this->form_validation->set_rules('owner_name', 'Owner Name', 'trim|required');
		$this->form_validation->set_rules('address1', 'Address1', 'trim|required');
		// $this->form_validation->set_rules('address2', 'Address2', 'trim|required');
		// $this->form_validation->set_rules('plot_no', 'Plot No', 'trim|required');
		$this->form_validation->set_rules('survey_no', 'Survey No', 'trim|required');
		$this->form_validation->set_rules('village', 'Village', 'trim|required');
		$this->form_validation->set_rules('mandal', 'Mandal', 'trim|required');
		$this->form_validation->set_rules('district', 'District', 'trim|required');
		$this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');
		$this->form_validation->set_rules('authority', 'Authority', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		//$this->form_validation->set_rules('lat', 'Latitude', 'trim|required');
		//$this->form_validation->set_rules('lag', 'Longitude', 'trim|required');
		//$this->form_validation->set_rules('plot_map', 'Plot Map', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/plot_map/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';			
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('plot_map')){
				$error = array('error' => $this->upload->display_errors());

				// echo '<pre>'; print_r($error); exit();
				
			}
			else{
				$data_plot_map = $this->upload->data();
				$data['plot_map'] = $data_plot_map['file_name'];
				// echo '<pre>'; print_r($data); exit();
			}

			$result = $this->M_posisi->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Successfully Added Plot Data.', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Failed Plot Data added', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;
		$id= trim($_POST['id']);
		$data['dataPosisi'] = $this->M_posisi->select_by_id($id);
		echo show_my_modal('modals/modal_update_posisi', 'update-posisi', $data);
	}

	public function prosesUpdate() {

		$this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|required');
		$this->form_validation->set_rules('owner_name', 'Owner Name', 'trim|required');
		$this->form_validation->set_rules('address1', 'Address1', 'trim|required');
		// $this->form_validation->set_rules('address2', 'Address2', 'trim|required');
		// $this->form_validation->set_rules('plot_no', 'Plot No', 'trim|required');
		$this->form_validation->set_rules('survey_no', 'Survey No', 'trim|required');
		$this->form_validation->set_rules('village', 'Village', 'trim|required');
		$this->form_validation->set_rules('mandal', 'Mandal', 'trim|required');
		$this->form_validation->set_rules('district', 'District', 'trim|required');
		$this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');
		$this->form_validation->set_rules('authority', 'Authority', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		//$this->form_validation->set_rules('lat', 'Latitude', 'trim|required');
		//$this->form_validation->set_rules('lag', 'Longitude', 'trim|required');
		//$this->form_validation->set_rules('plot_map', 'Plot Map', 'required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');


		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = 'assets/plot_map/';
			$config['allowed_types'] = 'jpg|gif|png|jpeg|JPG|PNG|JPEG';			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('plot_map')){
				$error = array('error' => $this->upload->display_errors());
				//$data['plot_map']='';
				
			}
			else{
				$data_plot_map = $this->upload->data();
				$data['plot_map'] = $data_plot_map['file_name'];
			}

			$result = $this->M_posisi->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Plot Data Successfully updated', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Plot Position Data updated', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_posisi->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Plot Data Successfully deleted', '20px');
		} else {
			echo show_err_msg('Failed Plot Data deleted', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['posisi'] = $this->M_posisi->select_by_id($id);
		$data['dataPosisi'] = $this->M_posisi->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_posisi', 'detail-posisi', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_posisi->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama Posisi");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Posisi.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Posisi.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_posisi->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_kota->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Posisi Berhasil diimport ke database'));
						redirect('Posisi');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Posisi Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Posisi');
				}

			}
		}
	}
}

/* End of file Posisi.php */
/* Location: ./application/controllers/Posisi.php */