<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller{
    public function __construct(){
        //ngeload model admin
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('mFile');
        $this->load->helper(array('url'));
    }

    public function index(){
        if ($this->admin->logged_id() ){
            $this->load->database();
            $this->load->library('pagination');
            $config = [
                'base_url' => base_url('file/index'),
                'per_page' => 10,
                'total_rows' => $this->mFile->jumlah_file_data(),
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
            $data['list_file'] = $this->mFile->show_file($config['per_page'], $data['page']);
            $data['pagination'] = $this->pagination->create_links();
            
            $this->load->view('header', $data);
            $this->load->view('vFile', $data);
            $this->load->view('footer', $data);
        } else {
            redirect("login");
        }

    }

    public function unduh(){
        
        // $data['list_file'] = $this->mFile->show_file();
        // $this->load->view("unduh", $data);
        $dbh = new PDO("mysql:host=localhost;dbname=ci_magang", "root", "");
        $id = isset($_GET['id'])? $_GET['id'] : "";
        $stat = $dbh->prepare("select * from list_file where id=?");
        $stat->bindParam(1,$id);
        $stat->execute();
        $row = $stat->fetch();


        header("Content-Type: ".$row['mime']."charset=utf-8");
        header('Content-Disposition: attachment; filename='.$row['filename']);  //File name extension was wrong
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        header('Content-length: '.filesize($row['data']));
        readfile('backup/db/'.$row['filename']);

    }

    public function test(){
        echo base_url('file/test');
    }

    
}

?>