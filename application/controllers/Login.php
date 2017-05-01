<?php

class Login extends CI_Controller {
    public $registered_user;

    public function index() {
        must_not_be_logged_in();
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/.*sfsu.edu/]|strtolower',array(
            'regex_match' => 'Not a valid SFSU email address'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required|callback_validate_user',array(
            'validate_user' => 'Invalid email and/or password'
        ));
        
        if ($this->form_validation->run() == FALSE) {
            gator_view('Login', 'pages/Login');
        } else {
            $this->session->set_userdata('registered_user', $this->registered_user);
            if($this->registered_user['activated']){
                redirect($_SESSION['continue_destination']);
            } else {
                redirect('register/activate');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('registered_user');
        redirect($_SESSION['cancel_destination']);
    }
    
    public function validate_user($password) {
        $this->load->model('registered_user_accounts');
        $email = $this->input->post('email');
        //$password = $this->input->post('password');
        $this->registered_user = $this->registered_user_accounts->validate_email_and_password($email,$password);
        
        return (bool) isset($this->registered_user);
    }
}
