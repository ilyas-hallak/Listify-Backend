<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 02.06.14
 * Time: 17:38
 * To change this template use File | Settings | File Templates.
 */

class ListelementsModel extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getListElementsByListAndUserId($list_id, $user_id, $public = false) {

            $sql = "SELECT Listelement.text, List_has_Listelement.`Color_id`, Color.value, User.mail, Listelement.id  FROM List
                INNER JOIN List_has_Listelement ON List.id = List_has_Listelement.List_id
                INNER JOIN Listelement ON List_has_Listelement.`Listelement_id` =  Listelement.id
                INNER JOIN User ON User.id = List_has_Listelement.user_id
                INNER JOIN Color ON List_has_Listelement.Color_id = Color.id
                WHERE List.id = ? AND List.user_id = ?";


        $query = $this->db->query($sql, array($list_id, $user_id));

        return $query->result();
    }

    function create($text, $amount, $list_id, $user_id) {
        // save list
        $this->db->insert("Listelement", array("text" => $text, "amount" => $amount));
        $listelement_id = $this->db->insert_id();

        // get/set color
        $query = $this->db->get_where('List_has_Listelement', array('User_id' => $user_id, "List_id" => $list_id), 1, 0);

        if(count($query->result())) {
            $color_id = $query->result()[0]->Color_id;
            $query = $this->db->get_where('Color', array("id" => $color_id));
            $colorVal = $query->result()[0]->value;
        } else {
            $this->db->order_by('id', 'RANDOM');
            $this->db->limit(1);
            $query = $this->db->get('Color');
            $color_id = $query->result()[0]->id;
            $colorVal = $query->result()[0]->value;
        }

        $query = $this->db->get_where('User', array("id" => $user_id));
        $mail = $query->result()[0]->mail;

        // insert relation
        $this->db->insert("List_has_Listelement", array("Listelement_id" => $listelement_id, "List_id" => $list_id, "User_id" => $user_id, "Color_id" => $color_id));
        return array("color" => $colorVal, "mail" => $mail);
    }

    function delete($id) {
        $this->db->delete('List_has_Listelement', array('Listelement_id' => $id));
        $this->db->delete('Listelement', array('id' => $id));
    }
}