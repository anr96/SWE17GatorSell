<?php
class Register extends CI_Controller {

    public function index() {
        must_not_be_logged_in();
        
        $this->load->model('registered_user_accounts');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/.*sfsu\.edu/]|is_unique[registered_user_accounts.email]|strtolower',
                array(
                    'is_unique' => "%s already exists.",
                    'regex_match'  => "%s is not a valid SFSU email address"));
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('agree_to_terms', 'Agree to terms', 'required|greater_than[0]');
        
        if ($this->form_validation->run() == FALSE) {
            gator_view('Sign up', 'pages/Register');
        } else {
            $id = $this->registered_user_accounts->add_account($_POST);
            $this->session->set_userdata('registered_user', $this->registered_user_accounts->get_account($id));
            redirect('register/activate');
        }
    }
    
    public function activate() {
        must_be_unactivated();
        $this->form_validation->set_rules('code', 'Confirmation Code', 'required|regex_match[/the a-team/]');
        
        if ($this->form_validation->run() == FALSE) {
            gator_view('Activate Account', 'pages/register_confirmation');
        } else {
            $this->load->model('registered_user_accounts');
            $id = $_SESSION['registered_user']['id'];
            $this->registered_user_accounts->activate($id);
            $this->session->set_userdata('registered_user', $this->registered_user_accounts->get_account($id));
            redirect($_SESSION['continue_destination']);
        }
        
    }

}
