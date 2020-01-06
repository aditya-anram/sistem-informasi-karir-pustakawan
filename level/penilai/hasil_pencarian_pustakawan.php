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
  <title>Sistem Karir Pustakawan | Dashboard</title>
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

                 <?php
                                    foreach ($akses->datapenilai($username) as $lihat) {
                                        # code...
                                      echo "<p>$lihat[nama]<small>PENILAI</small></p>";
                                        
                                    }
                                    ?>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Ubah Pasword</a>
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

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
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
        <input type="text"  pattern="[0-9]+" title="Masukan Nim Dengan Benar" name='niy' placeholder='Masukan NIY' class="form-control in-box" name="nim" required>
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



         <li class="treeview">
                            <a href="lihat_data.php">
                                <i class="fa fa-user"></i>
                                <span>My Profile</span>
                                <i class="fa fa-angle-left pull-right"></i>
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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<!-- Main content -->
        <section class="content">

       <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pustakawan Tingkat</span>
              <span class="info-box-number">Penilai</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
      </div>

     



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
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
               
                                   
                                              <?php
  
  if(isset($_POST['search'])){


      $niy = $_POST['niy'];

      foreach ($akses->lihatdatapustakawan($niy) as $key) {

                                            
                                             
                                                    echo "

                                            <table>
                                                        
                                                <tr> <td> NIY      </td> <td> : $key[niy]      </td> </tr>
                                                <tr> <td> Nama     </td> <td> : $key[nama]        </td> </tr>
                                                <tr> <td> Tanggal Lahir </td> <td> : $key[tanggal_lahir]    </td> </tr>
                                                <tr> <td> Gendre  </td> <td> : $key[gendre]     </td> </tr>
                                                
                                                <tr> <td> Pendidikan              </td> <td> : $key[pendidikan]    </td> </tr>
                                                <tr> <td> Tempat Lahir  </td> <td> : $key[tempat_lahir]        </td> </tr>
                                                <tr> <td> Jabatan</td> <td> : $key[jebatan]  </td> </tr> 
                                                 <tr> <td> Keterangan Pendidikan </td> <td> : $key[keterangan_pendidikan]  </td> </tr> 


                                            </table>                   
                                                                                                     
                                                    "; 
                                              }  }
                    
                                             ?>  


                                        
                                        
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <div class="box">
          
            <!-- /.box-header -->
            <div class="box-body">
              <table id="mytable2" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  <th>Komponen</th>
                  <th>Butir</th>
                  <th>Rincian</th>
                  <th>Keterangan</th>
                  <th>Jumlah Hasil Kegiatan</th>
                  <th>Kredit yang di hasilkan</th>
                  <th>Status periksa</th>

                   <th>Bukti fisik</th>

                  <th>Ajukan nilai disetujui</th>
                  
                </tr>
                </thead>
                <tbody>

                
                  <?php

 if(isset($_POST['search'])){


      $niy = $_POST['niy'];
                  foreach ($akses->hasilkaryawan($niy) as $lihat1) {
                  $kredit_anda=$lihat1['angka_kredit']*$lihat1['angka_kredit_saya'];
                    echo "

                    ";?>

                    <?php

                     echo "

                    <tr>
                      <td>$lihat1[komponen]</td>
                      <td>$lihat1[butir]</td>
                      <td>$lihat1[rincian]</td>
                      <td>$lihat1[keterangan]</td>
                      <td>$lihat1[angka_kredit_saya]</td>
                      <td>$kredit_anda</td>"?><?php 
                                          if($lihat1["status_riwayat"]=="baru pengajuan"){
                                            echo "<td><font color='red'>Belum Diperiksa</font></td>";
                                          }else {
                                            echo "<td><font color='green'>Sudah Diperiksa</font></td>";
                                          }

                      if($lihat1["status_riwayat"]=="baru pengajuan"){
                                            echo "
                        <td><a href='download.php?file=$lihat1[upload_data]' class='btn btn-info btn-sm' onclick='if(!confirm(`apakah anda mau mendownload file?`)){return false}'><i class='glyphicon glyphicon-download'></i> Download</a></td>
                      <td> <a id='edit1' data-toggle='modal' data-target='#tambah' data-riwayat='$lihat1[riwayat]' data-id='$lihat1[id_riwayat]'  data-perkalian='$lihat1[hasil]'>

                                                          <button type='button'class='btn btn-warning btn-sm'><i class='fa fa-edit'> </i> Masukan Nilai</button></td></a>
                                <div id='tambah' class='modal fade' role='dialog'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                <h4 class='modal-title'>Silahkan di Isi</h4>


                                                
                                            </div>

                                            <form id='form' enctype='multipart/form-data'>
                                                <div class='modal-body'  id='modaledit'>
                                                    
                                                   
                                                    <div class='from-group'>
                                                        <label class='control-label'>Angka kredit dihasilkan</label>
                                                        <input type='text' name='hasil' class='form-control' id='hasil' readonly >
                                                        
                                                   </div><br><br>
                                                   <div class='from-group'>
                                                        <input type='hidden' name='id_riwayat' id='id_riwayat'>
                                                        
                                                       
                                                        
                                                   </div>
                                                  
                                                    <div class='from-group'>
                                                        <label class='control-label'>Status Penilai</label>
                                                        <select id='status' name='statusnilai' class='datepicker form-control' required>
                                                          <option>Pilih</option>
                                                          <option value='sudah_tercukupi'>Nilai sudah tercukupi </option>
                                                          <option value='belum_tercukupi'>Nilai belum tercukupi</option>
                                                        </select>
                                                        
                                                   </div>

                                                    <div class='from-group'>
                                                        <label class='control-label'>Keterangan</label>
                                                        <textarea name='komentar3' class='form-control' id='keterangan' id='exampleFormControlTextarea1' rows='5' required placeholder='Silahkan isi komentar anda'></textarea>
                                                        
                                                   </div>
                                                   

                                                    <div class='modal-footer'>
                                                        <button type='reset' class='btn btn-danger'>Reset</button>
                                                        <input type='submit' name='submit' class='btn btn-success' value='Simpan' onclick='if(!confirm('Data anda akan di simpan, apakah anda yakin?')){return false}'>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                           
                                           ";?>

                                               <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                                     <script type="text/javascript">
                                      
                                       $(document).on("click", "#edit1", function(){

                                        var riwayat = $(this).data('riwayat');
                                        var id = $(this).data('id');
                                        var status = $(this).data('status');
                                        var hasil = $(this).data('perkalian');
                                   
                                            
                                            $("#modaledit #id_riwayat").val(id);
                                            $("#modaledit #riwayat").val(riwayat);
                                            $("#modaledit #status1").val(status);
                                              $("#modaledit #hasil").val(hasil);
                                          
                                        

                                       })

                                       $(document).ready(function(e){
                                        $("#form").on("submit", (function(e){
                                          e.preventDefault();
                                          $.ajax({
                                            url : 'edit_masukan.php',
                                            type : 'POST',
                                            data : new FormData(this),
                                            contentType : false,
                                            cache : false,
                                            processData : false,
                                            success : function(msg){
                                              $('#mytable2').html(msg);
                                            }
                                          });   

                                        }));
                                       })
                                     </script>

                                           <?php
                                           echo "



                                             
                                            </div>

                                            
                                        </div>

                                     </div>

                                           </td>
                      </tr>
                      
                                           

                    ";
                                          }
                  else {
                     $ada=mysqli_fetch_array($akses->hasilkaryawan1($username)); 

                        echo "
                        <td><a href='download.php?file=$lihat1[upload_data]' class='btn btn-info btn-sm' onclick='if(!confirm(`apakah anda mau mendownload file?`)){return false}'><i class='glyphicon glyphicon-download'></i> Download</a></td>
                      <td> <a id='edit' data-toggle='modal' data-target='#tambah1' data-riwayat='$lihat1[riwayat]' data-id='$lihat1[id_riwayat]'  data-perkalian='$lihat1[hasil]' data-keterangan='$ada[keterangan]' data-status='$ada[statusnilai]'>

                                                          <button type='button'class='btn btn-warning btn-sm'><i class='fa fa-edit'> </i> Edit Data</button></td></a>
                                <div id='tambah1' class='modal fade' role='dialog'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                <h4 class='modal-title'>Silahkan di Isi</h4>


                                                
                                            </div>

                                            <form id='form1' enctype='multipart/form-data'>
                                                <div class='modal-body'  id='modaledit'>
                                                    
                                                   
                                                    <div class='from-group'>
                                                        <label class='control-label'>Angka kredit dihasilkan</label>
                                                        <input type='text' name='hasil' class='form-control' id='hasil' readonly >
                                                        
                                                   </div><br><br>
                                                   <div class='from-group'>
                                                        <input type='hidden' name='id_riwayat' id='id_riwayat'>
                                                        
                                                       
                                                        
                                                   </div>
                                                  
                                                    <div class='from-group'>
                                                        <label class='control-label'>Status Penilai</label>
                                                        <select id='status' name='statusnilai' class='datepicker form-control' required>
                                                          <option>Pilih</option>
                                                          <option value='sudah_tercukupi'>Nilai sudah tercukupi </option>
                                                          <option value='belum_tercukupi'>Nilai belum tercukupi</option>
                                                        </select>
                                                        
                                                   </div>

                                                    <div class='from-group'>
                                                        <label class='control-label'>Keterangan</label>
                                                        <textarea name='komentar3' class='form-control' id='keterangan' id='exampleFormControlTextarea1' rows='5' required placeholder='Silahkan isi komentar anda'></textarea>
                                                        
                                                   </div>
                                                   

                                                    <div class='modal-footer'>
                                                        <button type='reset' class='btn btn-danger'>Reset</button>
                                                        <input type='submit' name='submit' class='btn btn-success' value='Simpan' onclick='if(!confirm('Data anda akan di simpan, apakah anda yakin?')){return false}'>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                           
                                           ";?>

                                               <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                                     <script type="text/javascript">
                                      
                                       $(document).on("click", "#edit", function(){

                                        var riwayat = $(this).data('riwayat');
                                        var id = $(this).data('id');
                                        var status = $(this).data('statusnilai');
                                        var hasil = $(this).data('perkalian');
                                        var keterangan = $(this).data('keterangan');
                                   
                                            
                                            $("#modaledit #id_riwayat").val(id);
                                            $("#modaledit #riwayat").val(riwayat);
                                            $("#modaledit #status").val(status);
                                              $("#modaledit #hasil").val(hasil);
                                              $("#modaledit #keterangan").val(keterangan);
                                          
                                        

                                       })

                                       $(document).ready(function(e){
                                        $("#form1").on("submit", (function(e){
                                          e.preventDefault();
                                          $.ajax({
                                            url : 'edit_masukan1.php',
                                            type : 'POST',
                                            data : new FormData(this),
                                            contentType : false,
                                            cache : false,
                                            processData : false,
                                            success : function(msg){
                                              $('#mytable2').html(msg);
                                            }
                                          });   

                                        }));
                                       })
                                     </script>

                                           <?php
                                           echo "



                                             
                                            </div>

                                            
                                        </div>

                                     </div>

                                           </td>
                      </tr>
                      
                                           

                    ";
                                          }
                      
                  }
                    }
                  ?>


            

               
             
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->



          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->











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
