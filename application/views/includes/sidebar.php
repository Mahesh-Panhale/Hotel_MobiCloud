<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">

  <!-- DASHBOARD (ADMIN + STAFF) -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('welcome/dashboard') ?>">
      <i class="icon-grid menu-icon"></i>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>

  <!-- ================= ADMIN ONLY ================= -->
  <?php if ($this->session->userdata('role') === 'admin'): ?>

  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#staffMenu">
      <i class="icon-layout menu-icon"></i>
      <span class="menu-title">Staff</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="staffMenu">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('add-staff') ?>">Add Staff</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('staff-list') ?>">Staff List</a>
        </li>
      </ul>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#taskMenu">
      <i class="icon-columns menu-icon"></i>
      <span class="menu-title">Tasks</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="taskMenu">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('assign-task') ?>">Assign Task</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('tasks') ?>">All Tasks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('tasks/pending') ?>">Pending Tasks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('tasks/completed') ?>">Completed Tasks</a>
        </li>
      </ul>
    </div>
  </li>

  <?php endif; ?>
  <!-- ============== END ADMIN ================= -->



  <!-- ================= STAFF ONLY ================= -->
  <?php if ($this->session->userdata('role') !== 'admin'): ?>

  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#taskMenuStaff">
      <i class="icon-columns menu-icon"></i>
      <span class="menu-title">My Tasks</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="taskMenuStaff">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('welcome/my_tasks') ?>">My Assigned Tasks</a>
        </li>
      </ul>
    </div>
  </li>

  <?php endif; ?>
  <!-- ============== END STAFF ================= -->


  <!-- PROFILE (ADMIN + STAFF) -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('welcome/profile') ?>">
      <i class="icon-head menu-icon"></i>
      <span class="menu-title">My Profile</span>
    </a>
  </li>

  <!-- LOGOUT (ADMIN + STAFF) -->
  <li class="nav-item">
    <a class="nav-link text-danger" href="<?= base_url('welcome/logout') ?>">
      <i class="icon-power menu-icon"></i>
      <span class="menu-title">Logout</span>
    </a>
  </li>

</ul>

</nav>

