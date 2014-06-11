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

            $sql = "SELECT Listelement.text, List_has_Listelement.`Color_id`, Color.value, User.mail FROM List
                INNER JOIN List_has_Listelement ON List.id = List_has_Listelement.List_id
                INNER JOIN Listelement ON List_has_Listelement.`Listelement_id` =  Listelement.id
                INNER JOIN User ON User.id = List_has_Listelement.user_id
                INNER JOIN Color ON List_has_Listelement.Color_id = Color.id
                WHERE List.id = ? AND List.user_id = ?";


        $query = $this->db->query($sql, array($list_id, $user_id));

        return $query->result();
    }
}