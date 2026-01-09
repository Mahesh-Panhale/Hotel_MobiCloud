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
        <!-- partial:partials/_sidebar.html -->
 <?php $this->load->view('includes/sidebar'); ?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
     
<div class="row">
  <div class="col-md-10 mx-auto">
    <div class="card shadow-sm">
      <div class="card-body">

        <h4 class="card-title mb-4">
          <i class="mdi mdi-account-circle-outline me-2"></i>My Profile
        </h4>

        <div class="row align-items-center">

          <!-- LEFT: USER AVATAR -->
          <div class="col-lg-3 col-md-4 text-center border-end pe-lg-5">

            <div class="avatar-placeholder mx-auto mb-4">
              <i class="mdi mdi-account-tie display-1 text-primary"></i>
            </div>

            <h5 class="mb-1"><?= htmlspecialchars($user->name) ?></h5>
            <p class="text-muted mb-1 text-capitalize">
              <?= str_replace('_', ' ', $user->role) ?>
            </p>
            <p class="text-muted small mb-3"><?= $user->department ?></p>

            <span class="badge <?= $user->status == 'active' ? 'bg-success' : 'bg-danger' ?>">
              <?= ucfirst($user->status) ?>
            </span>
          </div>

          <!-- RIGHT: DETAILS -->
          <div class="col-lg-9 col-md-8 mt-4 mt-md-0">

            <h6 class="mb-3 text-primary">User Details</h6>

            <div class="row g-3">

              <div class="col-md-6">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($user->name) ?>" readonly>
              </div>

              <div class="col-md-6">
                <label class="form-label">Email Address</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($user->email) ?>" readonly>
              </div>

              <div class="col-md-6">
                <label class="form-label">Mobile Number</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($user->mobile) ?>" readonly>
              </div>

              <div class="col-md-6">
                <label class="form-label">Department</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($user->department) ?>" readonly>
              </div>

              <div class="col-md-6">
                <label class="form-label">Role</label>
                <input type="text" class="form-control text-capitalize"
                       value="<?= str_replace('_',' ',$user->role) ?>" readonly>
              </div>

              <div class="col-md-6">
                <label class="form-label">Account Status</label>
                <input type="text" class="form-control"
                       value="<?= ucfirst($user->status) ?>" readonly>
              </div>

            </div>

          </div>

        </div>

      </div>
    </div>
  </div>
</div>

    </div>
  </div>
</div>

<!-- Optional: Custom CSS for larger icon avatar -->
<style>
  .avatar-placeholder {
    width: 150px;
    height: 150px;
    background: linear-gradient(135deg, #e3f2fd, #bbdefb);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }
  .avatar-placeholder i {
    font-size: 80px;
    opacity: 0.9;
  }
</style>



         
           
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2026.  All rights reserved.</span>
  
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