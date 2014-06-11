<?php
/**
 * Created by PhpStorm.
 * User: Naddel
 * Date: 11.06.14
 * Time: 15:35
 */

class Alert extends MY_BaseController{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['title'] = 'Meine Erinnerungen';
        $data['content'] = $this->load->view('alert/index', null, TRUE);
        $this->load->view('template', $data);
    }
    public function create($list_id)
    {
        $this->load->model('Alert');
        $user_id = $this->session->userdata('logged_in')["id"];
        $name = $this->input->post('zeit');

        $id = $this->Listsmodel->create($name, $user_id, $list_id);

        redirect("/lists/index/".$id);
    }
} 