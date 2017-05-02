<?php

class Items_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function items_count($category_id = 0, $like = '') {
        if ($category_id != 0) {
            $this->db->where('category_id', $category_id);
        }
        $tok = strtok($like, ' ');
        while ($tok) {
            $this->db->group_start()
                    ->like('name', $tok)
                    ->or_like('description', $tok)
                    ->group_end();
            $tok = strtok(' ');
        }
        return $this->db->count_all_results('items');
    }

    public function get_items($category_id = 0, $like = '', $page = 0, $sortby = 0, $how_many = 10) {

        if ($sortby < 0 || $sortby > 2) {
            $sortby = 0;
        }
        $sort = array('id ASC', 'id DESC', 'price ASC');
        if ($category_id) {
            $this->db->where(array('category_id' => $category_id));
        }
        // if $page is -1, get everything.  Otherwise, limit the results
        $tok = strtok($like, ' ');
        while ($tok) {
            $this->db->group_start()
                    ->like('name', $tok)
                    ->or_like('long_description', $tok)
                    ->group_end();
            $tok = strtok(' ');
        }
        $this->db->order_by($sort[$sortby]);
        $this->db->limit($how_many, $page * $how_many);


        return $this->db->get('items_view')->result_array();
    }

//    public function get_items($category_id,$page = -1) {
//        return $this->db->get_where('items_briefdescription_view', array('category_id' => $category_id))->result();
//    }

    public function get_item($id) {
        return $this->db->get_where('items_view', array('id' => $id))->row_array();
    }

    public function add_item($item) {

        $data = array(
            'name' => $item['name'],
            'description' => $item['description'],
            'price' => $item['price'],
            'category_id' => $item['category_id'],
            'photo' => $item['photo_id'],
            'seller_id' => $item['seller_id'],
            'location_id' => $item['location_id']
        );
        $this->db->insert('items', $data);
        return $this->db->insert_id();
    }

    public function get_seller_items($seller_id) {
        return $this->db->where('seller_id', $seller_id)
                        ->get('items_view')
                        ->result_array();
    }

    public function update_photo_id($item_id, $photo_id) {
        $this->db->where('item_id', $item_id)
                ->set('photo_id', $photo_id)
                ->update('items');
    }

    public function delete_item($id) {
        $this->db->delete('items', array('id' => $id));
    }

    public function validate_ownership($id, $seller_id) {
        return ($this->db->where('seller_id', $seller_id)
                        ->where('id', $id)
                        ->count_all_results('items') == 1);
    }

}
