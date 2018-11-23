<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function index()         
    {
        $trylogin = $this->input->post('trylogin');
        $login    = $this->input->get_post('username');
        $password = $this->input->get_post('password');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $config = array(
            array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'You must provide a %s.',
                    ),
            ),
        );
        $this->form_validation->set_rules( $config);
        if(!empty($trylogin)){
            $run = $this->form_validation->run();
            if($run !== false){
                $this->load->model('Authorize');
                $data = $this->Authorize->get(
                    array(
                        'login' => $login,
                        'password' => md5($password),
                    )
                );
                if($data){
                    $userdata['user_id'] = $data->user_id;
                    $userdata['login']   = $data->login;
                    $userdata['user_is_login'] = true;
                    $this->session->set_userdata('userdata',$userdata);
                   // $this->form_validation->set_message('This user already exists.');
                }
            }
        }
        $userdata = $this->session->userdata('userdata');
        if(!$userdata || !isset($userdata['user_is_login'])){
        	$data = array(
                'title' => 'Login',
        		'subtitle' => 'Login',
        	);
            load_theme('user/login',$data);
        }else{
            redirect('dashboard','refresh');
        }
    }
}
