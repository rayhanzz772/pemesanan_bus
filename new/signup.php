<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Material Design for Bootstrap</title>
  <!-- MDB icon -->
  <link rel="icon" href="login/img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="login/css/bootstrap-login-form.min.css" />
  <link rel="stylesheet" href="login/css/main.css" />
</head>

<body>
<?php
    include 'config.php';
    $db = new Database();
    ?>
  <!-- Start your project here-->
  <section class="vh-80" style="background-image: url('login/img/yogya.jpg'); background-size: cover; position: relative;">
  <div style="background-color: rgba(0, 0, 0, 0.5); position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <h3 class="mb-5">Sign up</h3>
              <form action="simpan_username.php" method="post">
              <div class="form-outline mb-4">
                <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="username" />
                <label class="form-label" for="typeEmailX-2">Username</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="email" />
                <label class="form-label" for="typeEmailX-2">Email</label>
              </div>
  
              <div class="form-outline mb-4">
                <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" />
                <label class="form-label" for="typePasswordX-2">Password</label>
              </div>
  
              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-start mb-4">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="form1Example3"
                />
                <label class="form-check-label" for="form1Example3"> Saya menyetujui syarat pengguna </label>
              </div>
  
              <button class="btn btn-primary btn-lg btn-block" type="submit">Sign up</button>
  
              <hr class="my-4">
              <div class="d-flex mb-4">
                <label>Sudah punya akun ?</label>
              </div>
              <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="submit"><i class="fab fa-google me-2"></i> Sign up</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>