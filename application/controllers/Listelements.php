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
        $this->load->model("ListelementsModel");
    }

    function index($list_id) {

        $vars['data'] = $this->ListelementsModel->getListElementsByListAndUserId($list_id, $this->getCurrentUserId());
        $vars["list_id"] = $list_id;
        $data['title'] = 'Listen Übersicht';
        $data['content'] = $this->load->view('listelements/index', $vars, TRUE);
        $this->load->view('template', $data);
    }

    function create() {

        $user_id = $this->getCurrentUserId();
        $list_id = $this->input->post('list_id');
        $text = $this->input->post('text');
        $amount = $this->input->post('amount');
        $color_id = $this->ListelementsModel->create($text, $amount, $list_id, $user_id);
        $this->json($color_id);
    }

    function delete() {
        $id = $this->input->post('id');
        $this->ListelementsModel->delete($id);
    }

    function invite() {
        $mails = $this->input->post('mails');
        $list_id = $this->input->post('list_id');
        $this->ListelementsModel->invite($mails, $list_id);
    }
}