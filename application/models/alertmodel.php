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

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'listifytest@gmail.com',
            'smtp_pass' => 'hyn123456',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->load->helper('date');

        $this->email->initialize($config);
    }

    function create($time, $date, $user_id, $list_id) {

        $originalDate = $date." " .$time;
        $newDate = date("Y-m-d", strtotime($originalDate));

        $formatDate = $newDate." " .$time;

        $this->db->insert("alert", array("date" => $formatDate));
        $alert_id = $this->db->insert_id();


        $this->db->insert("list_has_alert", array("List_id" => $list_id, "List_user_id" => $user_id, "Alert_id" => $alert_id));
    }

    function reminder() {

        $this->db->select('*');
        $this->db->from('Alert');
        $this->db->join('List_has_Alert', 'Alert.id = List_has_Alert.alert_id', 'inner');
        $this->db->join('List', 'List.id = List_has_Alert.List_id', 'inner');
        $this->db->join('User','User.id = List_user_id', 'inner');

        $datestring = "%Y-%m-%d %H:%i";

        $now = now();

        $mdate = mdate($datestring, $now);
        $this->db->like('date', $mdate);
        $this->db->group_by("User.id");
        $query = $this->db->get();

        foreach($query->result() as $item) {
            $this->sendMail($item->mail, $item->name, $item->date, $item->List_id);
        }
    }

    private function sendMail($userName, $listName, $datum, $list_id) {
        $this->email->set_newline("\r\n");
        $text = "Hallo $userName,<br>
                <br>
                du hast eine Erinnerung um $datum auf $listName gelegt.<br>
                Über folgenden Link kannst du die Liste einsehen:<br>
                <br>
                ".site_url("listelements/index/".$list_id)."<br>
                <br>
                <br>
                Liebe Grüße,<br>
                <br>
                Dein Listify Team<br>
                ";

        $this->email->clear();

        $this->email->to($list_id);
        $this->email->from('system@listify.com');
        $this->email->subject('Erinnerung Deiner Liste '.$listName);
        $this->email->message($text);
        $this->email->send();
    }

} 