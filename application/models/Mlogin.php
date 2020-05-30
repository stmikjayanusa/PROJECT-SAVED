<?php 
/**
 * 
 */
class Mlogin extends CI_Model
{
	protected $tabel='tb_user';
	public function check_user($value)
	{
		return $this->db->get_where($this->tabel,['email' => $value]);
	}
	public function check_pass($username,$paswd)
	{
		return $this->db->get_where($this->tabel,['email' => $username] , ['password' => md5($paswd)] );
	}
	public function validate($post)
	{
		$u=$post['username'];
		$p=$post['password'];
		return $this->db->get_where($this->tabel,['email' => $u] , ['password' => md5($p)])->row_array();
	}
	
}

 ?>