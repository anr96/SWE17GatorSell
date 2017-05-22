<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('gator_view')) {

    function gator_view($page_title,$page,$data = null, $current_menu = '') {
        $ci = get_instance();
        $ci->load->view('templates/header', array('title' => $page_title));
        $ci->load->view($page,$data);
        $ci->load->view('templates/footer');
    }
}

if (!function_exists('logged_in')) {
    function logged_in() {
        return isset($_SESSION['registered_user']) && $_SESSION['registered_user']['activated'] == true;
    }
}
if (!function_exists('must_not_be_logged_in')) {
    function must_not_be_logged_in() {
        init_session_if_needed();
        if (logged_in()) {
            redirect();
        }
    }
}
if (!function_exists('must_be_logged_in')) {
    function must_be_logged_in() {
        init_session_if_needed();
        if(!logged_in()){
            $ci = get_instance();
            $ci->session->set_userdata('continue_destination', current_url());
            redirect('login');
        }
    }
}
if (!function_exists('can_be_any_logged_in_state')) {
    function can_be_any_logged_in_state() {
        init_session_if_needed();
        update_destinations(current_url(), current_url());
    }
}
if (!function_exists('must_be_unactivated')) {
    function must_be_unactivated() {
        must_not_be_logged_in();
        if(!isset($_SESSION['registered_user'])){
            redirect();
        }
    }
}
if (!function_exists('set_continue_destination')) {
    function set_continue_destination($continue_url) {
        $ci =& get_instance();
        $ci->session->set_userdata('continue_destination', $continue_url);
    }
}
if (!function_exists('set_cancel_destination')) {
    function set_cancel_destination($cancel_url) {
        $ci =& get_instance();
        $ci->session->set_userdata('cancel_destination', $cancel_url);
    }
}
if (!function_exists('update_destinations')) {
    function update_destinations($continue_url,$cancel_url) {
        set_continue_destination($continue_url);
        set_cancel_destination($cancel_url);
    }
}
if (!function_exists('init_session_if_needed')) {
    function init_session_if_needed() {
        if(!isset($_SESSION['invalid_query'])){
            $ci =& get_instance();
            update_destinations(site_url(), site_url());
            $ci->session->set_userdata('categoryID', 0);
            $ci->session->set_userdata('query', '');
            $ci->session->set_userdata('query_error_msg', NULL);
            $ci->session->set_userdata('message_count',0);
            $ci->session->set_userdata('invalid_query',FALSE);
        }
        if(logged_in()){
            $ci =& get_instance();
            $ci->load->model('messages_model');
            $ci->session->set_userdata('message_count', $ci->messages_model->count_messages($_SESSION['registered_user']['id']));
        }
    }
}
if (!function_exists('get_categories')) {
    function get_categories() {
        $ci = get_instance();
        $ci->load->model('categories_model');
        return $ci->categories_model->get_categories();
    }
}
if (!function_exists('get_locations')) {
    function get_locations() {
        $ci = get_instance();
        $ci->load->model('locations');
        return $ci->locations->get_locations();
    }
}

if (!function_exists('categories_select')) {
    function categories_select($top_option, $properties = '', $selected = 0) {
        $categories = get_categories();
        echo "<select $properties>\n";
        echo "<option value='0'>$top_option</option>\n";
        foreach ($categories as $category) {
            $x = $selected == $category['id'] ? "selected" : "";
            echo "<option $x value='{$category['id']}'>{$category['category']}</option>\n";
        }
        echo "</select>";
    }
}
if (!function_exists('locations_select')) {
    function locations_select($top_option, $properties = '', $selected = 0) {
        $locations = get_locations();
        echo "<select $properties>\n";
        echo "<option value='0'>$top_option</option>\n";
        foreach ($locations as $location) {
            $x = $selected == $location['id'] ? "selected" : "";
            echo "<option $x value='{$location['id']}'>{$location['name']}</option>\n";
        }
        echo "</select>";
    }
}

if (!function_exists('gs_pagination')) {
    function gs_pagination($total, $uri, $cur_page = 0, $sortby = 0, $items_per_page = 10) {
        if($total==0){$total = 1;}
        $num_pages = (int) floor(($total -1) / $items_per_page) + 1;
        $page_group = (int) floor($cur_page / 5);
        $num_groups = (int) floor(($num_pages - 1) / 5) + 1;
        $page = (int) floor($cur_page / $items_per_page) * $items_per_page - 1;
        $link_previous_group = site_url($uri) . "/$page/$sortby" ;
        $link_next_group = site_url($uri) . '/' . ((int) floor($cur_page / $items_per_page)+1) * $items_per_page . "/$sortby";
        $head = $page_group == 0 ? '' : "<li><a href='$link_previous_group'>&laquo;</a></li>";
        $tail = $page_group == $num_groups -1 ? '' : "<li><a href='$link_next_group'>&raquo;</a></li>";
        $body = '';
        for($page_num = $page_group * 5;($page_num < ($page_group + 1)*5) && ($page_num < $num_pages);$page_num++){
            $active = $page_num == $cur_page ? 'class="active"' : '';
            $disp_page = $page_num + 1;
            $link = site_url($uri) . "/$page_num/$sortby";
            $body = $body . "<li $active><a href='$link'>$disp_page</a></li>";
        }
        
        echo '<nav class="pull-right"><ul class="pagination">';
        echo $head . $body . $tail;
        echo '</ul></nav>';
    }
}