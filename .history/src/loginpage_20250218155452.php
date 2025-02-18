<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location:home.php');
}
?>

<?php include 'includes/header.php'; ?>

<style>
    /* Ensure full-page background */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    /* Background Image with Blur Effect */
    .blurred-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('images/logbg.svg') no-repeat center center;
        background-size: cover;
        backdrop-filter: blur(5px); /* Keeps blur effect */
        z-index: -1;
    }

    /* Ensure content-wrapper does not override the background */
    .content-wrapper {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .auth-form-light {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.56);
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.85); /* Slightly transparent white */
        padding: 30px;
    }
</style>

<body>
    <div class="blurred-background"></div> <!-- Background Layer -->

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left">
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
                                            <input type="checkbox" class="form-check-input"> Keep me signed in
                                        </label>
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
    
    <!-- Plugins: JS -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/todolist.js"></script>
</body>
</html>
