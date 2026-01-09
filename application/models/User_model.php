<?php
class User_model extends CI_Model {

     public function __construct()
    {
        parent::__construct(); 
    }

    public function login($email) {
        return $this->db->where('email',$email)
                        ->where('status','active')
                        ->get('users')
                        ->row();
    }

     public function add_staff($data)
    {
        return $this->db->insert('users', $data);
    }

    public function email_exists($email)
    {
        return $this->db->where('email', $email)->get('users')->row();
    }

    public function get_all_staff()
{
    return $this->db
        ->where('role !=', 'admin')
        ->get('users')
        ->result();
}

public function get_staff_by_id($id)
{
    return $this->db->where('id', $id)->get('users')->row();
}

public function update_staff($id, $data)
{
    return $this->db->where('id', $id)->update('users', $data);
}

public function update_status($id, $status)
{
    return $this->db->where('id', $id)->update('users', ['status' => $status]);
}

public function count_staff()
{
    return $this->db
        ->where('role !=', 'admin')
        ->count_all_results('users');
}


public function get_user_by_id($id)
{
    return $this->db->where('id', $id)->get('users')->row();
}

public function update_user($id, $data)
{
    return $this->db->where('id', $id)->update('users', $data);
}





}
