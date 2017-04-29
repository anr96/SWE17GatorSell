<?php

class Register extends CI_Controller {

    public function do_register() {

        $this->load->model('registered_user_accounts');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[registered_user_accounts.email]|regex[.*sfsu\.com]',
                array(
                    'is_unique' => "%s already exists.",
                    'regex'  => "%s is not a valid SFSU email address"));
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('agree_to_terms', 'Agree to terms', 'required|greater_than[0]');
        
        if ($this->form_validation->run() == FALSE) {
            gator_view('Sign up', 'pages/Register');
        } else {
            $this->registered_user_accounts->add_account($_POST);
            // set logged in state (not confirmed) and go to 
            redirect('register/validate_account');
        }
    }
    
    public function validate_account() {
        
    }

}
