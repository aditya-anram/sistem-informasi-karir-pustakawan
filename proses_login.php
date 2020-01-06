
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->

     <script type="text/javascript" src="sweetalert2/dist/sweetalert2.all.min.js"></script>
     <script type="text/javascript" src="sweetalert2/dist/sweetalert2.min.js"></script>
     <link rel="stylesheet" type="text/css" href="sweetalert2/dist/sweetalert2.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Karir Pustakawan | Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="assets/images/logo-min.png" alt="logo"></a><span class="splash-description">Sistem Karir Pustakawan <br> Universitas Ahmad Dahlan</span></div>
            <div class="card-body">
                <form action="proses_login.php" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" type="text" placeholder="Username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                     <input class="form-control form-control-lg" name="password" type="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Ingatkan Saya!</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="daftar_akun.php" class="footer-link">Daftar akun baru</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="lupa_password.php" class="footer-link">Lupa Password?</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>



<?php
   session_start();
   require_once("pdo_db.php");
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $query = $pdo->prepare("SELECT * FROM akun WHERE username='$username'");
   $query->execute(array($username));
   $hasil = $query->fetch();
   if($query->rowCount() == 0) {
     echo " <script type='text/javascript'>
                    Swal.fire({
                      position: 'middle',
                      type: 'error',
                      title: 'Username Belum Terdaftar, <br> Buat Akun Baru',
                      showConfirmButton: true,
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Oke'

                    }).then((result) => {
                      if(result.value){
                        location.href='daftar_akun.php'
                      }
                      })
            </script>";

   } else {
     if($pass <> $hasil['password']) {
       echo "<script type='text/javascript'>
                    Swal.fire({
                      position: 'middle',
                      type: 'error',
                      title: 'Password Anda Salah',
                      showConfirmButton: true,
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Coba Kembali'

                    }).then((result) => {
                      if(result.value){
                        location.href='index.php'
                      }
                      })
            </script>";
     } else {
      if($hasil['level']=="ahli" && $_SESSION['username'] = $hasil['username'] ){
       
       header('location:level/ahli/dashboard.php');
     }
      else if($hasil['level']=="terampil" && $_SESSION['username'] = $hasil['username'] ){
       
       header('location:level/terampil/dashboard.php');
     }
      else if($hasil['level']=="penilai" && $_SESSION['username'] = $hasil['username'] ){
       
       header('location:level/penilai/dashboard.php');
     }
     
   }
   }
?>