<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}
	public function index()
	{
        if ($this->session->userdata('masuk')==TRUE) {
            $this->Home();
        }else{
	    	$this->load->view('login');
        }
	}
	public function Home()
	{
		$data = [
			'title' => 'Home Title',
			'page'  => 'Home Panel',
			'small' => 'Admin WEB Panel ',
			'urls'  => '<li class="active">Admin Wp  </li>',
			'data'  => '',
			'level' => $this->session->userdata('level')

		];
		$this->template->display('master/home/index', $data);
	}
}
