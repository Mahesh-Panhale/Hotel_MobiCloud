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
    max-height: 550px;
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
    background-color: rgba(220, 53, 69, 0.05); /* Light red hover for urgency */
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

      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
  <!-- Left: Title + Count Badge -->
  <div class="d-flex align-items-center gap-3">
    <h4 class="card-title mb-0 text-danger">
      <i class="bi bi-exclamation-triangle-fill me-2"></i>Pending Tasks
    </h4>
    <span class="badge bg-danger rounded-pill fs-6 px-3 py-2">
      <?= count($tasks ?? []) ?> Pending
    </span>
  </div>

  <!-- Right: Search Bar -->
  <div class="position-relative">
    <input 
      type="text" 
      id="pendingTaskSearch" 
      class="form-control form-control-sm border-danger" 
      placeholder="Search pending tasks..." 
      style="width: 280px; padding-left: 35px; padding-right: 40px;">
    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-danger"></i>
    <i class="bi bi-x-lg position-absolute top-50 end-0 translate-middle-y me-3 text-muted cursor-pointer" 
       id="clearPendingSearch" 
       style="display: none; font-size: 1.1rem;"></i>
  </div>
</div>

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
      </tr>
    </thead>

    <tbody>
      <?php if (!empty($tasks)): ?>
        <?php foreach ($tasks as $i => $t): ?>
          <?php
            $is_overdue = strtotime($t->deadline) < strtotime(date('Y-m-d'));
            $row_class = $is_overdue
              ? 'table-danger bg-opacity-10'
              : 'table-white bg-opacity-5';
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
              <?php if ($is_overdue): ?>
                <i class="bi bi-exclamation-circle-fill text-danger ms-2"
                   title="Overdue"></i>
              <?php endif; ?>
            </td>

            <td>
              <span class="badge bg-warning text-dark rounded-pill">
                <i class="bi bi-hourglass-split me-1"></i> Pending
              </span>
            </td>

            <td>
              <?= $t->update_note
                  ? htmlspecialchars($t->update_note)
                  : '<span class="text-muted">No update</span>' ?>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="8" class="text-center py-5 text-success">
            <i class="bi bi-check-circle-fill fs-1 d-block mb-3"></i>
            <h5 class="text-success">Great job!</h5>
            <p class="mb-0">No pending tasks at the moment. All caught up!</p>
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
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('pendingTaskSearch');
    const clearBtn = document.getElementById('clearPendingSearch');
    const table = document.querySelector('.table-scroll-wrapper table');
    const rows = table.querySelectorAll('tbody tr');

    // Live Search
    searchInput.addEventListener('input', function() {
        let value = this.value.toLowerCase().trim();
        
        // Show/hide clear button
        clearBtn.style.display = value ? 'block' : 'none';

        let visibleCount = 0;

        rows.forEach(row => {
            if (row.querySelector('td[colspan]')) return; // Skip empty state row

            let texts = row.textContent.toLowerCase();
            let match = texts.includes(value);

            row.style.display = match || value === '' ? '' : 'none';

            if (match) visibleCount++;
        });

        // Update badge count in real-time
        const badge = document.querySelector('.badge.bg-danger');
        if (badge) {
            badge.textContent = (value === '' ? <?= count($tasks ?? []) ?> : visibleCount) + ' Pending';
        }

        // Show "no results" if needed
        let noResultsRow = table.querySelector('tbody tr td[colspan="9"]');
        if (visibleCount === 0 && value !== '') {
            if (!noResultsRow) {
                let tr = document.createElement('tr');
                tr.innerHTML = `
                    <td colspan="9" class="text-center py-5 text-muted">
                        <i class="bi bi-search fs-1 d-block mb-3 text-danger"></i>
                        <h5>No pending tasks match your search</h5>
                        <p class="mb-0">Try different keywords like staff name or task title</p>
                    </td>`;
                table.querySelector('tbody').appendChild(tr);
            }
        } else if (noResultsRow) {
            noResultsRow.parentElement.remove();
        }
    });

    // Clear search
    clearBtn.addEventListener('click', function() {
        searchInput.value = '';
        searchInput.focus();
        clearBtn.style.display = 'none';
        searchInput.dispatchEvent(new Event('input')); // Trigger search reset
    });
});
</script>
  </body>
</html>