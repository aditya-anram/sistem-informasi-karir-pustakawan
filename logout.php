<!doctype html>
<html lang="en">
 
<head>

     <script type="text/javascript" src="sweetalert2/dist/sweetalert2.all.min.js"></script>
     <script type="text/javascript" src="sweetalert2/dist/sweetalert2.min.js"></script>
     <link rel="stylesheet" type="text/css" href="sweetalert2/dist/sweetalert2.min.css">
     
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
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
                    <a href="daftar_akun.php" class="footer-link">Buat akun baru</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Lupa Password?</a>
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
   session_destroy();
?>


<?php  
// echo " <script type='text/javascript'>
//                     Swal.fire({
//                       position: 'middle',
//                       type: 'success',
//                       title: 'Berhasil Logout',
//                       showConfirmButton: true,
//                       confirmButtonColor: '#3085d6',
//                       confirmButtonText: 'Oke'

//                     }).then((result) => {
//                       if(result.value){
//                         location.href='index.php'
//                       }
//                       })
//         </script>";

?>

