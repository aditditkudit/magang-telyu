<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('latihan/m_data');
    }

    function index(){
        $this->load->view('latihan/v_form.php');
    }

    function aksi(){
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('pass','Pass','required');
        $this->form_validation->set_rules('konfPass','KonfPass','required');

        if($this->form_validation->run() != false){
            echo "Form Validaion Cocok";
        } else{
            $this->load->view('latihan/v_form');
        }
    }

    function user(){
        $data['user'] = $this->m_data->readData ()->result();
        $this->load->view('latihan/v_user.php', $data);
    }
}
?>