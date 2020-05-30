<?php 
/**
 * 
 */
class Mguest extends CI_Model
{
	protected $tabel='tb_guest';
	public function view()
	{
		return $this->db->query("SELECT*FROM `tb_guest` 
									JOIN `tb_card` 
									JOIN `tb_Room` 
									ON `tb_guest`.`guest_card`=`tb_card`.`kode` 
									AND `tb_Room`.`id_room` = `tb_card`.`Card_Room`; ")->result_array();
	}
	public function shows($kode)
	{
		return $this->db->where('id_guest', $kode)->get($this->tabel)->row_array();
	}
	public function destroy($kode)
	{
		return $this->db->simple_query("DELETE FROM " . $this->tabel . " WHERE id_guest='$kode'");
	}
	public function status($value)
	{
		$data = $this->shows($value);
		if ($data['status'] == '1') {
			$this->db->query("UPDATE " . $this->tabel . " SET status='0' WHERE id_guest='$value'");
		} else {
			$this->db->query("UPDATE " . $this->tabel . " SET status='1' WHERE id_guest='$value'");
		}
	}
		public function update($params)
	{
		$kode = $params['kode'];
		$data = [
			'name'   => $params['name'],
			'guest_card'   => $params['gcard'],
			'address'   => $params['address'],
			'phone'   => $params['phone'],
			'email'   => $params['email']
		];
		return $this->db->where('id_guest', $kode)->update($this->tabel, $data);
	}
	public function store($params)
	{

		$data = [
			'id_guest'   => $params['idguest'],
			'name'   => $params['name'],
			'guest_card'   => $params['gcard'],
			'address'   => $params['address'],
			'phone'   => $params['phone'],
			'email'   => $params['email'],
			'status' => 1
		];
		return $this->db->insert($this->tabel, $data);
	}
	
}

 ?>