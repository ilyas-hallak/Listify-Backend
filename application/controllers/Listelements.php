<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 02.06.14
 * Time: 17:32
 * To change this template use File | Settings | File Templates.
 */

class Listelements extends MY_BaseController
{
    function __construct()
    {
        parent::__construct();
    }

    function index($list_id) {

        $this->load->model("ListelementsModel");
        $vars['data'] = $this->ListelementsModel->getListElementsByListAndUserId($list_id, $this->getCurrentUserId());

        $data['title'] = 'Listen Übersicht';
        $data['content'] = $this->load->view('listelements/index', $vars, TRUE);
        $this->load->view('template', $data);
    }
}