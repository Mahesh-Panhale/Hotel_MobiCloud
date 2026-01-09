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
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title mb-4">Staff List</h4>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Department</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach($staff as $i => $s): ?>
              <tr>
                <td><?= $i+1 ?></td>
                <td><?= $s->name ?></td>
                <td><?= $s->email ?></td>
                <td><?= $s->mobile ?></td>
                <td><?= $s->department ?></td>
                <td><?= ucwords(str_replace('_',' ', $s->role)) ?></td>
                <td>
                  <?php if($s->status == 'active'): ?>
                    <span class="badge badge-success">Active</span>
                  <?php else: ?>
                    <span class="badge badge-danger">Inactive</span>
                  <?php endif; ?>
                </td>
                <td>
                  <button class="btn btn-sm btn-warning"
                          data-bs-toggle="modal"
                          data-bs-target="#editModal<?= $s->id ?>">
                    Edit
                  </button>

                  <?php if($s->status == 'active'): ?>
                    <a href="<?= base_url('welcome/toggle_staff_status/'.$s->id.'/inactive') ?>"
                       class="btn btn-sm btn-danger">
                       Deactivate
                    </a>
                  <?php else: ?>
                    <a href="<?= base_url('welcome/toggle_staff_status/'.$s->id.'/active') ?>"
                       class="btn btn-sm btn-success">
                       Activate
                    </a>
                  <?php endif; ?>
                </td>
              </tr>

              <!-- EDIT MODAL -->
              <div class="modal fade" id="editModal<?= $s->id ?>">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <form method="post" action="<?= base_url('welcome/update_staff') ?>">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Staff</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $s->id ?>">

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?= $s->name ?>" required>
                          </div>

                          <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $s->email ?>" required>
                          </div>

                          <div class="col-md-6 mb-3">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="<?= $s->mobile ?>">
                          </div>

                          <div class="col-md-6 mb-3">
                            <label>Department</label>
                            <input type="text" name="department" class="form-control" value="<?= $s->department ?>">
                          </div>

                          <div class="col-md-6 mb-3">
                            <label>Role</label>
                            <select name="role" class="form-control">
                              <option value="cleaning_staff" <?= $s->role=='cleaning_staff'?'selected':'' ?>>Cleaning</option>
                              <option value="kitchen_staff" <?= $s->role=='kitchen_staff'?'selected':'' ?>>Kitchen</option>
                              <option value="security_staff" <?= $s->role=='security_staff'?'selected':'' ?>>Security</option>
                              <option value="reception_staff" <?= $s->role=='reception_staff'?'selected':'' ?>>Reception</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- END MODAL -->

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

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
    <!-- <script src="<?= base_url('assets/') ?>js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
  </body>
</html>