<?php
      session_start();
      if(isset($_SESSION['admin'])){
        header('location:home.php');
      }	
  ?>

    <?php include 'includes/header.php'; ?>

  <style>
    .auth-form-light {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.56);
      border-radius: 10px; /* Add rounded corners */
    }
    .blurred-background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5) url('/project/images/logbg.svg') no-repeat center center;
      background-size: cover;
      backdrop-filter: blur(5px);
      z-index: -1;
    }
  </style>

  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="blurred-background"></div>
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 10px;">
                  <img src="assets/images/logo.svg" alt="logo" style="max-width: 80px; margin-bottom: 5px;">
                  <h4>DICT- Aklan Provincial Field Office</h4>
                </div>
                <p class="fw-light mt-3">Sign in to continue.</p>
                <?php
                  if (isset($_SESSION['error'])) {
                      echo "<div class='alert alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between' role='alert'>
                              <span class='small flex-grow-1'>" . $_SESSION['error'] . "</span>
                              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' style='transform: scale(0.8);'></button>
                            </div>";
                      unset($_SESSION['error']);
                  }
                  ?>
                <form class="pt-3" action="login.php" method="POST">
                  <div class="form-group">
                    <label for="username" class="fw-medium">Username</label>
                    <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Enter username" required>
                  </div>
                  <div class="form-group mt-3">
                    <label for="password" class="fw-medium">Password</label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password" required>
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" name="login">Login</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>