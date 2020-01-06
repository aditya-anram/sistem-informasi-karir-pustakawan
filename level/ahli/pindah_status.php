<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:../../index.php'); 
} else { 
   $username = $_SESSION['username']; 
}
?>

<?php
    require('fungsi_sikap.php');
    $akses = new Sikap();
    $akses->koneksi();
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Karir Pustakawan | My Profil</title>
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
          <li class="dropdown messages-menu"><
            
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user.jpg" class="user-image" alt="User Image">
             
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user.jpg" class="img-circle" alt="User Image">

                <p>
                   <?php
                                    foreach ($akses->data_pustakawan($username) as $lihat) {
                                        # code...
                                      echo "<span class='info-box-number'>$lihat[nama]-$lihat[niy]</span>";
                                        
                                    }
                                    ?>
                  <small>Pustakawan Ahli</small>
                </p>
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
        <div class="pull-left image"><br>
          <img src="dist/img/user.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
           <?php
                                    foreach ($akses->data_pustakawan($username) as $lihat) {
                                        # code...
                                      echo "<span class='info-box-number'><br>$lihat[nama]</span>";
                                        echo "<span class='info-box-number'>$lihat[niy]</span>";
                                        
                                    }
                                    ?>
             
          
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
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
        <li class="active">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
         
        </li>

         <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>My Profile</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="lihat_data.php"><i class="fa fa-angle-double-right"></i> Data Pribadi</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> ubah password</a></li>
                                
                                
                            </ul>

         </li>
        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Pendidikan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="data_pendidikan_1a.php"><i class="fa fa-angle-double-right"></i> 1A. Pendidikan</a></li>
                                <li><a href="data_pendidikan_1b.php"><i class="fa fa-angle-double-right"></i> 1B. Diklat Fungsional/Teknis</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-tasks"></i>
                                <span>Pengelolaan Perpus</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="perencanaan_kegiatan_2a.php"><i class="fa fa-angle-double-right"></i> 2A.Perencanaan Kegiatan </a></li>
                                 <li><a href="data_menitoring_2b.php"><i class="fa fa-angle-double-right"></i> 2B.Monitoring Dan Evaluasi </a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-group"></i>
                                <span>Pelayanan Perpus</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="data_pelayanan_3a.php"><i class="fa fa-angle-double-right"></i> 3A. Pelayanan Teknis </a></li>
                                
                                <li><a href="data_pelayanan_3b.php"><i class="fa fa-angle-double-right"></i> 3B. Pelayanan Pemustaka</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Pengembangan Sistem</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="data_pengembangan_4a.php"><i class="fa fa-angle-double-right"></i> 4A. P. Kepustakawanan</a></li>
                                 <li><a href="data_pengembangan_4b.php"><i class="fa fa-angle-double-right"></i> 4B. Menganalisa karya pustaka</a></li>
                                  <li><a href="data_pengembangan_4c.php"><i class="fa fa-angle-double-right"></i> 4C. Penelaan Sistem</a></li>
                                
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa  fa-external-link-square"></i>
                                <span>Pengembangan Profesi</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="data_karya_tulis_5a.php"><i class="fa fa-angle-double-right"></i> 5A. Membuat Karya Tulis </a></li>
                                
                                <li><a href="data_penjeremah_5b.php"><i class="fa fa-angle-double-right"></i> 5B. Penerjemahan/Penyaduran </a></li>
                                
                                <li><a href="data_penyusun_5c.php"><i class="fa fa-angle-double-right"></i> 5C. Penyusunan Buku Pedoman </a></li>
                               
                               
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa  fa-level-up"></i>
                                <span>Penunjang</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pelatih_diklat_6a.php"><i class="fa fa-angle-double-right"></i> 6A. Pengajar/Pelatih Diklat</a></li>
                                
                                <li><a href="data_seminar_6b.php"><i class="fa fa-angle-double-right"></i> 6B. Seminar/Lokakarya</a></li>
                               
                                <li><a href="data_organisasi_6c.php"><i class="fa fa-angle-double-right"></i> 6C. Organisasi Profesi </a></li>
                               
                                <li><a href="data_penghargaan_6d.php"><i class="fa fa-angle-double-right"></i> 6D. Memperoleh Penghargaan </a></li>
                                
                                <li><a href="data_gelar_6e.php"><i class="fa fa-angle-double-right"></i> 6E. Gelar Kesarjanaan Lain</a></li>
                                
                               
                            </ul>
                        </li>

                         <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-info-sign"></i>
                                <span>Lainnya</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                
                                <li><a href="ubah_data.php"><i class="fa fa-angle-double-right"></i> Lihat Ringakasan Peeraturan</a></li>
                               
                            </ul>
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
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pustakawan Tingkat</span>
              <span class="info-box-number">Ahli</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jabatan</span>
               <?php
              

               $data=mysqli_fetch_array($akses->data($username)); 

             
                    $data12=mysqli_fetch_array($akses->total_keseluruhan1($username));  

                                        if($data12['total_penilai']<"100" && $data12['status']=="ahli" && $data12['status2']=='diterima'){                                     
                                           $Jabatan = "xx-0000";
                                          $akses->ubahprofil1($Jabatan,$username);
                                         
                                        }
                                         else if($data12['total_penilai']<"150" && $data12['status']=="ahli" && $data12['status2']=='diterima'){                                     
                                           $Jabatan = "a1-001";
                                          $akses->ubahprofil1($Jabatan,$username);
                                         
                                        } else if($data12['total_penilai']<"200" && $data12['status']=="ahli" && $data12['status2']=='diterima'){                                     
                                           $Jabatan = "a1-002";
                                          $akses->ubahprofil1($Jabatan,$username);
                                        }
                                          else if($data12['total_penilai']<"300" && $data12['status']=="ahli" && $data12['status2']=='diterima'){                                     
                                           $Jabatan = "a2-001";
                                          $akses->ubahprofil1($Jabatan,$username);
                                        }
                                          else if($data12['total_penilai']<"400" && $data12['status']=="ahli" && $data12['status2']=='diterima'){                                     
                                           $Jabatan = "a2-002";
                                          $akses->ubahprofil1($Jabatan,$username);
                                        }
                                          else if($data12['total_penilai']<"550" && $data12['status']=="ahli" && $data12['status2']=='diterima'){                                     
                                           $Jabatan = "a3-001";
                                          $akses->ubahprofil1($Jabatan,$username);
                                        }
                                          else if($data12['total_penilai']<"700" && $data12['status']=="ahli" && $data12['status2']=='diterima'){                                     
                                           $Jabatan = "a3-002";
                                          $akses->ubahprofil1($Jabatan,$username);
                                        }
                                          else if($data12['total_penilai']<"850" && $data12['status']=="ahli" && $data12['status2']=='diterima'){                                     
                                           $Jabatan = "a3-003";
                                          $akses->ubahprofil1($Jabatan,$username);
                                        }
                                          else if($data12['total_penilai']<"1050" && $data12['status']=="ahli" && $data['status2']=='diterima'){                                     
                                           $Jabatan = "a4-001";
                                          $akses->ubahprofil1($Jabatan,$username);
                                        }
                                          else if($data12['total_penilai']>"1050" && $data12['status']=="ahli" && $data['status2']=='diterima'){                                     
                                           $Jabatan = "a4-002";
                                          $akses->ubahprofil1($Jabatan,$username);
                                        }

                                    

               

                                        foreach ($akses->data_pustakawan($username) as $key) {

                                          echo "<span class='info-box-number'>$key[jebatan]</span>    ";
                                          # code...
                                        }

                                                         
                ?>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kum</span>
              <?php
                                   foreach ($akses->total_keseluruhan($username) as $key) {
                                                     # code...
                                                    echo " <span class='info-box-number'>$key[total_penilai]</span> 

                                                    ";

                                                 }
                                   
                                    ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa   fa-mortar-board"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pangkat</span>
               <?php
                                    foreach ($akses->data_pustakawan($username) as $lihat) {
                                        # code...
                                      echo "<span class='info-box-number'>$lihat[pankat]</span>";
                                        
                                    }
                                    ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

       




       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> 

                              <i class="fa   fa-user">
                                Data User
                                
                               </i>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" >
               
                                   
                                              <?php
                                                   
                                               foreach ($akses-> data_pustakawan($username) as $lihat) {
                                                     $tanggal=date("d M Y", strtotime($lihat['tanggal_lahir']));

                                            
                                             
                                                    echo "

                                            <table >
                                               <tr> <td> NIY               </td> <td> :  </td> <td>  $lihat[niy]         </td> </tr>
                                                <tr> <td> Nama              </td> <td> :  </td>  <td> $lihat[nama]        </td> </tr>
                                                <tr> <td> Tempat lahir      </td> <td> :  </td>  <td> $lihat[tempat_lahir]    </td> </tr>
                                                <tr> <td> Tanggal lahir     </td> <td> :  </td>  <td> $tanggal     </td> </tr>
                                                
                                                <tr> <td> Jenis kelamin              </td> <td> :  </td>  <td> $lihat[gendre]     </td> </tr>
                                                <tr> <td> pendidikan                 </td> <td> :  </td>  <td> $lihat[pendidikan] $lihat[keterangan_pendidikan]  </td> </tr>
                                                
                                                

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
                                                        <label class="control-label" for="niy">Niy</label>
                                                        <input type="text" name="niy" class="form-control" id="niy" required placeholder="Nomor induk yayasan">
                                                        
                                                    </div>
                                                    <div class="from-group">
                                                        <label class="control-label" for="nama">Nama</label>
                                                        <input type="text" name="nama" class="form-control" id="niy" required placeholder="Nama">
                                                        
                                                    </div>
                                                    <div class="from-group">
                                                        <label class="control-label" for="tempat_lahir">Tempat Lahir</label>
                                                        <input type="text" name="tempat_lahir" class="form-control" id="niy" required placeholder="Tempat lahir">

                                                        
                                                    </div>
                                                    <div class="from-group">
                                                        <label class="control-label" for="tanggal_lahir">Tanggal Lahir</label>
                                                       <input type="date" class="datepicker form-control" name="tanggal_lahir" autocomplete="off" required>
                                                        
                                                    </div>
                                                    <div class="from-group">
                                                        <label class="control-label" for="gendre">Jenis Kelamin</label><br>
                                                       
                                                          <input type="radio"  value="pria" name="gendre" required>
                                                          Pria
                                                          <input type="radio" value="wanita" name="gendre" required>
                                                         Wanita
                                                        
                                                    </div>

                                                    <div class="from-group">
                                                        <label class="control-label" for="niy">Pendidikan</label>
                                                        <select name="pendidikan" class="datepicker form-control" required>
                                                            <option >Pilih</option>
                                                            <option value="s1">Sarjana 1</option>
                                                            <option value="s2">Sarjana 2</option>
                                                            <option value="s3">Sarjana 3</option>
                                                          </select>
                                                        
                                                    </div>
                                                     <div class="from-group">
                                                        <label class="control-label" for="keterangan_pendidikan">Keterangan pendidikan</label>
                                                       <input type="text" name="keterangan_pendidikan" class="datepicker form-control"  required>
                                                        
                                                    </div>
                                                     <div class="from-group">
                                                        <label class="control-label" for="jabatan">Jabatan</label>
                                                       <input value="Belum ada" type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
                                                      

                                                        
                                                    </div>
                                                    

                                                    <div class="modal-footer">
                                                        <button type="reset" class="btn btn-danger">Reset</button>
                                                        <input type="submit" name="Simpan" class="btn btn-success" value="Simpan" onclick="if(!confirm('Data anda akan di simpan, apakah anda yakin?')){return false}">
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </form>

                                             <?php

                                                if(isset($_POST['Simpan'])){

                                                    $niy = $_POST['niy'];
                                                    $nama = $_POST['nama'];
                                                    $tlgl =date("Y-m-d", strtotime($_POST['tanggal_lahir']));
                                                    $gendre = $_POST['gendre'];
                                                    $pendidikan = $_POST['pendidikan'];
                                                 
                                                    $tlhr = $_POST['tempat_lahir'];
                                                  
                                                    $keterangan = $_POST['keterangan_pendidikan'];
                                                    



                                                     $ada = mysqli_num_rows($akses->data_pustakawan($username));
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
                                                                

                                                                  
                                                                   


                                                    $akses->input_data_user($niy,$nama,$tlgl,$gendre,$pendidikan,$tlhr,$keterangan,$gbr_brg);
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
                                                                        location.href='dashboard.php'
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
                                                 foreach ($akses-> data_pustakawan($username) as $lihat) {

                                            echo "

                                            <form method='POST' enctype='multipart/form-data'>
                                                <div class='modal-body'>
                                                    <div class='from-group'>
                                                        <label class='control-label' for='niy'>Niy</label>
                                                        <input type='text' name='niy' class='form-control' id='niy' required placeholder='Nomor induk yayasan' value='$lihat[niy]'>
                                                        
                                                    </div>
                                                    <div class='from-group'>
                                                        <label class='control-label' for='nama'>Nama</label>
                                                        <input type='text' name='nama' class='form-control' id='nama' required placeholder='Nama' value='$lihat[nama]'>
                                                        
                                                    </div>
                                                    <div class='from-group'>
                                                        <label class='control-label' for='tempat_lahir'>Tempat Lahir</label>
                                                        <input type='text' name='tempat_lahir' class='form-control' id='tempat_lahir' required placeholder='Tempat lahir' value=$lihat[tempat_lahir]>

                                                        
                                                    </div>
                                                    <div class='from-group'>
                                                        <label class='control-label' for='tanggal_lahir'>Tanggal Lahir</label>
                                                       <input type='date' class='datepicker form-control'' name='tanggal_lahir' autocomplete='off' required value='$lihat[tanggal_lahir]'>
                                                        
                                                    </div>
                                                    <div class='from-group'>
                                                        <label class='control-label' for='gendre'>Jenis Kelamin</label><br>
                                                       
                                                          <input type='radio'  value='pria' name='gendre' required>
                                                          Pria
                                                          <input type='radio' value='wanita' name='gendre' required >
                                                         Wanita
                                                        
                                                    </div>

                                                    <div class='from-group'>
                                                        <label class='control-label' for='niy'>Pendidikan</label>
                                                        <select name='pendidikan' class='datepicker form-control' required>
                                                            <option >Pilih</option>
                                                            
                                                            <option value='s1' ";?><?php if($lihat['pendidikan']=="s1"){echo "selected=\"selected\"";}?><?php echo ">Sarjana 1</option>
                                                            <option value='s2' ";?><?php if($lihat['pendidikan']=="s2"){echo "selected=\"selected\"";}?><?php echo ">Sarjana 2</option>
                                                            <option value='s3' ";?><?php if($lihat['pendidikan']=="s3"){echo "selected=\"selected\"";}?><?php echo ">Sarjana 3</option>
                                                          </select>
                                                        
                                                    </div>
                                                     <div class='from-group'>
                                                        <label class='control-label' for='keterangan_pendidikan'>Keterangan pendidikan</label>
                                                       <input type='text' name='keterangan_pendidikan' class='datepicker form-control'  required value='$lihat[keterangan_pendidikan]'>
                                                        
                                                    </div>
                                                     <div class='from-group'>
                                                        <label class='control-label' for='jabatan'>Jabatan</label>
                                                       <input value='$lihat[pankat]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
                                                        <input value='$lihat[jabatan]' type='hidden' name='jabatan'>


                                                      

                                                        
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

                                                    $niy = $_POST['niy'];
                                                    $nama = $_POST['nama'];
                                                    $tlgl =date("Y-m-d", strtotime($_POST['tanggal_lahir']));
                                                    $gendre = $_POST['gendre'];
                                                    $pendidikan = $_POST['pendidikan'];
                                                     $jabatan = $_POST['jabatan'];
                                                 
                                                    $tlhr = $_POST['tempat_lahir'];
                                                  
                                                    $keterangan = $_POST['keterangan_pendidikan'];
                                                  
                                                                

                                                                  
                                                                   


                                                    $akses->ubahprofil($niy,$nama,$tlgl,$gendre,$pendidikan,$tlhr,$jabatan,$keterangan);
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
          <!-- /.box -->


    
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
