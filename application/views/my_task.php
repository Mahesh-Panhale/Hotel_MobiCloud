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

        <h4 class="card-title">My Tasks</h4>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <div class="table-responsive mt-3">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Task</th>
                <th>Description</th>
                <th>Note</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php if(!empty($tasks)): ?>
                <?php foreach($tasks as $i => $t): ?>
                  <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $t->task_title ?></td>
                    <td><?= $t->task_description ?: '-' ?></td>
                    <td><?= $t->update_note ?: '-' ?></td>
                    <td><?= date('d M Y', strtotime($t->deadline)) ?></td>
                    <td>
                      <?php if($t->status == 'pending'): ?>
                        <span class="badge badge-warning">Pending</span>
                      <?php else: ?>
                        <span class="badge badge-success">Completed</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-primary"
                              data-bs-toggle="modal"
                              data-bs-target="#updateModal<?= $t->id ?>">
                        Update
                      </button>
                    </td>
                  </tr>

                  <!-- UPDATE MODAL -->
                  <div class="modal fade" id="updateModal<?= $t->id ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="post" action="<?= base_url('welcome/update_my_task') ?>">

                          <div class="modal-header">
                            <h5 class="modal-title">Update Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>

                          <div class="modal-body">
                            <input type="hidden" name="task_id" value="<?= $t->id ?>">

                            <div class="mb-3">
                              <label>Task</label>
                              <input type="text" class="form-control" value="<?= $t->task_title ?>" readonly>
                            </div>

                            <div class="mb-3">
                              <label>Status</label>
                              <select name="status" class="form-control">
                                <option value="pending" <?= $t->status=='pending'?'selected':'' ?>>Pending</option>
                                <option value="completed" <?= $t->status=='completed'?'selected':'' ?>>Completed</option>
                              </select>
                            </div>

                            <div class="mb-3">
                              <label>Update Note (Optional)</label>
                              <textarea name="update_note" class="form-control" rows="3"><?= $t->update_note ?></textarea>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Save</button>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- END MODAL -->

                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6" class="text-center">No tasks assigned</td>
                </tr>
              <?php endif; ?>
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