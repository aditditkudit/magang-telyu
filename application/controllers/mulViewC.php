<?php
defined('BASEPATH') OR exit('No Direct Script access allowed');

    class MulViewC extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->helper('url');
        }

        public function index(){
            $data['judul'] = "Landing Page";
            $this->load->view('view_landingH', $data);
            $this->load->view('view_landing',$data);
            $this->load->view('view_landingF', $data);
        }

        public function about(){
            $data['judul'] = "About";
            $this->load->view('view_landingH', $data);
            $this->load->view('view_landingAbout',$data);
            $this->load->view('view_landingF', $data);
        }

    }