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
        $this->db->select('List.*');
        $this->db->from('List');
        $this->db->join('Editor', 'Editor.list_id = List.id', 'left');
        $this->db->where('List.user_id', $user_id);
        $this->db->or_where('Editor.user_id', $user_id);
        $this->db->group_by("List.id");

        $query = $this->db->get();
        return $query->result();
    }

    function create($text, $amount, $list_id, $user_id) {
        $this->db->insert("List", array("name" => $text, "user_id" => $user_id));
        return $this->db->insert_id();
    }

    function delete($list_id) {
        // editoren löschen
        $this->db->delete('Editor', array('list_id' => $list_id));

        // liste has elements holen
        $query = $this->db->get_where('List_has_Listelement', array('list_id' => $list_id));
        foreach($query->result() as $item) {

            // list has elemenets löschen
            $this->db->delete('List_has_Listelement', array('Listelement_id' => $item->Listelement_id));

            // listelements löschen
            $this->db->delete('Listelement', array('id' => $item->Listelement_id));
        }

        // list löschen
        $this->db->delete('List', array('id' => $list_id));
    }

}