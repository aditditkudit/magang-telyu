<?php
    class M_data extends CI_Model{
        function readData(){
            return $this->db->get('user');
        }
    }
?>