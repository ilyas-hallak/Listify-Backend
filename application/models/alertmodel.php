<?php
/**
 * Created by PhpStorm.
 * User: Naddel
 * Date: 23.06.14
 * Time: 11:38
 */

class alertmodel extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function create($time, $date, $user_id, $list_id)
    {
        $dateTime  = date_create($date, $time);
        $formatDate = date_format($dateTime, 'Y-m-d H:i:s');
        $this->db->insert("alert", array("date" => $formatDate));
        $alertid = $this->db->insert_id();


    }
} 