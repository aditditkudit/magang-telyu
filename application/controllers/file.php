<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller{
    public function __construct(){
        //ngeload model admin
        $this->load->model('admin');
        $this->load->model('mFile');
    }

    public function index(){
        if ($this->admin->logged_id() ){
            $data['list_todo'] = $this->admin->show_list_todo();
            $this->load->view('vFile', $data);
        } else {
            redirect("login");
        }

    }

    
}

?>