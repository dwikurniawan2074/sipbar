<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SIPBAR LOGIN</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/skydash/vendors/feather/feather.css">
  <link rel="stylesheet" href="/skydash/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/skydash/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/skydash/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/Images/bpkp_logo.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="/Images/bpkp_logo_edited.png" alt="logo">
              </div>
              <h4>Selamat Datang di Web Sistem Informasi Permintaan Barang</h4>
              <h6 class="font-weight-light">Silahkan Login Menggunakan Akun Yang Anda Miliki</h6>
              <?= form_open('login/cekUser'); ?>
              <?= csrf_field(); ?>
              <form class="pt-3">
                <div class="form-group">
                  <?php
                  if (session()->getFlashdata('errNamaRole')) {
                    $isInvalidUser = 'is-invalid';
                  } else {
                    $isInvalidUser = '';
                  }
                  ?>
                  <select class="form-control <?= $isInvalidUser ?>" name="nama_role" autofocus" required oninvalid="this.setCustomValidity('Role Belum Diinput')" oninput="this.setCustomValidity('')" style="color: black";>
                    <option disabled value="" selected>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--Pilih Login Sebagai--</option>
                    <?php foreach ($role as $key => $value) { ?>
                      <option value="<?= $value['nama_role']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $value['deskripsi_role']; ?></option>
                    <?php }; ?>
                  </select>
                  <?php
                  if (session()->getFlashdata('errNamaRole')) {
                    echo '<div id="validationServer03Feedback" class="invalid-feedback">'
                      . session()->getFlashdata('errNamaRole') . '</div>';
                  }
                  ?>
                </div>


                <div class="form-group">
                  <?php
                  if (session()->getFlashdata('errPassword')) {
                    $isInvalidPassword = 'is-invalid';
                  } else {
                    $isInvalidPassword = '';
                  }
                  ?>
                  <input type="password" class="form-control form-control-lg <?= $isInvalidPassword; ?>" name="pass" id="exampleInputPassword1" placeholder="Password" required oninvalid="this.setCustomValidity('Password Belum Diinput')" oninput="this.setCustomValidity('')">
                  <?php
                  if (session()->getFlashdata('errPassword')) {
                    echo '<div id="validationServer03Feedback" class="invalid-feedback">'
                      . session()->getFlashdata('errPassword') . '</div>';
                  }
                  ?>
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                </div>
                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div> -->
                <div class="text-center mt-4 font-weight-light">
                  Tidak mempunyai akun? <a href="https://wa.me/62895392795541" class="text-primary">Hubungi Admin</a>
                </div>
              </form>
              <?= form_close(); ?>

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
  <script src="/skydash/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/skydash/js/off-canvas.js"></script>
  <script src="/skydash/js/hoverable-collapse.js"></script>
  <script src="/skydash/js/template.js"></script>
  <script src="/skydash/js/settings.js"></script>
  <script src="/skydash/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>