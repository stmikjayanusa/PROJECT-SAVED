<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');        
    }
    public function index()
    {
        
        if ($this->session->userdata('masuk')==TRUE) {
            redirect('Home');
        }else{
    	$this->load->view('login');
        }
    }
    public function Validate(){
        $usr=$this->input->post('username');
        $paswd=$this->input->post('password');
        $ck_user=$this->Mlogin->check_user($usr);
        $ck_paswd=$this->Mlogin->check_pass($usr,$paswd);
        $this->form_validation->set_rules('username', 'Username', 'callback_username_check[' . $ck_user->num_rows() . ']');
        $this->form_validation->set_rules('password', 'Password', 'callback_password_check[' . $ck_paswd->num_rows() . ']');
        if ($this->form_validation->run()==true) {
            $post=$this->input->post(null,TRUE);
            $Getvalue=$this->Mlogin->validate($post);
                    $this->session->set_userdata('status',$Getvalue['status_user']);

                $this->session->set_userdata('masuk',TRUE);
                if($this->session->userdata('status')== '1'){
                    $this->session->set_userdata('kode',$Getvalue['id_user']);
                    $this->session->set_userdata('level',$Getvalue['level_user']);
                }else{
                    $this->session->session_destroy();
                }
            $jsonV['status']=TRUE;
            }else{
            $jsonV['status']=FALSE;
            }
        echo json_encode($jsonV);
    }
    public function Usernamecek(){
    	$usr=trim($this->input->post('username'));
    	$check_usr=$this->Mlogin->check_user($usr);
    	$this->form_validation->set_rules('username', 'Username', 'callback_username_check[' . $check_usr->num_rows() . ']');
    	if ($this->form_validation->run()==TRUE) {
    		$jsonV['status'] = true;
    	}else{
    		$jsonV['status'] = false;
    	}
    	echo json_encode($jsonV);
    }
    public function Passwordcek(){
    	$usrname=trim($this->input->post('username'));
    	$password=trim($this->input->post('password'));
        $check_user = $this->Mlogin->check_user($usrname);

        $check_pass = $this->Mlogin->check_pass($usrname, $password);
        $this->form_validation->set_rules('password', 'Password', 'callback_password_check[' . $check_user->num_rows() . ']');
        $this->form_validation->set_rules('password', 'Password', 'callback_password_check[' . $check_pass->num_rows() . ']');
        
			if ($this->form_validation->run()==TRUE) {
	    	$json['status']=TRUE;
			}else{
	    	$json['status']=FALSE;
				}
			echo json_encode($json);

    }
    public function username_check($username, $recordCount){
        if ($username == null) {
            $this->form_validation->set_message('username_check', 'Username is required.');
            return false;
        } else if ($recordCount == 0) {
            $this->form_validation->set_message('username_check', 'Username is not correct.');
            return FALSE;
        } else {

            return true;
        }
    }
    public function password_check($password, $recordCount){
        if ($password == null) {
            $this->form_validation->set_message('password_check', 'Password is required.');
            return false;
        } else if ($recordCount == 0) {
            $this->form_validation->set_message('password_check', 'Password is not correct.');
            return FALSE;
        } else {

            return true;
        }
    }
    public function Log_Out()
    {
        $this->session->unset_userdata('masuk',FALSE);
        $this->session->unset_userdata('kode');
        redirect('Login');

        # code...
    }


}
