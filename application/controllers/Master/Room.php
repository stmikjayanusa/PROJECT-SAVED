<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Room extends CI_Controller
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
			'title' => 'Room',
			'page'  => 'List Room',
			'small' => 'List',
			'urls'  => '<li class="active">List Card</li>',
			'data'  => $this->Mroom->view()
		];
		$this->template->display('master/Room/index', $data);
	}

	public function status($kode)
	{
		$this->Mroom->status($kode);
				redirect('Room');
	}
	public function destroy($kode)
	{
		if (!$this->Mroom->destroy($kode)) {
			$this->session->set_flashdata('pesan', danger('Anda tidak bisa menghapus data Room.'));
		} else {
			$this->session->set_flashdata('pesan', sukses('Anda telah menghapus data Room.'));
		}
		redirect('Room');
	}

	public function create()
	{
		$d['idcount']=$this->Mroom->idcount();
		$this->load->view('master/Room/create',$d);
	}

	public function store()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('idroom', 'ID  Ruangan', 'required|is_unique[tb_room.id_room]');
			$this->form_validation->set_rules('name', 'Nama  Ruangan', 'required');
			$this->form_validation->set_rules('owner', 'Pemilik/Owner  Ruangan', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '%s sudah digunakan.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mroom->store($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Room berhasil tersimpan.'));
			} else {
				$json['status'] = false;
				$json['pesan']  = $this->form_validation->error_array();
			}
			echo json_encode($json);
		} else {
			exit('data tidak bisa dieksekusi');
		}
	}

	public function edit()
	{
		$kode = $this->input->post('kode');
		$d['data'] = $this->Mroom->shows($kode);
		$this->load->view('master/Room/edit', $d);
	}
		public function update()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('owner', 'Alamat', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mroom->update($params);
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
	












}