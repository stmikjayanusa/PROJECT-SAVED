<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Card extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('master/Mguest');        
        $this->load->model('master/Mcard');        
        $this->load->model('master/Mroom');        
		$this->load->library('template');
	}
	public function index()
	{
        if ($this->session->userdata('masuk')==TRUE) {
            $this->view();
        }else{
	    	$this->load->view('login');
        }
	}
	public function view()
	{
		$data = [
			'title' => 'ID CARD',
			'page'  => 'List Card',
			'small' => 'List',
			'urls'  => '<li class="active">List Card</li>',
			'data'  => $this->Mcard->view()
		];
		$this->template->display('master/Card/index', $data);
	}
	public function status($kode)
	{
		$this->Mcard->status($kode);
				redirect('List_Card');
	}

	public function destroy($kode)
	{
		if (!$this->Mcard->destroy($kode)) {
			$this->session->set_flashdata('pesan', danger('Anda tidak bisa menghapus data Guest.'));
		} else {
			$this->session->set_flashdata('pesan', sukses('Anda telah menghapus data guest.'));
		}
		redirect('List_Card');
	}
	public function create()
	{
		$d['room']=$this->Mroom->view();
		$this->load->view('master/Card/create', $d);
	}
	public function store()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('kode', 'Kode Seri', 'required|is_unique[tb_card.kode]');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '%s sudah digunakan.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mcard->store($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data IDCARD berhasil tersimpan.'));
			} else {
				$json['status'] = false;
				$json['pesan']  = $this->form_validation->error_array();
			}
			echo json_encode($json);
		} else {
			exit('data tidak bisa dieksekusi');
		}
	}
}