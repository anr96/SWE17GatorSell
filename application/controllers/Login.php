<?php

class Login extends CI_Controller {
    public $registered_user;

    // displays the login page and validates entries.  called with /login
    // if the account has not been activated, it redirects to the acctivation form
    // otherwise, it continues to the next destination
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
    // displays the forgot password page.  called with /login/forgot_password
    // validates form entry for a valid SFSU email. on success, displays confirmation page
    public function forgot_password(){
        must_not_be_logged_in();
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/.*sfsu.edu/]|strtolower',array(
            'regex_match' => 'Not a valid SFSU email address'
        ));
         if ($this->form_validation->run() == FALSE) {
            gator_view('Login', 'pages/forgotPwd');
        } else {
            redirect('login/forgot_password_confirmation');
        }
       
    }
    
    // displays confirmation page. called with login/forgot_password_confirmation
    public function forgot_password_confirmation() {
        must_not_be_logged_in();
        gator_view("Forgot Password Confirmation", 'pages/forgotpwd_confirmation');        
    }

    // logs out the user.  called with /login/logout
    public function logout() {
        $this->session->unset_userdata('registered_user');
        redirect($_SESSION['cancel_destination']);
    }
    
    // helper callback funtion to validate an email and password
    // used by the index function
    public function validate_user($password) {
        $this->load->model('registered_user_accounts');
        $email = $this->input->post('email');
        //$password = $this->input->post('password');
        $this->registered_user = $this->registered_user_accounts->validate_email_and_password($email,$password);
        
        return (bool) isset($this->registered_user);
    }
}
