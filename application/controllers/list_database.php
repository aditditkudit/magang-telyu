<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_database extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('mCrud_DB');

    }
    public function index(){
        if ($this->admin->logged_id()){
            $this->load->database();
            $data['list_DB'] = $this->mCrud_DB->show_listDB();
            $this->load->view('header', $data);
            $this->load->view('vList_DB', $data);
            $this->load->view('footer', $data);
        } else{
            redirect("login");
        }
    }

    public function add_database(){
        if ($this->admin->logged_id()){
            $this->load->view('header');
            $this->load->view('vadd_database');
            $this->load->view('footer');
        } else{
            redirect("login");
        }
    }

    public function process_inputDB(){
        $config_rules = array(
             array(
                'field'  => 'hostname',
                'label'  => 'Hostname',
                'rules'  => 'required|valid_ip',
                'errors' => array(
                    'required' => 'Field Hostname can not blank'
                )
             ),
             array(
                'field'  => 'username',
                'label'  => 'Username',
                'rules'  => 'required',
                'errors' => array(
                    'required' => 'Field Username can not blank'
                )
             ),
             array(
                'field'  => 'database',
                'label'  => 'Database',
                'rules'  => 'required',
                'errors' => array(
                    'required' => 'Field Database can not blank'
                )
             ),
             array(
                'field'  => 'port',
                'label'  => 'Port',
                'rules'  => 'required|numeric',
                'errors' => array(
                    'required' => 'Field Port can not blank and should be Number'
                )
             ), 
        );
        $this->form_validation->set_rules($config_rules);

        if($this->form_validation->run() == FALSE){
            $this->load->view('header');
            $this->load->view('vadd_database');
            $this->load->view('footer');
        } else{
                #Doing Store to DB         
            $hostname_post = $this->input->post('hostname', TRUE);
            $username_post = $this->input->post('username', TRUE);
            $password_post = $this->input->post('password', TRUE);
            $database_post = $this->input->post('database', TRUE);
            $port_post     = $this->input->post('port', TRUE);
            $checkDB = @mysqli_connect($hostname_post, $username_post,
             $password_post, $database_post, $port_post);

            if (!$checkDB) {
                if(!empty($this->session->userdata('alert_add_db'))){
                    $this->session->unset_userdata('alert_add_db');
                }
                $alert_add_db = 'Cek Konfigurasi Database, karena ada kesalahan';
                $this->session->set_userdata('alert_add_db', $alert_add_db);
                $data['data_alert_addDB'] = $this->session->userdata('alert_add_db');
                $this->load->view('header', $data);
                $this->load->view('vadd_database', $data);
                $this->load->view('footer', $data);

            }else{
                $this->load->database();
                if(!empty($this->session->userdata('alert_add_db'))){
                    $this->session->unset_userdata('alert_add_db');
                }
                $data_input = array(
                'hostname' => $hostname_post,
                'username' => $username_post,
                'password' => $password_post,
                'name_database' => $database_post,
                'port' => $port_post
                ); 
                $this->mCrud_DB->input_listDB($data_input, 'list_database');
                redirect('list_database');
            }
            
            
            
        }
    }

    public function edit_database($id){
        $where = array('id_db' => $id);
        $data['data_edit'] = $this->mCrud_DB->edit_listDB($where, 'list_database')->result();
        $this->load->view('header', $data);
        $this->load->view('vedit_database', $data);
        $this->load->view('footer', $data);
    }
    
    public function process_updateDB(){
        $config_rules = array(
            array(
               'field'  => 'hostname',
               'label'  => 'Hostname',
               'rules'  => 'required',
               'errors' => array(
                   'required' => 'Field Hostname can not blank'
               )
            ),
            array(
               'field'  => 'username',
               'label'  => 'Username',
               'rules'  => 'required',
               'errors' => array(
                   'required' => 'Field Username can not blank'
               )
            ),
            array(
               'field'  => 'database',
               'label'  => 'Database',
               'rules'  => 'required',
               'errors' => array(
                   'required' => 'Field Database can not blank'
               )
            ),
            array(
               'field'  => 'port',
               'label'  => 'Port',
               'rules'  => 'required|numeric',
               'errors' => array(
                   'required' => 'Field Port can not blank and should be Number'
               )
            ), 
       );
       $this->form_validation->set_rules($config_rules);
       $id = $this->input->post('id_db', TRUE);
       if($this->form_validation->run() == FALSE){
           $where = array('id_db' => $id);
           $data['data_edit'] = $this->mCrud_DB->edit_listDB($where, 'list_database')->result();
           $this->load->view('header', $data);
           $this->load->view('vedit_database', $data);
           $this->load->view('footer', $data);
       } else{
        $id_post = $this->input->post('id_db', TRUE);   
        $hostname_post = $this->input->post('hostname', TRUE);
        $username_post = $this->input->post('username', TRUE);
        $password_post = $this->input->post('password', TRUE);
        $database_post = $this->input->post('database', TRUE);
        $port_post = $this->input->post('port', TRUE);

        $checkDB = @mysqli_connect($hostname_post, $username_post,
             $password_post, $database_post, $port_post);
        if (!$checkDB) {
            if(!empty($this->session->userdata('alert_edit_db'))){
                $this->session->unset_userdata('alert_edit_db');
            }
            $alert_edit_db = 'Cek Konfigurasi Database, karena ada kesalahan';
            $this->session->set_userdata('alert_edit_db', $alert_edit_db);
            $data['data_alert_editDB'] = $this->session->userdata('alert_edit_db');
            $where = array('id_db' => $id);
            $data['data_edit'] = $this->mCrud_DB->edit_listDB($where, 'list_database')->result();
            $this->load->view('header', $data);
            $this->load->view('vedit_database', $data);
            $this->load->view('footer', $data);

        } else{
            $this->load->database();
            if(!empty($this->session->userdata('alert_edit_db'))){
                    $this->session->unset_userdata('alert_edit_db');
            }
            $data_input = array(
                'hostname' => $hostname_post,
                'username' => $username_post,
                'password' => $password_post,
                'name_database' => $database_post,
                'port' => $port_post
            );
            $where = array('id_db' => $id_post);
            $this->mCrud_DB->update_listDB($where, $data_input, 'list_database');
            redirect('list_database');
        } 

       }
    }

    public function delete_database($id){
        $where = array('id_db' => $id);
        $this->mCrud_DB->delete_listDB($where, 'list_database');
        redirect('list_database');
    }

    public function test(){

        $host = '127.0.0.1';
        $port = '3306';
        $user = 'hehe';
        $pass = 'hehe';
        $dbname = 'hehe';




    }

    

    
    

}
?>