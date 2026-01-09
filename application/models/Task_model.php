<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {

    public function add_task($data)
    {
        return $this->db->insert('tasks', $data);
    }

 public function get_all_tasks()
{
    return $this->db
        ->select('tasks.*, users.name AS staff_name')
        ->from('tasks')
        ->join('users', 'users.id = tasks.staff_id')
        ->order_by('tasks.id', 'DESC')
        ->get()
        ->result();
}

  public function delete_task($id)
    {
        return $this->db->where('id', $id)->delete('tasks');
    }

    public function get_tasks_by_staff($staff_id)
    {
        return $this->db
            ->where('staff_id', $staff_id)
            ->order_by('id', 'DESC')
            ->get('tasks')
            ->result();
    }

    public function get_pending_tasks()
{
    return $this->db
        ->select('tasks.*, users.name AS staff_name')
        ->from('tasks')
        ->join('users', 'users.id = tasks.staff_id')
        ->where('tasks.status', 'pending')
        ->order_by('tasks.deadline', 'ASC')
        ->get()
        ->result();
}

    public function get_completed_tasks()
{
    return $this->db
        ->select('tasks.*, users.name AS staff_name')
        ->from('tasks')
        ->join('users', 'users.id = tasks.staff_id')
        ->where('tasks.status', 'completed')
        ->order_by('tasks.deadline', 'ASC')
        ->get()
        ->result();
}

public function get_my_tasks($staff_id)
{
    return $this->db
        ->where('staff_id', $staff_id)
        ->order_by('deadline', 'ASC')
        ->get('tasks')
        ->result();
}

public function update_task_by_staff($task_id, $staff_id, $data)
{
    return $this->db
        ->where('id', $task_id)
        ->where('staff_id', $staff_id) // security check
        ->update('tasks', $data);
}
// ADMIN COUNTS
public function count_all_tasks()
{
    return $this->db->count_all('tasks');
}

public function count_pending_tasks()
{
    return $this->db->where('status', 'pending')->count_all_results('tasks');
}

public function count_completed_tasks()
{
    return $this->db->where('status', 'completed')->count_all_results('tasks');
}

public function recent_tasks()
{
    return $this->db
        ->select('tasks.*, users.name, users.department')
        ->from('tasks')
        ->join('users', 'users.id = tasks.staff_id')
        ->order_by('tasks.id', 'DESC')
        ->limit(5)
        ->get()
        ->result();
}

// STAFF COUNTS
public function my_task_count($staff_id)
{
    return $this->db->where('staff_id', $staff_id)->count_all_results('tasks');
}

public function my_pending_count($staff_id)
{
    return $this->db
        ->where('staff_id', $staff_id)
        ->where('status', 'pending')
        ->count_all_results('tasks');
}

public function my_completed_count($staff_id)
{
    return $this->db
        ->where('staff_id', $staff_id)
        ->where('status', 'completed')
        ->count_all_results('tasks');
}

public function my_recent_tasks($staff_id)
{
    return $this->db
        ->where('staff_id', $staff_id)
        ->order_by('id', 'DESC')
        ->limit(5)
        ->get('tasks')
        ->result();
}

}
