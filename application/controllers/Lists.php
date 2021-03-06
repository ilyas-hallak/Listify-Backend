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
        $colorsArr = array();
        foreach($data2['contentData'] as $item) {
            $color = $this->Listsmodel->getColorsByListId($item->id);
            array_push($colorsArr, $color);
        }
        $data2['colors']  = $colorsArr;
        $data['title'] = 'Meine Listen';
        $data['content'] = $this->load->view('lists/index', $data2, TRUE);
        $this->load->view('template', $data);
    }

    public function create()
    {
        $this->load->model('Listsmodel');
        $user_id = $this->session->userdata('logged_in')["id"];
        $name = $this->input->post('name');
        $amount = 0;
        $list_id = $this->input->post('list_id');
        $id = $this->Listsmodel->create($name, $amount, $list_id, $user_id);
        redirect("/Listelements/index/".$id);
    }

    public function delete($list_id) {
        $this->load->model('Listsmodel');
        $this->Listsmodel->delete($list_id);
        redirect("/Lists/index/".$list_id);
    }

    public function update() {
        $list_id = $this->input->post('list_id');
        $listname = $this->input->post('listname');

        $this->db->where('id', $list_id);
        $this->db->update('List', array(
            'name' => $listname
        ));
        redirect("/Lists/index/".$list_id);
    }

}