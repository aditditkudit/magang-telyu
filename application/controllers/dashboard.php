<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //ngeload model admin
        $this->load->model('admin');
        $this->load->model('mFile');

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
            $data = array('title' => 'Laporan Excel '.date("Y-m-d-H-i-s") ,
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
        $db_name = $this->db->database;
        $db_filename = 'backup-'. $db_name .'-on-' . date("Y-m-d-H-i-s") . '.zip'; // file name
        $save  = 'backup/db/' . $db_filename; // dir name backup output destination
        $tgl = date("Y-m-d-H-i-s");
        $keterangan = "";

        $this->load->helper('file');
        $wFile = write_file($save, $backup);
        if(write_file($save, $backup)){
            //Insert Log to Dashboard
            $keterangan = "Sukses";
            $data = array( 
                'tgl' => $tgl, 
                'activity' => $db_filename,
                'status'  => $keterangan ,
                'keterangan' => 'Berhasil Masuk di DB'
            );
            $this->admin->input_log($data,'todo');
            $rFile = read_file($save);
            $mime = get_mime_by_extension($db_filename);
            $inputFile = array(
                'filename' => $db_filename,
                'mime' =>  $mime,
                'data' => $rFile

            );
            $this->mFile->input_file($inputFile, 'list_file');
            
            // $this->load->helper('download');
            // force_download($db_filename, $backup);
     
        } else{
            //Insert Log to Dashboard
            $keterangan = "Gagal";
            $data = array( 
                'tgl' => $tgl, 
                'activity' => $db_filename,
                'status'  => $keterangan ,
                'keterangan' => 'Gagal Write File'
            );
            $this->admin->input_log($data,'todo');
        }
        redirect('file');
        
        

        
    }

    public function db(){
        $this->load->dbutil();
        $backup = $this->dbutil->backup();

        $this->load->helper('file');
        $wFile = write_file('backup/db/mybackup.zip', $backup);
        $rFile = read_file($wFile);

        $inputFile = array(
            'datecreate' => $tgl,
            'filename' => $db_filename,
            'mime' =>  $mime,
            'data' => $rFile
        );
        $this->mFile->input_file($inputFile, 'list_file');
        redirect('file');



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