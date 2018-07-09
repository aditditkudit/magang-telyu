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
            $data['list_file'] = $this->mFile->show_file();
            $this->load->view('vFile', $data);
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
        echo $row['data'];

    }

    
}

?>