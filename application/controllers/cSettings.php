<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSettings extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('mSettings');
    }

    public function index(){
        if ($this->admin->logged_id() ){ 
            $data['list_database'] = $this->mSettings->getAllDb();
            $this->load->view('vSettings', $data);
        }
        else {
            redirect("login");
        }
    }
}
?>