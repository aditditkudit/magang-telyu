<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSettings extends CI_Model{
    //fungsi ngenampilin nama database semua
    public function getAllDb(){
        $getDB = $this->db->get('list_database');
        return $getDB->result();
    }




}
?>