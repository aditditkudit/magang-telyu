<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aboutus extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin');
    }

    public function index(){
        if ($this->admin->logged_id()) {
            $this->load->view('header');
            $this->load->view('vAboutus');
            $this->load->view('footer');
        } else {
            redirect('login');
        }
        

    }

}


?>