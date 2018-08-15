<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //ngeload model admin
        $this->load->model('admin');
        $this->load->model('mFile');
        $this->load->model('mCrud_DB');
        $this->load->helper(array('url'));

    }
    public function index(){
        if ( $this->admin->logged_id() ) {
            $this->load->database();
            $this->load->library('pagination');
            $config = [
                'base_url' => base_url('dashboard/index'),
                'per_page' => 10,
                'total_rows' => $this->admin->jumlah_file_todo(),
                'uri_segment' => 3
            ];
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = floor($choice);

            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tagl_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tagl_close'] = '</li>';
            $config['first_tag_open'] = '<li class="page-item disabled">';
            $config['first_tagl_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tagl_close'] = '</a></li>';
            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['list_todo'] = $this->admin->show_list_todo($config['per_page'], $data['page']);
            $data['pagination'] = $this->pagination->create_links();
            $this->load->view('header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('footer', $data);
            
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
        ini_set('max_execution_time', 0);
        $this->load->library('session');
        if(empty($this->session->userdata('post_ckbox'))){
            redirect('cSettings');
        } else{
            $dataBP = $this->session->userdata('post_ckbox');
            foreach($dataBP as $obj){
                $this->load->database();    
                $dataDB = $this->mCrud_DB->show_specific_listDB($obj);
                foreach($dataDB as $db_data){
                    $db_hostname = $db_data->hostname;
                    $db_username = $db_data->username;
                    $db_password = $db_data->password;
                    $db_database = $db_data->name_database;
                    $db_port = $db_data->port;
                    $this->db->close();
                    $configDBfly = $this->config->config['sysdb'];
                    $configDBfly['hostname'] = $db_hostname;
                    $configDBfly['username'] = $db_username;
                    $configDBfly['password'] = $db_password;
                    $configDBfly['database'] = $db_database;
                    $configDBfly['port'] = $db_port;      
                    
                    $checkDB = @mysqli_connect($db_hostname, $db_username, $db_password, $db_database, $db_port);
                    if (!$checkDB) {
                        $this->load->database();
                        $data = array( 
                            'tgl' => date("Y-m-d-H-i-s"), 
                            'activity' => 'Doing Backup on '.$db_database.' '.date("Y-m-d-H-i-s"),
                            'status'  => 'Gagal' ,
                            'keterangan' => 'Melakukan Koneksi Ke Database Gagal, Silahkan Cek Konfigurasi Database'
                        );
                        $this->admin->input_log($data,'todo');
                    } else {
                        $this->load->database($configDBfly);
                        $this->db = $this->load->database($configDBfly, true);
                        $this->load->dbutil();
                    
                        $prefs = array(
                            'format' => 'zip',
                            'filename' => 'db_'. $db_database .'_backup.sql'
                        );
                        $backup = $this->dbutil->backup($prefs);
                        $db_filename = 'backup-'. $db_database .'-on-' . date("Y-m-d-H-i-s") . '.zip'; // file name
                        $save  = 'backup/db/' . $db_filename; // dir name backup output destination
                        $tgl = date("Y-m-d-H-i-s");
                        $keterangan = "";
                        $this->load->helper('file');
                        $wFile = write_file($save, $backup);

                        $this->db->close();
                        $this->load->database();
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
                            $mime = get_mime_by_extension($db_filename);
                            $inputFile = array(
                                'tgl' => $tgl,
                                'filename' => $db_filename,
                                'mime' =>  $mime
                            );
                            $this->mFile->input_file($inputFile, 'list_file');
                        }else{
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
                    }
                     
                }                    
            }
            redirect('file');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}
?>