<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:../../index.php'); 
} else { 
   $username = $_SESSION['username']; 
}
?>

<?php
    require('fungsi_terampil.php');
    $akses = new Sikap();
    $akses->koneksi();
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Karir Pustakawan | My Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <script type="text/javascript" src="sweetalert2/dist/sweetalert2.all.min.js"></script>
     <script type="text/javascript" src="sweetalert2/dist/sweetalert2.min.js"></script>
     <link rel="stylesheet" type="text/css" href="sweetalert2/dist/sweetalert2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
                <!-- Logo Website -->
                <img src="dist/img/uad.png" width="45px" height="45px">
                S I K A P
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user.jpg" class="user-image" alt="User Image">
               <?php
                                    foreach ($akses->datapenilai($username) as $lihat) {
                                        # code...
                                      echo "<span class='hidden-xs'>$lihat[nama]</span>";
                                        
                                    }
                                    ?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php
                                    foreach ($akses->datapenilai($username) as $lihat) {
                                        # code...
                                      echo "<span class='info-box-number'>$lihat[nama]</span>";
                                        
                                    }
                                    ?>
                  <small>PENILAI</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="ubahpass.php" class="btn btn-default btn-flat">Ubah Pasword</a>
                </div>
                <div class="pull-right">
                  <a href="../../logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">

  <!-- Left side column. contains the logo and sidebar -->
<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <?php
                                    foreach ($akses->datapenilai($username) as $lihat) {
                                        # code...
                                      echo "<p>$lihat[nama]</p>";
                                        
                                    }
                                    ?>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="hasil_pencarian_pustakawan.php" method="POST" class="sidebar-form">
        <div class="input-group">
        <input type="text"  pattern="[0-9]+" title="Masukan Nim Dengan Benar" name='niy' placeholder='Masukan NIY' class="form-control in-box"  required>
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu Navigasi</li>
        <li class="">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
         
        </li>
          <li class="active">
          <a href="lihat_data.php">
            <i class="fa fa-user"></i> <span>My Profil</span>
            
          </a>
         
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
        <small>Lihat Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> My Profile</a></li>
        <li class="active">Lihat Data</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">

       




       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> 

                              <i class="fa  fa-list-alt">
                               Resume Perhitungan Angka Kredit   
                               </i>
              </h3>
            </div>
       <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" >
               
                                   
                                              <?php
                                                   
                                               foreach ($akses-> datapenilai($username) as $lihat) {
                                                    

                                            
                                             
                                                    echo "

                                            <table >
                                               <tr> <td> NIDN              </td> <td> :  </td> <td>  $lihat[nidn]         </td> </tr>
                                                <tr> <td> NAMA              </td> <td> :  </td>  <td> $lihat[nama]        </td> </tr>
                                               
                                                
                                                

                                            </table>                   
                                                                                                     
                                                    "; 
                                               }
                    
                                             ?>  
                                             <br><br>

                                              <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Data</button>
                                <div id="tambah" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Tambah Biodata</h4>
                                                
                                            </div>
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                   
                                                    <div class="from-group">
                                                        <label class="control-label" for="nama">Nama</label>
                                                        <input type="text" name="nama" class="form-control" id="niy" required placeholder="Nama">
                                                        
                                                    </div>
                                                    

                                                    <div class="modal-footer">
                                                        <button type="reset" class="btn btn-danger">Reset</button>
                                                        <input type="submit" name="Simpan" class="btn btn-success" value="Simpan" onclick="if(!confirm('Data anda akan di simpan, apakah anda yakin?')){return false}">
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </form>

                                             <?php

                                                if(isset($_POST['Simpan'])){

                                                   
                                                    $nama = $_POST['nama'];
                                                   
                                                    



                                                     $ada = mysqli_num_rows($akses->datapenilai($username));
                                                          if ($ada){
                                                              echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'error',
                                                              title: 'Data Sudah Diinputkan',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='lihat_data.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                            }
                                                            else {
                                                                

                                                                  
                                                                   


                                                    $akses-> inputpenilai($username,$nama);
                                                    echo "

                                                                  <script type='text/javascript'>
                                                                    Swal.fire({
                                                                      position: 'middle',
                                                                      type: 'success',
                                                                      title: 'Berhasil Disimpan',
                                                                      showConfirmButton: true,
                                                                      confirmButtonColor: '#3085d6',
                                                                      confirmButtonText: 'OKE'

                                                                    }).then((result) => {
                                                                      if(result.value){
                                                                        location.href='lihat_data.php'
                                                                      }
                                                                      })
                                                                    </script>";
                                                }
                                            }

                                                ?>

                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <button type="button"  class="btn btn-warning" data-toggle="modal" data-target="#edit">Edit data</button>
                                <div id="edit" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Ubah Biodata</h4>
                                                
                                            </div>

                                            <?php
                                                 foreach ($akses-> datapenilai($username) as $lihat) {

                                            echo "

                                            <form method='POST' enctype='multipart/form-data'>
                                                <div class='modal-body'>
                                                    <div class='from-group'>
                                                        <label class='control-label' for='niy'>Niy</label>
                                                        <input type='text' name='niy' class='form-control' readonly id='niy' required placeholder='Nomor induk yayasan' value='$lihat[nidn]'>
                                                        
                                                    </div>
                                                    <div class='from-group'>
                                                        <label class='control-label' for='nama'>Nama</label>
                                                        <input type='text' name='nama' class='form-control' id='nama' required placeholder='Nama' value='$lihat[nama]'>
                                                        
                                                    </div>
                                                   
                                                    

                                                    <div class='modal-footer'>
                                                        <input type='submit' name='Simpan1' class='btn btn-success' value='Simpan' onclick='if(!confirm('Data anda akan di simpan, apakah anda yakin?')){return false}'>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </form>

                                            ";
                                          }

                                            ?>

                                              <?php

                                                if(isset($_POST['Simpan1'])){

                                                   
                                                    $nama = $_POST['nama'];
                                                  
                                                  
                                                                

                                                                  
                                                                   


                                                    $akses->ubahbiodata($username,$nama);
                                                    echo "

                                                                  <script type='text/javascript'>
                                                                    Swal.fire({
                                                                      position: 'middle',
                                                                      type: 'success',
                                                                      title: 'Berhasil diubah',
                                                                      showConfirmButton: true,
                                                                      confirmButtonColor: '#3085d6',
                                                                      confirmButtonText: 'OKE'

                                                                    }).then((result) => {
                                                                      if(result.value){
                                                                        location.href='lihat_data.php'
                                                                      }
                                                                      })
                                                                    </script>";
                                                }
                                            

                                                ?>

                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>






                                        
                                        
              </table>
            </div>
            <!-- /.box-body -->
          </div>


         











    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2019 </strong> . Perpustakaan Universitas Ahmad Dahlan 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        
        <ul class="control-sidebar-menu">
          
        </ul>
        <!-- /.control-sidebar-menu -->

        <!-- /.control-sidebar-menu -->

      </div>
     
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
