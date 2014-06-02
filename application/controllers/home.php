<?php
session_start(); //we need to call PHP's session object to access it through CI
class Home extends MY_BaseController {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data2['username'] = $session_data['username'];

            $data['title'] = 'Listen Übersicht';
            $data['content'] = $this->load->view('home', $data2, TRUE);
            $this->load->view('template', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'index');
    }

}

?>