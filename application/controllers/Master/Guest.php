<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('master/Mguest');        
        $this->load->model('master/Mcard');        
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
			'title' => 'Guest',
			'page'  => 'List Guest',
			'small' => 'List',
			'urls'  => '<li class="active">List Guest  </li>',
			'data'  => $this->Mguest->view()
		];
		$this->template->display('master/Guest/index', $data);
	}

	public function edit()
	{
		$kode = $this->input->post('kode');
		$d['card']=$this->Mcard->view_notinExept($kode);
		$d['data'] = $this->Mguest->shows($kode);
		$this->load->view('master/Guest/edit', $d);
	}
	public function update()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('address', 'Alamat', 'required');
			$this->form_validation->set_rules('phone', 'NOmor Phonsel', 'required');
			$this->form_validation->set_rules('email', 'E-Mail', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mguest->update($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Guest berhasil diupdate.'));
			} else {
				$json['status'] = false;
				$json['pesan']  = $this->form_validation->error_array();
			}
			echo json_encode($json);
		} else {
			exit('data tidak bisa dieksekusi');
		}
	}

	public function status($kode)
	{
		$this->Mguest->status($kode);
				redirect('List_Guest');
	}

	public function create()
	{
		$data['card']=$this->Mcard->view_notin();
		$this->load->view('master/Guest/create',$data);
	}
	public function destroy($kode)
	{
		if (!$this->Mguest->destroy($kode)) {
			$this->session->set_flashdata('pesan', danger('Anda tidak bisa menghapus data Guest.'));
		} else {
			$this->session->set_flashdata('pesan', sukses('Anda telah menghapus data guest.'));
		}
		redirect('List_Guest');
	}
	public function store()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('idguest', 'ID Guest', 'required|is_unique[tb_guest.id_guest]');
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('address', 'Alamat', 'required');
			$this->form_validation->set_rules('phone', 'NOmor Phonsel', 'required');
			$this->form_validation->set_rules('email', 'E-Mail', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '%s sudah digunakan.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mguest->store($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Guest berhasil tersimpan.'));
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
