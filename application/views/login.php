
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Material Dash</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome-free/css/all.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/demo/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" />
  <style>
    .bar {
      background: #00c6ff;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #0072ff, #00c6ff);
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
  </style>
</head>

<body>
  <script src="<?= base_url() ?>assets/js/preloader.js"></script>
  <div class="body-wrapper">
    <div class="main-wrapper">
      <div class="page-wrapper full-page-wrapper d-flex align-items-center justify-content-center">
        <main class="auth-page">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-6-tablet">
                <div class="mdc-card">
                  <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "error") { ?>
                    <div class="alert" style="border:1px solid #ed0000;background-color:#ed0000;color:white; text-align: center;">
                      <strong style="color:yellow"><i class="fa fa-exclamation-triangle "></i> <b>Login failed!</b></strong><br>Invalid username or password
                    </div>
                  <?php } else if (isset($_GET['pesan']) && $_GET['pesan'] == "logout") { ?>
                    <div class="alert" style="border:1px solid #00aeed;background-color:#00aeed;color:black;text-align: center;">
                      <strong style="color:yellow"><i class="fa fa-exclamation-triangle "></i> <b>Anda telah logout!</b></strong><br>Silahkan Login untuk masuk kembali
                    </div>
                  <?php } else { ?>
                    <div class="alert bar" style="border:1px solid #00aeed;color:black;text-align: center;">
                      <strong style="color:yellow"><b>Selamat Datang..!</b></strong><br>Silahkan Login untuk masuk memulai session anda
                    </div>
                  <?php } ?>
                  <form action="<?= base_url()?>welcome/login" method="post">
                    <div class="mdc-layout-grid">
                      <div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100">
                            <input class="mdc-text-field__input" id="text-field-hero-input" name="username">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Username</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100">
                            <input class="mdc-text-field__input" type="password" id="text-field-hero-input" name="password">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Password</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <button type="submit" class="mdc-button mdc-button--raised w-100">
                            Login
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  <script src="<?= base_url() ?>assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?= base_url() ?>assets/js/material.js"></script>
  <script src="<?= base_url() ?>assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>