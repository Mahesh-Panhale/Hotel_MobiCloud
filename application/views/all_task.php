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
    .table-scroll-wrapper {
    max-height: 600px;                  /* Adjust as needed */
    overflow-y: auto;
    overflow-x: auto;
    border-radius: 12px;
}

.table-scroll-wrapper thead th {
    position: sticky;
    top: 0;
    background: #f8f9fa;
    z-index: 10;
    box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.1);
}

.table tbody tr:hover {
    background-color: rgba(230, 126, 34, 0.05); /* Subtle gold hover */
}

.badge {
    font-size: 0.8em;
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
  <div class="col-12 grid-margin stretch-card">
    <div class="card shadow-sm border-0" style="border-radius: 12px;">
      <div class="card-body">

       <div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="card-title mb-0"><i class="bi bi-list-task me-2 text-primary"></i>All Tasks</h4>
  <div class="d-flex gap-2 align-items-center">
    <!-- Search Input -->
    <div class="position-relative">
      <input type="text" id="taskSearch" class="form-control form-control-sm" placeholder="Search tasks..." style="width: 250px;">
      <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
    </div>
   
  </div>
</div>
<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show">
    <?= $this->session->flashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php endif; ?>

        <!-- Scrollable Table Wrapper -->
    <div class="table-responsive table-scroll-wrapper">
  <table class="table table-hover align-middle mb-0">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>Staff</th>
        <th>Task Title</th>
        <th>Description</th>
        <th>Deadline</th>
        <th>Status</th>
        <th>Update Note</th>
       <th class="text-center">Action</th>
      </tr>
    </thead>

    <tbody>
      <?php if (!empty($tasks)): ?>
        <?php foreach ($tasks as $i => $t): ?>
          <?php
            $is_overdue = strtotime($t->deadline) < strtotime(date('Y-m-d'));
            $row_class = $is_overdue && $t->status !== 'completed'
              ? 'table-danger bg-opacity-10'
              : '';
          ?>
          <tr class="<?= $row_class ?>">
            <td><?= $i + 1 ?></td>

            <td class="fw-medium">
              <?= htmlspecialchars($t->staff_name) ?>
            </td>

            

            <td class="fw-medium">
              <?= htmlspecialchars($t->task_title) ?>
            </td>

            <td>
              <?= $t->task_description
                  ? htmlspecialchars($t->task_description)
                  : '<span class="text-muted">-</span>' ?>
            </td>

            <td class="text-nowrap">
              <?= date('d M Y', strtotime($t->deadline)) ?>
              <?php if ($is_overdue && $t->status !== 'completed'): ?>
                <i class="bi bi-exclamation-triangle text-danger ms-2"
                   title="Overdue"></i>
              <?php endif; ?>
            </td>

            <td>
              <?php if ($t->status === 'pending'): ?>
                <span class="badge bg-warning text-dark rounded-pill">Pending</span>
              <?php elseif ($t->status === 'in_progress'): ?>
                <span class="badge bg-info rounded-pill">In Progress</span>
              <?php else: ?>
                <span class="badge bg-success rounded-pill">Completed</span>
              <?php endif; ?>
            </td>

            <td>
  <?= $t->update_note
      ? htmlspecialchars($t->update_note)
      : '<span class="text-muted">No update</span>' ?>
</td>

<td class="text-center">
  <button 
    class="btn btn-sm btn-outline-danger"
    onclick="deleteTask(<?= $t->id ?>)">
    <i class="bi bi-trash"></i>Delete
  </button>
</td>


          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="8" class="text-center py-5 text-muted">
            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
            <h5>No tasks found</h5>
            <p class="mb-0">Start by assigning tasks to your staff.</p>
          </td>
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


     <script>

      function deleteTask(taskId) {
  if (confirm("Are you sure you want to delete this task?")) {
    window.location.href = "<?= base_url('welcome/delete_task/') ?>" + taskId;
  }
} 

document.getElementById('taskSearch').addEventListener('input', function() {
    let searchValue = this.value.toLowerCase().trim();
    let table = document.querySelector('.table-scroll-wrapper table');
    let rows = table.querySelectorAll('tbody tr');

    // Skip the "No tasks found" row if it exists
    rows.forEach(row => {
        if (row.querySelector('td[colspan]')) {
            return; // Don't hide the empty state row
        }

        let cells = row.querySelectorAll('td');
        let found = false;

        // Search in these columns (index 1 to 6)
        for (let i = 1; i <= 6; i++) { // Skip # column (index 0)
            if (cells[i]) {
                let text = cells[i].textContent || cells[i].innerText;
                if (text.toLowerCase().includes(searchValue)) {
                    found = true;
                    break;
                }
            }
        }

        // Also search inside badges (like status)
        let badges = row.querySelectorAll('.badge');
        badges.forEach(badge => {
            if (badge.textContent.toLowerCase().includes(searchValue)) {
                found = true;
            }
        });

        // Show/hide row
        row.style.display = found || searchValue === '' ? '' : 'none';
    });

    // Optional: Show a message if no results
    let visibleRows = Array.from(rows).filter(row => 
        row.style.display !== 'none' && !row.querySelector('td[colspan]')
    );

    let noResultsRow = table.querySelector('tbody tr td[colspan="8"]');
    if (visibleRows.length === 0 && searchValue !== '') {
        if (!noResultsRow) {
            let tr = document.createElement('tr');
            tr.innerHTML = `
                <td colspan="8" class="text-center py-5 text-muted">
                    <i class="bi bi-search fs-1 d-block mb-3"></i>
                    <h5>No tasks match your search</h5>
                    <p class="mb-0">Try different keywords</p>
                </td>`;
            table.querySelector('tbody').appendChild(tr);
        }
    } else if (noResultsRow && searchValue === '') {
        noResultsRow.parentElement.remove();
    }
});
</script>
  </body>
</html>