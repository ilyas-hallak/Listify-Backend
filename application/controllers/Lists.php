<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 25.05.14
 * Time: 22:35
 * To change this template use File | Settings | File Templates.
 */

class Lists extends CI_Controller {
    public function index()
    {

        $this->load->model('Listsmodel');

        $data2['contentData'] = $this->Listsmodel->getAllLists();

        $data['title'] = 'Listify';
        $data['content'] = $this->load->view('lists/index', $data2, TRUE);;
        $this->load->view('template', $data);
    }

    public function bla() {
        echo "bla";
    }
}