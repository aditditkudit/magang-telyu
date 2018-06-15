<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //ngeload model admin
        $this->load->model('admin');
    }
    public function index(){
        if ( $this->admin->logged_id() ) {
            $data['list_todo'] = $this->admin->show_list_todo();
            $this->load->view('dashboard', $data);
            
        } else {
            redirect("login");
        }
    }
    public function print(){
        if ( $this->admin->logged_id() ) {
            $data = array('title' => 'Laporan Excel '.date("d F Y") ,
                'list_todo' => $this->admin->show_list_todo() );
            $this->load->view("laporan_excel", $data);
        } else {
            redirect("login");
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

    
    // public function __destruct(){
        
    //     //Ngeload Model backup.php
    //     $this->load->model('backup');
    //     $data = $this->backup->backup_database('localhost','root','','ci-magang', '*');
    //     $this->load->view('dashboard',$data);
    // }
}
?>