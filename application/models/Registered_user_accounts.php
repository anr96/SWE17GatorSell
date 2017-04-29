<?php

class Registered_user_accounts extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function validate_email_and_password($email, $password) {
        $result = $this->db->where(array('email' => $email, 'password' => md5($password)))
                ->get('registered_user_accounts')
                ->row_array();
        return $result;
    }
    
    public function get_account($id) {
        return $this->db->get_where('registered_user_accounts',array('id' => $id))->row_array();
    }

    public function activate($id) {
        $this->db->update('registered_user_accounts', array('activated' => true), array('id' => $id));
    }

    public function email_already_exists($email) {
        return $this->db->where('email', $email)
                        ->count_all_results('registered_user_accounts');
    }

    public function add_account($account) {

        $data = array(
            'name' => $account['name'],
            'email' => $account['email'],
            'phone' => $account['phone'],
            'password' => md5($account['password']),
            'agree_to_terms' => $account['agree_to_terms'],
            'activated' => false,
            'banned' => false
        );

        $this->db->insert('registered_user_accounts', $data);
        return $this->db->insert_id();
    }

}
