<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MFile extends CI_Model{
    //Insert to table list_file
    function input_file($dataF, $tableF){
        $this->db->insert($tableF, $dataF);
    }

    //Show all data from list_file
    function show_file(){
        $LFile =$this->db->get('list_file');
        return $LFile->result();
    }

    
}
?>