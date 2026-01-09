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
  <div class="col-md-8 mx-auto grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title mb-4">Add New Staff</h4>

        <!-- Flash Messages -->
        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <?= validation_errors('<div class="alert alert-danger">','</div>'); ?>

        <form method="post"
      action="<?= base_url('welcome/add_staff_action') ?>"
      id="addStaffForm"
      onsubmit="return validateStaffForm();">


          <!-- Name -->
          <div class="form-group mb-3">
            <label>Staff Name</label>
            <input type="text" name="name" class="form-control" oninput="this.value=this.value.replace(/[^A-Za-z ]/g,'')" required>

          </div>

          <!-- Email -->
          <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>

          <!-- Mobile -->
          <div class="form-group mb-3">
            <label>Mobile</label>
           <input type="text" name="mobile" class="form-control"
       maxlength="10"
       oninput="this.value=this.value.replace(/[^0-9]/g,'')">

          </div>

          <!-- Department -->
          <div class="form-group mb-3">
            <label>Department</label>
            <select name="department" class="form-control">
              <option value="">Select</option>
              <option>Housekeeping</option>
              <option>Reception</option>
              <option>Maintenance</option>
              <option>Kitchen</option>
              <option>Security</option>
            </select>
          </div>

          <!-- Role -->
          <div class="form-group mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
              <option value="">Select Role</option>
              <option value="cleaning_staff">Cleaning Staff</option>
              <option value="kitchen_staff">Kitchen Staff</option>
              <option value="security_staff">Security Staff</option>
              <option value="reception_staff">Reception Staff</option>
            </select>
          </div>

          <!-- Password -->
          <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <!-- Status -->
          <div class="form-group mb-4">
            <label>Status</label>
            <select name="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>

          <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-light me-2">Reset</button>
            <button type="submit" class="btn btn-primary">Add Staff</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>




         
           
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
   
  <script>
function validateStaffForm() {

  // Get fields
  const name = document.querySelector('input[name="name"]');
  const email = document.querySelector('input[name="email"]');
  const mobile = document.querySelector('input[name="mobile"]');
  const role = document.querySelector('select[name="role"]');
  const department = document.querySelector('select[name="department"]');
  const password = document.querySelector('input[name="password"]');

  // Regex patterns
  const nameRegex   = /^[A-Za-z ]+$/;
  const emailRegex  = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const mobileRegex = /^[0-9]{10}$/;

  // Name validation
  if (!nameRegex.test(name.value.trim())) {
    alert("Staff name should contain only letters and spaces.");
    name.focus();
    return false;
  }

  // Email validation
  if (!emailRegex.test(email.value.trim())) {
    alert("Please enter a valid email address.");
    email.focus();
    return false;
  }

  // Mobile validation (optional but if filled, must be valid)
  if (mobile.value.trim() !== "" && !mobileRegex.test(mobile.value.trim())) {
    alert("Mobile number must contain exactly 10 digits.");
    mobile.focus();
    return false;
  }

  // Department validation
  if (department.value === "") {
    alert("Please select a department.");
    department.focus();
    return false;
  }

  // Role validation
  if (role.value === "") {
    alert("Please select a role.");
    role.focus();
    return false;
  }

  // Password validation
  if (password.value.length < 6) {
    alert("Password must be at least 6 characters long.");
    password.focus();
    return false;
  }

  return true; // allow form submit
}
</script>

  </body>
</html>