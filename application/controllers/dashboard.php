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

    public function backup(){
        $this->load->dbutil();
        
    
        $prefs = array(
        'format' => 'zip',
        'filename' => 'my_db_backup.sql'
        );
    
        $backup =& $this->dbutil->backup($prefs);
    
        $db_name = 'backup-on-' . date("Y-m-d-H-i-s") . '.zip'; // file name
        $save  = 'backup/db/' . $db_name; // dir name backup output destination
        $tgl = date("Y-m-d-H-i-s");
        $keterangan = "";

        $this->load->helper('file');
         write_file($save, $backup);
        
        if(write_file($save, $backup)){
            //Insert Log to Dashboard
            $keterangan = "Sukses";
            $data = array( 
                'tgl' => $tgl, 
                'activity' => $db_name,
                'status'  => $save ,
                'keterangan' => $keterangan
            );
            $this->admin->input_log($data,'todo');
            $this->load->helper('download');
            force_download($db_name, $backup);
        } else{
            //Insert Log to Dashboard
            $keterangan = "Gagal";
            $data = array( 
                'tgl' => $tgl, 
                'activity' => $db_name,
                'status'  => $save ,
                'keterangan' => $keterangan
            );
            $this->admin->input_log($data,'todo');
        }
        $url = base_url() . "index.php/dashboard";
        

        
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