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
    public function create()
    {
        $this->load->model('alertmodel');
        $user_id = $this->session->userdata('logged_in')["id"];
        $time = $this->input->post('zeit');
        $date = $this->input->post('date');
        $list_id = $this->input->post('list_id');
        $id = $this->alertmodel->create($time, $date, $user_id, $list_id);

        redirect("/lists/index/");
    }

    public function reminder() {
        $this->load->model('alertmodel');
        $id = $this->alertmodel->reminder();
    }

    public function reminderAjax() {
        $user_id = $this->input->post('user_id');
        $this->load->model('alertmodel');
        $data = $this->alertmodel->reminderByUserId($user_id);
        $this->json($data);
    }
} 