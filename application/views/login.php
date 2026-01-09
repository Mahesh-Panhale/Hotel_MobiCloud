<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Hotel MobiCloud</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f6f9;
      height: 100vh;
    }
    .login-card {
      max-width: 420px;
      width: 100%;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 15px 35px rgba(0,0,0,.1);
      padding: 40px;
    }
    .logo-box {
      width: 80px;
      height: 80px;
      margin: 0 auto 15px;
      border-radius: 14px;
      background: #0d6efd;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .logo-box i {
      font-size: 2.2rem;
      color: #fff;
    }
    .form-control {
      padding: 12px;
      border-radius: 10px;
      background: #f9f9f9;
    }
    .password-toggle {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #999;
    }
  </style>
</head>

<body>

<div class="d-flex align-items-center justify-content-center vh-100 px-3">

  <div class="login-card">

    <!-- LOGO -->
    <div class="text-center mb-4">
      <div class="logo-box">
        <img src="<?= base_url('assets/') ?>images/logo.jpeg" class="me-2" alt="logo" />
      </div>
      
      <p class="text-muted mb-0">Staff Management System</p>
    </div>

    <?php if($this->session->flashdata('error')): ?>
      <div class="alert alert-danger">
        <?= $this->session->flashdata('error') ?>
      </div>
    <?php endif; ?>

    <!-- LOGIN FORM -->
    <form method="post" action="<?= base_url('welcome/login_action') ?>">

      <!-- ROLE -->
      <div class="mb-3">
        <label class="form-label small fw-semibold">Login As</label>
        <select class="form-select" id="roleSelect" onchange="autoFill()" >
          <option value="">Select Role</option>
          <option value="admin">Admin</option>
          <option value="cleaning_staff">Cleaning Staff</option>
          <option value="kitchen_staff">Kitchen Staff</option>
          <option value="security_staff">Security Staff</option>
        </select>
        <p class="text-muted mb-0 fs-6" >Note:You Can Select Role From Here... </p>
      </div>

      <!-- EMAIL -->
      <div class="mb-3">
        <label class="form-label small fw-semibold">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
      </div>

      <!-- PASSWORD -->
      <div class="mb-4 position-relative">
        <label class="form-label small fw-semibold">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
        <i class="bi bi-eye-slash password-toggle" id="toggleIcon" onclick="togglePassword()"></i>
      </div>

      <div class="d-grid">
        <button class="btn btn-primary btn-lg">
          Login <i class="bi bi-arrow-right ms-1"></i>
        </button>
      </div>

    </form>

  </div>

</div>

<script>
function autoFill() {
  const role = document.getElementById("roleSelect").value;
  const creds = {
    admin: { email: "admin@hotel.com", pass: "password" },
    cleaning_staff: { email: "cleaning@hotel.com", pass: "password" },
    kitchen_staff: { email: "kitchen@hotel.com", pass: "password" },
    security_staff: { email: "security@hotel.com", pass: "password" }
  };
  if (creds[role]) {
    email.value = creds[role].email;
    password.value = creds[role].pass;
  }
}

function togglePassword() {
  const p = document.getElementById("password");
  const i = document.getElementById("toggleIcon");
  if (p.type === "password") {
    p.type = "text";
    i.classList.replace("bi-eye-slash","bi-eye");
  } else {
    p.type = "password";
    i.classList.replace("bi-eye","bi-eye-slash");
  }
}
</script>

</body>
</html>
