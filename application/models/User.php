<?php

Class User extends CI_Model
{

    function login($mail, $password)
    {
        $this->db->select('id, mail, password');
        $this->db->from('user');
        $this->db->where('mail', $mail);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function register($mail, $password) {
        $data=array(
            'mail'=>$mail,
            'password'=>md5($password)
        );

        if($this->userExists($mail)) {
            throw new Exception("Benutzer schon vorhanden!");
        }

        $this->db->insert('user', $data);

        $sess_array = array(
            'id' => $this->db->insert_id(),
            'username' => $mail
        );
        $this->session->set_userdata('logged_in', $sess_array);
    }

    function userExists($mail) {
        $this->db->select('id, mail, password');
        $this->db->from('user');
        $this->db->where('mail', $mail);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}

?>
