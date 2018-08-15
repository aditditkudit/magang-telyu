<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSettings extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('mSettings');
        $this->load->model('mFile');
    }

    public function index(){
        if ($this->admin->logged_id() ){
            $this->load->database();
            $data['list_database'] = $this->mSettings->getAllDb();
            $this->load->view('header', $data);
            $this->load->view('vSettings', $data);
            $this->load->view('footer', $data);          
        }
        else {
            redirect("login");
        }
    }

    public function proses(){
        $this->form_validation->set_rules(
            'database_which[]', '',
            'required', array("required"=>"Pilih salah satu atau lebih database yang tersedia, untuk melakukan Backup")
        );

        if ($this->form_validation->run() == FALSE){
            $this->load->database();
            $data['list_database'] = $this->mSettings->getAllDb();
            $this->load->view('header', $data);
            $this->load->view('vSettings', $data);
            $this->load->view('footer', $data);               
        } else{
            # Doing Backup
            $this->load->library('session');
            if(!empty($this->session->userdata('post_ckbox'))){
                $this->session->unset_userdata('post_ckbox');
            }
            $dataP = $this->input->post('database_which[]', TRUE);
            $this->session->set_userdata('post_ckbox', $dataP);

            redirect('dashboard');
        }
    }
}
?>