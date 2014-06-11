<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 02.06.14
 * Time: 10:38
 * To change this template use File | Settings | File Templates.
 */

class MY_BaseController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(TRUE);
        $data = $this->session->userdata('logged_in');
        // sind daten in dem array drin?
        if(count($data) >= 1) {
            if(!count($data['id']) && !count($data['username'])) {
                $this->goToLoginPage();
            }
        } else {
            $this->goToLoginPage();
        }
    }

    function goToLoginPage() {
        redirect('/login/index');
    }

    function getCurrentUserId() {
        return $this->session->userdata('logged_in')["id"];
    }

    function json($arr) {
        $this->output->enable_profiler(false);
        header('Content-Type: application/json');
        echo json_encode( $arr );
    }
}
