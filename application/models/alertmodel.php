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

    function create($time, $date, $user_id, $list_id)
    {
        $dateTime  = date_create($date, $time);
        $formatDate = date_format($dateTime, 'Y-m-d H:i');
        $this->db->insert("alert", array("date" => $formatDate));
        $alert_id = $this->db->insert_id();
        $this->db->insert("list_has_alert", array("List_id" => $list_id, "List_user_id" => $user_id, "Alert_id" => $alert_id));
    }

    function reminder()
    {
        $this->db->select('*');
        $this->db->from('List_has_Alert');
        $this->db->join('Alert', 'Alert.id', 'List_has_Alert.alert_id');
        $this->db->join('User','User.id', 'List_user_id');

//        $format = "DATE_RFC1123";
        $datestring = "%Y-%m-%d %H:%i";

        $now = now();

        $mdate = mdate($datestring, $now);
       $this->db->like('date', $mdate);
        $this->db->group_by("User.id");
        $query = $this->db->get();

        foreach($query->result() as $item) {
            var_dump($item); echo "<hr>";
        }


    }

    private function sendMail($userName, $listName, $list_id) {
        $this->email->set_newline("\r\n");
        $text = "Hallo $userName,\n
                \n
                du hast eine Erinnerung auf $listName gelegt.\n
                Über folgenden Link kannst du die Liste einsehen:\n
                \n
                ".site_url("invite/index/".$list_id)."\n
                \n
                Um die Liste zu bearbeiten, kannst du dich hier kostenlos registrieren.\n
                \n
                Liebe Grüße,\n
                \n
                Dein Listify Team\n
                ";

        $this->email->clear();

        $this->email->to($list_id);
        $this->email->from('system@listify.com');
        $this->email->subject('Erinnerung Deiner Liste '.$listName);
        $this->email->message($text);
        echo $text;
        $this->email->send();
    }

} 