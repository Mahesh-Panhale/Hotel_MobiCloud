<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	   public function __construct() {
        parent::__construct();
        $this->load->model(['User_model','Task_model']);
        $this->load->library(['session','form_validation']);
    }

	public function index()
	{
		$this->load->view('index');
	}

	   public function login() {
        $this->load->view('login');
    }

	 public function login_action() {

        $email    = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->login($email);

        if ($user && password_verify($password, $user->password)) {

            $this->session->set_userdata([
                'user_id' => $user->id,
                'name'    => $user->name,
                'role'    => $user->role,
                'logged_in' => true
            ]);

            redirect('dashboard');

        } else {
            $this->session->set_flashdata('error','Invalid email or password');
            redirect('login');
        }
    }

public function dashboard()
{
    if (!$this->session->userdata('logged_in')) {
        redirect('login');
    }

    $role = $this->session->userdata('role');

    if ($role === 'admin') {

        $data['total_staff']     = $this->User_model->count_staff();
        $data['total_tasks']     = $this->Task_model->count_all_tasks();
        $data['pending_tasks']   = $this->Task_model->count_pending_tasks();
        $data['completed_tasks'] = $this->Task_model->count_completed_tasks();
        $data['recent_tasks']    = $this->Task_model->recent_tasks();

    } else {

        $staff_id = $this->session->userdata('user_id');

        $data['my_tasks']        = $this->Task_model->my_task_count($staff_id);
        $data['my_pending']      = $this->Task_model->my_pending_count($staff_id);
        $data['my_completed']    = $this->Task_model->my_completed_count($staff_id);
        $data['my_recent_tasks'] = $this->Task_model->my_recent_tasks($staff_id);
    }

    $this->load->view('dashboard', $data);
}


    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

	public function add_staff()
{
  
    if ($this->session->userdata('role') !== 'admin') {
        redirect('dashboard');
    }

    $this->load->view('add_staff');
}

public function add_staff_action()
{
    if ($this->session->userdata('role') !== 'admin') {
        redirect('dashboard');
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('role', 'Role', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('add-staff');
        return;
    }

    // Check email duplicate
    if ($this->User_model->email_exists($this->input->post('email'))) {
        $this->session->set_flashdata('error', 'Email already exists');
        redirect('add-staff');
    }

    $data = [
        'name'       => $this->input->post('name'),
        'email'      => $this->input->post('email'),
        'mobile'     => $this->input->post('mobile'),
        'department' => $this->input->post('department'),
        'role'       => $this->input->post('role'),
        'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'status'     => $this->input->post('status')
    ];

    $this->User_model->add_staff($data);

    $this->session->set_flashdata('success', 'Staff added successfully');
    redirect('add-staff');
}


	public function staff_list()
{
    if ($this->session->userdata('role') !== 'admin') {
        redirect('dashboard');
    }

    $data['staff'] = $this->User_model->get_all_staff();
    $this->load->view('staff_list', $data);
}

public function update_staff()
{
    if ($this->session->userdata('role') !== 'admin') {
        redirect('dashboard');
    }

    $id = $this->input->post('id');

    $data = [
        'name'       => $this->input->post('name'),
        'email'      => $this->input->post('email'),
        'mobile'     => $this->input->post('mobile'),
        'department' => $this->input->post('department'),
        'role'       => $this->input->post('role')
    ];

    $this->User_model->update_staff($id, $data);
    $this->session->set_flashdata('success', 'Staff updated successfully');
    redirect('staff-list');
}

public function toggle_staff_status($id, $status)
{
    if ($this->session->userdata('role') !== 'admin') {
        redirect('dashboard');
    }

    $this->User_model->update_status($id, $status);
    redirect('staff-list');
}



	public function deactivate_staff()
	{
		$this->load->view('deactivate_staff');
	}

	public function assign_task()
{
    if ($this->session->userdata('role') !== 'admin') {
        redirect('dashboard');
    }

    // Get only staff (not admin)
    $data['staff'] = $this->db
        ->where('role !=', 'admin')
        ->where('status', 'active')
        ->get('users')
        ->result();

    $this->load->view('assign_task', $data);
}

public function assign_task_action()
{
    if ($this->session->userdata('role') !== 'admin') {
        redirect('dashboard');
    }

    $this->form_validation->set_rules('staff_id', 'Staff', 'required');
    $this->form_validation->set_rules('task_title', 'Task Title', 'required');
    $this->form_validation->set_rules('deadline', 'Deadline', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->assign_task();
        return;
    }

    $data = [
        'staff_id'         => $this->input->post('staff_id'),
        'task_title'       => $this->input->post('task_title'),
        'task_description' => $this->input->post('task_description'),
        'deadline'         => $this->input->post('deadline'),
        'status'           => 'pending'
    ];

    $this->Task_model->add_task($data);

    $this->session->set_flashdata('success', 'Task assigned successfully');
    redirect('assign-task');
}


	public function all_tasks()
{
   
    if ($this->session->userdata('role') !== 'admin') {
        redirect('dashboard');
    }

    $data['tasks'] = $this->Task_model->get_all_tasks();
    $this->load->view('all_task', $data);
}


	public function pending_tasks()
{
    // Only admin can see pending tasks
    if ($this->session->userdata('role') !== 'admin') {
        redirect('dashboard');
    }

    $data['tasks'] = $this->Task_model->get_pending_tasks();
    $this->load->view('pending_task', $data);
}


		public function completed_tasks()
{
    // Only admin can see pending tasks
    if ($this->session->userdata('role') !== 'admin') {
        redirect('dashboard');
    }

    $data['tasks'] = $this->Task_model->get_completed_tasks();
    $this->load->view('completed_task', $data);
}


	public function my_tasks()
{
    // Admin should NOT access this page
    if ($this->session->userdata('role') == 'admin') {
        redirect('dashboard');
    }

    // Staff must be logged in
    if (!$this->session->userdata('logged_in')) {
        redirect('login');
    }

    $staff_id = $this->session->userdata('user_id');

    $data['tasks'] = $this->Task_model->get_my_tasks($staff_id);
    $this->load->view('my_task', $data);
}


public function update_my_task()
{
    // Staff only
    if ($this->session->userdata('role') == 'admin') {
        redirect('dashboard');
    }

    $task_id  = $this->input->post('task_id');
    $staff_id = $this->session->userdata('user_id');

    $data = [
        'status'      => $this->input->post('status'),
        'update_note' => $this->input->post('update_note')
    ];

    $this->Task_model->update_task_by_staff($task_id, $staff_id, $data);

    $this->session->set_flashdata('success', 'Task updated successfully');
    redirect('my-tasks');
}



	public function profile()
{
    if (!$this->session->userdata('logged_in')) {
        redirect('login');
    }

    $user_id = $this->session->userdata('user_id');
    $data['user'] = $this->User_model->get_user_by_id($user_id);

    $this->load->view('profile', $data);
}
public function update_profile()
{
    if (!$this->session->userdata('logged_in')) {
        redirect('login');
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('full_name', 'Full Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[10]|max_length[10]');

    if ($this->form_validation->run() == FALSE) {
        $this->profile();
    } else {

        $user_id = $this->session->userdata('user_id');

        $updateData = [
            'name'   => $this->input->post('full_name'),
            'email'  => $this->input->post('email'),
            'mobile' => $this->input->post('mobile')
        ];

        $this->User_model->update_user($user_id, $updateData);

        // Update session data also
        $this->session->set_userdata([
            'full_name' => $updateData['name'],
            'email'     => $updateData['email'],
            'mobile'    => $updateData['mobile']
        ]);

        $this->session->set_flashdata('success', 'Profile updated successfully');
        redirect('profile');
    }
}

public function delete_task($id)
{
    // Security check (only admin can delete)
    if ($this->session->userdata('role') !== 'admin') {
        show_error('Unauthorized access', 403);
    }

    $this->load->model('Task_model');
    $this->Task_model->delete_task($id);

    $this->session->set_flashdata('success', 'Task deleted successfully');
    redirect('tasks');
}

	
}
