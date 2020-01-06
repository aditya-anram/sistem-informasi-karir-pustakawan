<?php
   session_start();
   if(isset($_SESSION['username'])) {
   header('location:index.php'); }
?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Karir Pustakawan | Daftar Akun</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
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
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" form action="proses_daftar_akun.php" method="post">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Daftar Akun Baru</h3>
                <p>Masukan Data Dengan Benar</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" type="password" required="" placeholder="Password">
                </div>
                
                <div class="form-group">
                       <select name="level" class="form-control" required>
                           <option>Pilih level akun</option>

                           <option value="terampil">Pustakawan Terampil</option>
                           <option value="ahli">Pustakawan Ahli</option>
                         
                       </select>
                </div>

                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Daftar</button>
                </div>
                
               
            </div>
            <div class="card-footer bg-white">
                <p>Sudah memiliki akun? <a href="index.php" class="text-secondary">Login</a></p>
            </div>
        </div>
    </form>
</body>

 
</html>