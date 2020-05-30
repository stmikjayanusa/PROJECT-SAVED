<?php 
/**
 * 
 */
class Mcard extends CI_Model
{
	protected $tabel='tb_card';
	public function view_notin()
	{
		return $this->db->query("SELECT*FROM ".$this->tabel." WHERE `kode` NOT IN (SELECT `guest_card` FROM `tb_guest`);")->result_array();
	}
	public function view_notinExept($k)
	{
		return $this->db->query("SELECT*FROM `tb_card` WHERE `kode` NOT IN (SELECT `guest_card` FROM `tb_guest` WHERE NOT `id_guest`='$k')")->result_array();
	}
	public function view()
	{
		return $this->db->query("SELECT*FROM `tb_card` JOIN `tb_Room` ON  `tb_Room`.`id_room` = `tb_card`.`Card_Room`;")->result_array();
	}
	public function shows($kode)
	{
		return $this->db->where('kode', $kode)->get($this->tabel)->row_array();
	}
	public function status($value)
	{
		$data = $this->shows($value);
		if ($data['card_state'] == '1') {
			$this->db->query("UPDATE " . $this->tabel . " SET card_state='0' WHERE kode='$value'");
		} else {
			$this->db->query("UPDATE " . $this->tabel . " SET card_state='1' WHERE kode='$value'");
		}
	}
	public function destroy($kode)
	{
		return $this->db->simple_query("DELETE FROM " . $this->tabel . " WHERE kode='$kode'");
	}
	public function store($params)
	{
		$row=$this->db->query("SELECT MAX(`card_number`) as maxnum FROM `tb_card`;")->row_array();
		$data = [
			'kode'   => $params['kode'],
			'card_type'   => $params['type'],
			'Card_Room'   => $params['room'],
			'card_number'   => $row['maxnum']+1,
			'card_state' => 1
		];
		return $this->db->insert($this->tabel, $data);
	}
	// public function view()
	// {
	// 	return $this->db->query("SELECT*FROM `tb_guest` 
	// 								JOIN `tb_card` 
	// 								JOIN `tb_Room` 
	// 								ON `tb_guest`.`guest_card`=`tb_card`.`kode` 
	// 								AND `tb_Room`.`id_room` = `tb_card`.`Card_Room`; ")->result_array();
	// }
	// public function shows($kode)
	// {
	// 	return $this->db->where('id_guest', $kode)->get($this->tabel)->row_array();
	// }
	// public function status($value)
	// {
	// 	$data = $this->shows($value);
	// 	if ($data['status'] == '1') {
	// 		$this->db->query("UPDATE " . $this->tabel . " SET status='0' WHERE id_guest='$value'");
	// 	} else {
	// 		$this->db->query("UPDATE " . $this->tabel . " SET status='0'");
	// 		$this->db->query("UPDATE " . $this->tabel . " SET status='1' WHERE id_guest='$value'");
	// 	}
	// }
	
}

 ?>