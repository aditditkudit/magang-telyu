<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller{
    public function __construct(){
        //ngeload model admin
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('mFile');
    }

    public function index(){
        if ($this->admin->logged_id() ){
            $this->load->view('vFile');
        } else {
            redirect("login");
        }

    }

    
}

?>