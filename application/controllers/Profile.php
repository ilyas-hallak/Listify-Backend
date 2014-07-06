<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 25.05.14
 * Time: 22:35
 * To change this template use File | Settings | File Templates.
 */

class Profile extends MY_BaseController
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $user_id = $this->session->userdata('logged_in')["id"];
        $query = $this->db->get_where('User', array("id" => $user_id));
        $result = $query->result();
        if(count($result)) {

            $data2['contentData'] = "profil";

            $data['title'] = 'Profil';
            $data['content'] = $this->load->view('profile/index', $result[0], TRUE);
            $this->load->view('template', $data);
        }


    }



}