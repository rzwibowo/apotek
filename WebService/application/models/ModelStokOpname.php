<?php
/**
*
*/
class ModelStokOpname extends CI_Model
{
	public function __construct() {
		parent::__construct();

		//load database library
		$this->load->database();
	}
	function GetStokOpname()
	{
		# code...
    $this->db->select('
        StokOpname.IdStokOpname,
        StokOpname.IdObat,
        StokOpname.StokOpname,
        StokOpname.StokObat,
        StokOpname.Keterangan,
        StokOpname.DiBuatOleh,
        StokOpname.DiUbahOleh,
        StokOpname.TanggalDiBuat,
        StokOpname.TanggalDiUbah,
        Obat.NamaObat,
        Obat.KodeObat,
        Kategori.NamaKategori');
		$this->db->from('StokOpname');
    $this->db->join('Obat', 'Obat.IdObat = StokOpname.IdObat');
    $this->db->join('Kategori', 'Kategori.IdKategori = Obat.IdKategori');
	  return $this->db->get();
	}
	function GetStokOpnameWithFilter($Filter)
	{
		# code...
		$this->db->select('
            StokOpname.IdStokOpname,
            StokOpname.IdObat,
            StokOpname.StokOpname,
            StokOpname.StokObat,
            StokOpname.Keterangan,
            StokOpname.DiBuatOleh,
            StokOpname.DiUbahOleh,
            StokOpname.TanggalDiBuat,
            StokOpname.TanggalDiUbah,
            Obat.NamaObat,
              Obat.KodeObat,
            Kategori.NamaKategori');
		$this->db->from('StokOpname');
    $this->db->join('Obat', 'Obat.IdObat = StokOpname.IdObat');
    $this->db->join('Kategori', 'Kategori.IdKategori = Obat.IdKategori');
		if(count($Filter) > 0){
			$this->db->like($Filter);
		}
	  return $this->db->get();
	}

	function InsertStokOpname($Data,$Table)
	{
		# code...
		if($this->db->insert($Table,$Data)){
			return true;
		}else{
			return false;
		}
	}

	function DeleteStokOpname($Where,$Table)
	{
		# code...
		$this->db->where($Where);
		$this->db->delete($Table);
	}

	function EditStokOpname($Where,$Table)
	{
		# code...
		return $this->db->get_where($Table,$Where);
	}

	function UpdateStokOpname($Where,$Data,$Table)
	{
		# code...
		$this->db->where($Where);
		if($this->db->update($Table,$Data)){
			return true;
		}else {
			return false;
		}
	}
	function GatById($Where,$Table)
	{
		# code...
		return $this->db->get_where('StokOpname',$Where);
	}
  function GatByIdView($Where,$Table){
    $this->db->select('
        StokOpname.IdStokOpname,
        StokOpname.IdObat,
        StokOpname.StokOpname,
        StokOpname.StokObat,
        StokOpname.Keterangan,
        StokOpname.DiBuatOleh,
        StokOpname.DiUbahOleh,
        StokOpname.TanggalDiBuat,
        StokOpname.TanggalDiUbah,
        Obat.NamaObat,
        Obat.KodeObat,
        Kategori.NamaKategori');
    $this->db->from('StokOpname');
    $this->db->join('Obat', 'Obat.IdObat = StokOpname.IdObat');
    $this->db->join('Kategori', 'Kategori.IdKategori = Obat.IdKategori');
    $this->db->where($Where);
    return $this->db->get();
  }
	function GetLike($param){
		$this->db->select('*');
		$this->db->from('StokOpname');
	  $this->db->like($param);
	return $this->db->get();
	}
}
?>
