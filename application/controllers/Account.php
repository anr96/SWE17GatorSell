<?php

class Account extends CI_Controller {

    // displays the account page.  called with /account
    public function index() {
        must_be_logged_in();
        $this->load->model('items_model');
        $data['items'] = $this->items_model->get_seller_items($_SESSION['registered_user']['id']);
        $data['registered_user'] = $_SESSION['registered_user'];
        gator_view('Manage My Account', 'pages/SellerProfile',$data);
    }
    


}
