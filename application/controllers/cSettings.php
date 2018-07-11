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
            $data['list_database'] = $this->mSettings->getAllDb();
            $this->load->view('vSettings', $data);

        }
        else {
            redirect("login");
        }
    }

    public function proses(){
        $this->form_validation->set_rules(
            'database_which[]', '',
            'required', array("required"=>"Pilih Salah Satu Ya Bro Bro")
        );

        if ($this->form_validation->run() == FALSE){
            $data['list_database'] = $this->mSettings->getAllDb();
            $this->load->view('vSettings', $data);
        } else{
            # Doing Backup
            // $data = $this->input->post('database_which');
            $this->db->close();
            $configDBfly = $this->config->config['sysdb'];
            $configDBfly['database'] = 'phpmyadmin';    


                

                
                $this->load->database($configDBfly);
                // $otherDB = $this->load->database('tetew', TRUE);
                
                
                

                echo '<pre>'.print_r($this->db, TRUE).'</pre>';
                echo '<br><br>';
                $this->db->close();
                $this->load->database();
                echo '<pre>'.print_r($this->db, TRUE).'</pre>';

                // echo '<pre>'.print_r($this->db, TRUE).'</pre>';
            // foreach ($data as $obj){
            //     // $this->load->dbutil();

            //     $db['tetew']['database'] = "test"; // your db name

            //     $otherDB = $this->load->database('tetew', TRUE);
                
                
                

            //     echo '<pre>'.print_r($otherDB, TRUE).'</pre>';
            //     echo '<pre>'.print_r($this->db, TRUE).'</pre>';
                

                


                

            //     // $this->load->dbutil();

            //     // $prefs = array(
            //     //     'format' => 'zip',
            //     //     'filename' => 'db_'. $db_name .'_backup.sql'
            //     // );

            //     // $backup =& $this->dbutil->backup($prefs);
            //     // $db_filename = 'backup-'. $db_name .'-on-' . date("Y-m-d-H-i-s") . '.zip'; // file name
            //     // $save  = 'backup/db/' . $db_filename; // dir name backup output destination
            //     // $tgl = date("Y-m-d-H-i-s");
            //     // $keterangan = "";

            //     // $this->load->helper('file');
            //     // $wFile = write_file($save, $backup);
            //     // if(write_file($save, $backup)){
            //     //     //Insert Log to Dashboard
            //     //     $keterangan = "Sukses";
            //     //     $data = array( 
            //     //         'tgl' => $tgl, 
            //     //         'activity' => $db_filename,
            //     //         'status'  => $keterangan ,
            //     //         'keterangan' => 'Berhasil Masuk di DB'
            //     //     );
            //     //     $this->admin->input_log($data,'todo');
            //     //     $rFile = read_file($save);
            //     //     $mime = get_mime_by_extension($db_filename);
            //     //     $inputFile = array(
            //     //         'filename' => $db_filename,
            //     //         'mime' =>  $mime,
            //     //         'data' => $rFile

            //     //     );
            //     //     $this->mFile->input_file($inputFile, 'list_file');

            //     // }else{
            //     //     $keterangan = "Gagal";
            //     //     $data = array( 
            //     //         'tgl' => $tgl, 
            //     //         'activity' => $db_filename,
            //     //         'status'  => $keterangan ,
            //     //         'keterangan' => 'Gagal Write File'
            //     //     );
            //     //     $this->admin->input_log($data,'todo');
            //     // }                
            // }
            // redirect('dashboard');
            

            // $this->input->post('database_which');
        }
    }
}
?>