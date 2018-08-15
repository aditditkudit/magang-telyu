<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MFile extends CI_Model{
    //Insert to table list_file
    function input_file($dataF, $tableF){
        $this->db->insert($tableF, $dataF);
    }

    //Show all data from list_file
    function show_file($number, $offset){
        $this->db->select('*');
        $this->db->order_by('tgl', 'desc');
        $LFile =$this->db->get('list_file', $number, $offset);
        return $LFile->result();
    }

    function jumlah_file_data(){
        return $this->db->get('list_file')->num_rows();
    }

    
}
?>