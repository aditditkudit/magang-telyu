<?php
defined('BASEPATH') OR  exit('No Direct Script Access Allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //load model admin
        $this->load->model('admin');
    }

    public function index(){
        //Cek Session
        if($this->admin->logged_id()){
            redirect("dashboard");
        }
        else{
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');

            //set message form validation
            $this->form_validation->set_message('required', 
                '<div class="alert alert-danger" style="margin-top: 3px">
                 <div class="header"> <b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi </div>
                 </div>');

            // Ngeget data dari form
            if ($this->form_validation->run() == TRUE) {
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                //Checking data via model
                $checking = $this->admin->check_login('tbl_users', array('username' => $username), 
                    array('password' => $password));
                
                //Jika ditemukan, maka create session
                if($checking != FALSE) {
                    foreach($checking as $apps) {
                        $session_data = array(
                            'user_id'   => $apps->id_user,
                            'user_name' => $apps->username,
                            'user_pass' => $apps->psassword,
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        redirect('dashboard/');
                    }
                } else{
                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR </b> Username atau password salah! </div>
                        </div> ';
                    $this->load->view('login', $data);    
                }
            } else {
                $this->load->view('login');
            }
        }
    }
    
}
?>