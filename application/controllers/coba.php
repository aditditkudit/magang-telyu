
<?php 
defined('BASEPATH') OR exit('No Direct Script access allowed');

    class Coba extends CI_Controller {
        function __construct(){
            parent::__construct();
            $this->load->helper('html');
        }
       

    public function index(){
        $data['nama_web'] = "MalasBelajar.com";
        $this->load->view('view_coba',$data);
        
	}
    
    public function sayHi(){
        echo "Say Hi Bro Bro";
    }

}

