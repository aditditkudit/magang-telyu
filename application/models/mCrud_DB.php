<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCrud_DB extends CI_Model{
    function input_listDB($dataDB, $tableDB){
        $this->db->insert($tableDB, $dataDB);
    }

    function show_listDB(){
        $showDB = $this->db->get('list_database');
        return $showDB->result();
    }
    function delete_listDB($where, $tableDB){
        $this->db->where($where);
        $this->db->delete($tableDB);
    }
    function edit_listDB($where, $tableDB){
        return $this->db->get_where($tableDB, $where);
    }
    function update_listDB($where, $dataDB, $tableDB){
        $this->db->where($where);
        $this->db->update($tableDB, $dataDB);
    }
    function show_specific_listDB($where){
        $this->db->select('*');
        $this->db->from('list_database');
        $this->db->where('id_db', $where);
        $sho_spe_DB = $this->db->get();
        return $sho_spe_DB->result();
    }

    function check_db($hostname, $username, $password, $db_name, $db_port){
        // $this->db->close();

        // $configDBfly = $this->config->config['sysdb'];
        // $configDBfly['hostname'] = $hostname;
        // $configDBfly['username'] = $username;
        // $configDBfly['password'] = $password;
        // $configDBfly['database'] = $db_name;
        // $configDBfly['port'] = $db_port;
        // if(!$this->load->database($configDBfly)){
        //     throw new Exception("Konfigurasi Database Salah");
        //     return FALSE;
        // } else{
        // return TRUE;
        // }
        $checkDB = mysqli_connect($hostname, $username, $password, $db_name, $db_port);
        if (!$link) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
    }


}
?>