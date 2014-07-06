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

    function create($time, $date, $user_id, $list_id)
    {
        $dateTime  = date_create($date, $time);
        $formatDate = date_format($dateTime, 'Y-m-d H:i:s');
        $this->db->insert("alert", array("date" => $formatDate));
        $alert_id = $this->db->insert_id();
        $this->db->insert("list_has_alert", array("List_id" => $list_id, "List_user_id" => $user_id, "Alert_id" => $alert_id));
    }

    function reminder($user_id, $list_id, $alert_id)
    {
        $this->db->select('*');
        $this->db->from('List_has_Alert');
        $this->db->join('Alert', 'id = Alert.id');
        $now = now();
        $this->db->where('date', $now);


        $query = $this->db->get();
        return $query->result();
    }
} 