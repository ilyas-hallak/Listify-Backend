<?php

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(TRUE);
    }

    function index()
    {
        $this->load->helper(array('form'));
        $data = $this->session->userdata('logged_in');
        if(count($data) > 1) {
            if(count($data['id']) && count($data['username'])) {
                // user ist noch eingeloggt
                $this->goToHome();
            }
        }
        $this->load->view('login');
    }

    function goToHome() {
        redirect('/home/index');
    }

    function register()
    {
        $this->load->view('register');
    }

    public function registration()
    {
        $this->load->library('form_validation');
        $this->load->model('user','',TRUE);

        // field name, error message, validation rules
        $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('register');
        } else {
            try {
                $this->user->register($this->input->post('email'), $this->input->post('password'));
                $this->goToHome();
            } catch(Exception $e) {
                $this->load->view('register', array("error"=>$e->getMessage()));
            }

        }


    }
}

?>