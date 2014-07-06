<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 05.07.14
 * Time: 18:07
 * To change this template use File | Settings | File Templates.
 */

class Invite extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("ListelementsModel");

    }

    function index($list_id) {
        // echo $list_id;
        $vars['data'] = $this->ListelementsModel->getListElementsByListId($list_id);
        $vars["list_id"] = $list_id;
        $data['title'] = 'Listen Übersicht';
        $data['content'] = $this->load->view('listelements/index2', $vars, TRUE);
        $this->load->view('template', $data);
    }
}