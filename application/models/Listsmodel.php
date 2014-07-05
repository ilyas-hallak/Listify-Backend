<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 25.05.14
 * Time: 23:06
 * To change this template use File | Settings | File Templates.
 */

class Listsmodel extends CI_Model
{

    var $title = '';
    var $content = '';
    var $date = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getAllLists()
    {
        $query = $this->db->get('List');
        return $query->result();
    }

    function getAllListsByUserId($user_id)
    {
        $this->db->select('*');
        $this->db->from('List');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    function create($text, $amount, $list_id, $user_id) {
        $this->db->insert("List", array("name" => $text, "user_id" => $user_id));
        return $this->db->insert_id();
    }

}