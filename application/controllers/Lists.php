<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 25.05.14
 * Time: 22:35
 * To change this template use File | Settings | File Templates.
 */

class Lists extends MY_BaseController
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('Listsmodel');
        $user_id = $this->session->userdata('logged_in')["id"];

        $data2['contentData'] = $this->Listsmodel->getAllListsByUserId($user_id);

        $data['title'] = 'Listen Übersicht';
        $data['content'] = $this->load->view('lists/index', $data2, TRUE);
        $this->load->view('template', $data);
    }

    public function create()
    {
        $this->load->model('Listsmodel');
        $user_id = $this->session->userdata('logged_in')["id"];
        $text = $this->input->post('text');
        $amount = 0;
        $list_id = $this->input->post('list_id');
        $id = $this->Listsmodel->create($text, $amount, $list_id, $user_id);

        redirect("/Listelements/index/".$id);
    }

    public function bla()
    {
        echo "bla";
    }
}