<?php
class ModelLogin extends CI_Model
{
  public function __construct() {
     parent::__construct();

     //load database library
     $this->load->database();
 }
 function AutUser($Username,$Password)
 {
         # code...
         $PasswordHash = md5($Password);
         $this->db->select('*');
         $this->db->from('user');
         $this->db->where('username', $Username);
         $this->db->where('password', $PasswordHash);
   return $this->db->get();
 }

    // function get_level($table,$where)
    // {
    //     # code...
    //     $this->db->select("hak_akses");
    //     $this->db->where($where);
    //     $query=$this->db->get($table);

    //     $level = $query->result_array();

    //     return $level[0]['level'];
    // }
}
?>
