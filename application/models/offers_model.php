<?php 

class Offers_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function offers_by_day($day)
    {

        $query = $this->db->query("SELECT `id`, `from` , `to` , `uptime` , `vehicle` from offers where uptime > '".$day."'");
        return $query->result_array();
    }

    // function insert_entry()
    // {
    //     $this->title   = $_POST['title']; // please read the below note
    //     $this->content = $_POST['content'];
    //     $this->date    = time();

    //     $this->db->insert('entries', $this);
    // }

    // function update_entry()
    // {
    //     $this->title   = $_POST['title'];
    //     $this->content = $_POST['content'];
    //     $this->date    = time();

    //     $this->db->update('entries', $this, array('id' => $_POST['id']));
    // }

}