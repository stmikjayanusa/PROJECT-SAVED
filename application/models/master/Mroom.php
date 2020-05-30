<?php 
/**
 * 
 */
class Mroom extends CI_Model
{
	protected $tabel='tb_room';
	public function view()
	{
		return $this->db->query("SELECT*FROM ".$this->tabel)->result_array();
	}
	
	public function status($value)
	{
		$data = $this->shows($value);
		if ($data['state'] == '1') {
			$this->db->query("UPDATE " . $this->tabel . " SET state='0' WHERE id_room='$value'");
		} else {
			$this->db->query("UPDATE " . $this->tabel . " SET state='1' WHERE id_room='$value'");
		}
	}
	public function shows($kode)
	{
		return $this->db->where('id_room', $kode)->get($this->tabel)->row_array();
	}
	public function destroy($kode)
	{
		return $this->db->simple_query("DELETE FROM " . $this->tabel . " WHERE id_room='$kode'");
	}
	public function idcount()
	{
		 $a=$this->db->query("SELECT MAX(RIGHT(`id_room`,3)) as max FROM ".$this->tabel)->row_array();

		 return $a['max']+1;
		
	}
	public function store($params)
	{
		$data = [
			'id_room'   => $params['idroom'],
			'name_room'   => $params['name'],
			'owner'   => $params['owner'],
			'state'   => 1,
		];
		return $this->db->insert($this->tabel, $data);
	}
		public function update($params)
	{
		$kode = $params['kode'];
		$data = [
			'name_room'   => $params['name'],
			'owner'   => $params['owner'],
		];
		return $this->db->where('id_room', $kode)->update($this->tabel, $data);
	}
}

 ?>