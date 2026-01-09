<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/datatables.net-bs5/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
  <style>
    :root {
      --hotel-primary: #2c3e50;
      /* Navy */
      --hotel-accent: #e67e22;
      /* Gold */
      --hotel-success: #27ae60;
      --hotel-warning: #f39c12;
      --hotel-danger: #c0392b;
      --hotel-info: #3498db;
    }

    .stat-card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-5px);
    }

    .badge-priority-high {
      background-color: var(--hotel-danger);
    }

    .badge-priority-medium {
      background-color: var(--hotel-warning);
    }

    .badge-priority-low {
      background-color: var(--hotel-info);
    }

    .table-responsive {
      border-radius: 12px;
      overflow: hidden;
    }

    /* Responsive & Scrollable Tables with Fixed Header */
    .table-scroll-wrapper {
      max-height: 500px;
      /* Adjust height as needed (e.g., 400px for smaller screens) */
      overflow-y: auto;
      overflow-x: auto;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .table-scroll-wrapper thead th {
      position: sticky;
      top: 0;
      background: #fff;
      /* Keeps header background white when scrolling */
      z-index: 10;
      box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.1);
    }

    .table-scroll-wrapper thead th:first-child {
      left: 0;
      z-index: 11;
    }

    /* Optional: Make first column sticky too (e.g., Task Title) */
    .table-scroll-wrapper tbody td:first-child {
      position: sticky;
      left: 0;
      background: #f8f9fa;
      z-index: 5;
    }
  </style>
</head>

<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <a class="navbar-brand brand-logo me-5" href="index.html"><img src="<?= base_url('assets/') ?>images/logo.jpeg" class="me-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url('assets/') ?>images/logo2.jpeg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                
              </div>
           
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
         

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php $this->load->view('includes/sidebar'); ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="me-md-3 me-xl-5">
                  <?php
  $role = $this->session->userdata('role');

  $role_titles = [
    'admin'            => 'Administrator',
    'cleaning_staff'   => 'Cleaning Staff',
    'kitchen_staff'    => 'Kitchen Staff',
    'security_staff'   => 'Security Staff',
    'reception_staff'  => 'Reception Staff'
  ];

  $display_role = $role_titles[$role] ?? 'Staff';
?>

<h3 class="font-weight-bold">
  Welcome back, <?= $display_role ?> 👋
</h3>

<p class="mb-0 text-muted">
  Hotel MobiCloud Staff Management System – Dashboard Overview
</p>

                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <button class="btn btn-outline-light btn-sm border-0 bg-white shadow-sm">
                    <i class="bi bi-calendar3 me-2"></i> Today (<?php echo date('d M Y'); ?>)
                  </button>
                </div>
              </div>
            </div>
          </div>

          <?php if ($this->session->userdata('role') === 'admin'): ?>

            <!-- ==================== ADMIN DASHBOARD ==================== -->
            <div class="row mt-4">

              <!-- Total Staff -->
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 stretch-card">
                <div class="card stat-card bg-gradient-primary text-white">
                  <div class="card-body d-flex align-items-center">
                    <i class="bi bi-people-fill fs-1 me-4"></i>
                    <div>
                      <p class="mb-1">Total Staff</p>
                      <h3 class="mb-0 fw-bold"><?= $total_staff ?></h3>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Total Tasks -->
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 stretch-card">
                <div class="card stat-card bg-gradient-info text-white">
                  <div class="card-body d-flex align-items-center">
                    <i class="bi bi-list-task fs-1 me-4"></i>
                    <div>
                      <p class="mb-1">Total Tasks</p>
                      <h3 class="mb-0 fw-bold"><?= $total_tasks ?></h3>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Pending Tasks -->
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 stretch-card">
                <div class="card stat-card bg-gradient-warning text-white">
                  <div class="card-body d-flex align-items-center">
                    <i class="bi bi-clock-history fs-1 me-4"></i>
                    <div>
                      <p class="mb-1">Pending Tasks</p>
                     <h3 class="mb-0 fw-bold"><?= $pending_tasks ?></h3>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Completed Tasks -->
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 stretch-card">
                <div class="card stat-card bg-gradient-success text-white">
                  <div class="card-body d-flex align-items-center">
                    <i class="bi bi-check2-all fs-1 me-4"></i>
                    <div>
                      <p class="mb-1">Completed Tasks</p>
                      <h3 class="mb-0 fw-bold"><?= $completed_tasks ?></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Recent Tasks Table -->
            <div class="row mt-4">
              <div class="col-12 stretch-card">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h4 class="card-title mb-4">
                      <i class="bi bi-journal-text me-2"></i>Recent Task Assignments
                    </h4>

                    <div class="table-responsive table-scroll-wrapper">
                      <table class="table table-hover align-middle">
                        <thead class="table-light">
                          <tr>
                            <th>Staff</th>
                            <th>Task Title</th>
                            <th>Department</th>
                            <th>Deadline</th>
                           <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
<?php foreach ($recent_tasks as $t): ?>
<tr>
  <td><?= $t->name ?></td>
  <td><?= $t->task_title ?></td>
  <td><?= $t->department ?></td>
  <td><?= date('d M Y', strtotime($t->deadline)) ?></td>
 
  <td>
    <span class="badge <?= $t->status=='pending'?'bg-warning':'bg-success' ?>">
      <?= ucfirst($t->status) ?>
    </span>
  </td>
  <td>
    <a href="<?= base_url('welcome/all_tasks') ?>" class="btn btn-sm btn-outline-primary">View</a>
  </td>
</tr>
<?php endforeach; ?>
</tbody>

                      </table>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          <?php endif; ?>


          <?php if (in_array(
            $this->session->userdata('role'),
            ['cleaning_staff', 'kitchen_staff', 'security_staff']
          )): ?>

            <!-- ==================== STAFF DASHBOARD ==================== -->
            <div class="row mt-4">

              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card stat-card bg-gradient-info text-white">
                  <div class="card-body d-flex align-items-center">
                    <i class="bi bi-list-check fs-1 me-4"></i>
                    <div>
                      <p class="mb-1">My Tasks</p>
                      <h3 class="mb-0 fw-bold"><?= $my_tasks ?></h3>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card stat-card bg-gradient-warning text-white">
                  <div class="card-body d-flex align-items-center">
                    <i class="bi bi-hourglass-split fs-1 me-4"></i>
                    <div>
                      <p class="mb-1">Pending</p>
                      <h3 class="mb-0 fw-bold"><?= $my_pending ?></h3>

                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                <div class="card stat-card bg-gradient-success text-white">
                  <div class="card-body d-flex align-items-center">
                    <i class="bi bi-check-circle-fill fs-1 me-4"></i>
                    <div>
                      <p class="mb-1">Completed</p>
                      <h3 class="mb-0 fw-bold"><?= $my_completed ?></h3>

                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- My Assigned Tasks -->
            <div class="row mt-4">
              <div class="col-12 stretch-card">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h4 class="card-title mb-4">
                      <i class="bi bi-clipboard-check me-2"></i>My Assigned Tasks
                    </h4>

                    <div class="table-responsive table-scroll-wrapper">
                      <table class="table table-hover align-middle">
                        <thead class="table-light">
                          <tr>
                            <th>Task Title</th>
                            <th>Description</th>
                            <th>Deadline</th>
                            
                            <th>Status</th>
                            <th>Notes</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      <tbody>
<?php foreach ($my_recent_tasks as $t): ?>
<tr>
  <td><?= $t->task_title ?></td>
  <td><?= $t->task_description ?: '-' ?></td>
  <td><?= date('d M Y', strtotime($t->deadline)) ?></td>

  <td>
    <span class="badge <?= $t->status=='pending'?'bg-warning':'bg-success' ?>">
      <?= ucfirst($t->status) ?>
    </span>
  </td>
  <td><?= $t->update_note ?: '-' ?></td>
  <td>
    <a href="<?= base_url('welcome/my_tasks') ?>" class="btn btn-sm btn-primary">Open</a>
  </td>
</tr>
<?php endforeach; ?>
</tbody>

                      </table>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          <?php endif; ?>



        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2026. All rights reserved.</span>

      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url('assets/') ?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url('assets/') ?>vendors/chart.js/chart.umd.js"></script>
  <script src="<?= base_url('assets/') ?>vendors/datatables.net/jquery.dataTables.js"></script>
  <!-- <script src="<?= base_url('assets/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
  <script src="<?= base_url('assets/') ?>vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
  <script src="<?= base_url('assets/') ?>js/dataTables.select.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url('assets/') ?>js/off-canvas.js"></script>
  <script src="<?= base_url('assets/') ?>js/template.js"></script>
  <script src="<?= base_url('assets/') ?>js/settings.js"></script>
  <script src="<?= base_url('assets/') ?>js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url('assets/') ?>js/jquery.cookie.js" type="text/javascript"></script>
  <script src="<?= base_url('assets/') ?>js/dashboard.js"></script>
  <!-- <script src="<?= base_url('assets/') ?>js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->
</body>

</html>