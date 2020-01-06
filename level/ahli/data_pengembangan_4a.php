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
  <title>Sistem Karir Pustakawan | Pendidikan</title>
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

     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="table/bootstrap.min.css" rel="stylesheet"/>

    




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
      <form action="pencarian_4a.php" method="POST" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="cari" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="pencarian" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
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
        Pelayanan perpus
        <small>4a. P. kepustakawan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Pengembangan Sistem</a></li>
        <li class="active">4a. P. kepustakawan</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">

       




       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> 

                              <i class= " fa fa-flag ">
                                Pengembangan Sistem
                                
                               </i>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
               
                                   
                                                               


                          
                               <h3 align="center">4A. PENGEMBANGAN KEPUSTAKAWANAN</h3>      
                               </i> <br><br>

                               

                                 <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah isian</button>
                                <div id="tambah" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Tambah Kegiatan</h4>


                                                
                                            </div>

                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="from-group">
                                                          <?php
                                                                $sql=$akses->data_pustakawan($username);
                                                                $data=mysqli_fetch_array($sql);
                                                                  echo "<label>Nomor induk yayasan</label><br>
                                                    <input name='niy' value='$data[niy]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
                                                     <label>Nama</label><br>
                                                     <input name='nama' value='$data[nama]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>";
                                                                
                                                          
                                                            ?>
                                                        
                                                    </div>
                                                    <div class="from-group">
                                                        <label class="control-label" for="tanggal">Tahun Kegiatan</label>
                                                        <select id="riwayat" name="tanggal" class="datepicker form-control" required>
                                                          <option>pilih tahun</option>
                                                           <?php for($y = date('Y'); $y >= 2000; $y--){?>
                                                          <option value=" <?php echo $y ?>"><?php echo "$y"; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                       
                                                        
                                                   </div>
                                                    <div class="from-group">
                                                       <label class="control-label" for="riwayat">Rincian kegiatan</label>
                                                       <select id="riwayat" name="riwayat" class="datepicker form-control" required>
                                                        <option>Pilih</option>
                                                           <?php

                                                             $sql=$akses->ringkasan_peraturan7();
                                                                while($data=mysqli_fetch_array($sql)){
                                                                  echo '<option value="'.$data['id_rp'].'">'.$data['rincian'].'</option>';
                                                                }

                                                            ?>
                                                        </select>
                                                                        
                                                        
                                                    </div>

                                                     <div class="from-group">
                                                        <label class="control-label" for="angka_kredit_saya">Jumlah kegiatan</label>
                                                        <input type="number" name="angka_kredit_saya" class="form-control" id="angka_kredit_saya" required placeholder="Jumlah kegiatan">
                                                        
                                                   </div>

                                                    <div class="from-group">
                                                        <label class="control-label" >Bukti fisik</label>
                                                        <input type="file" name="upload_data" class="form-control" required>
                                                        
                                                   </div>

                                                    <div class="from-group">
                                                        <label class="control-label" >Keterangan</label>
                                                        <textarea name="komentar3" class="form-control" id="exampleFormControlTextarea1" rows="3" required placeholder="Silahkan isi komentar anda"></textarea>
                                                        
                                                   </div>



                                                    <div class="modal-footer">
                                                        <button type="reset" class="btn btn-danger">Reset</button>
                                                        <input type="submit" name="simpan1" class="btn btn-success" value="Simpan" onclick="if(!confirm('Data anda akan di simpan, apakah anda yakin?')){return false}">
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                          

                                             <?php 

                                                if(isset($_POST['simpan1'])){

                                                  $niy = $_POST['niy'];
                                                  $riwayat = $_POST['riwayat'];
                                                  $angka_kk_saya = $_POST['angka_kredit_saya'];
                                                  $tanggal = $_POST['tanggal'];
                                                  $data = $_FILES['upload_data']['name'];
                                                  $data1 =  $_FILES['upload_data']['tmp_name'];
                                                  $Keterangan = $_POST['komentar3'];
                                                  $status = "baru";
                                                   

                                                  $extensi = explode('.', $data);
                                                  $file1 = "file-".round(microtime(true)).".".end($extensi);
                                                  $sumber = $data1;
                                                  $upload = move_uploaded_file($sumber, "upload1/".$file1);
                                                
                                                  if ($upload) {

                                                     $akses->input_pendidikan_1a($riwayat,$angka_kk_saya,$niy,$tanggal,$file1,$Keterangan,$status);
                                                         echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'success',
                                                              title: 'Data disimpan',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='data_pengembangan_4a.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                     

                                                      # code...
                                                  } else{
                                                    echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'error',
                                                              title: 'File yang anda tidak sesuai !!',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='data_pengembangan_4a.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                  }

                                                }



                                                ?>
                                            </div>

                                            
                                        </div>

                                     </div>
                               
                           

                               <?php
                                  foreach ($akses->data_pengembangan_4av1($username) as $key) {
                                    echo"
                                  <table width='90%'>
                                    <th>
                                      <td align='right' > Jumlah yang dilakukan : $key[jumlah_kegiatan]</td>
                                      
                                      </th>
                                  </table>
                                    ";


                                  
                                } ?>
                                     <br>
                        
                                    <div class="form-group">
                                          <select name="state" id="maxRows" class="form-control" style="width:150px;">
                                              <option value="5000">Show All</option>
                                              <option value="5">5</option>
                                              <option value="10">10</option>
                                              <option value="15">15</option>
                                              <option value="20">20</option>
                                              <option value="50">50</option>
                                              <option value="75">75</option>
                                              <option value="100">100</option>
                                          </select>
                                      </div>
                        
                                    <div class="table-responsive">
                                           <table id="mytable2" class="table table-bordered table-striped" >
                                            <thead>
                                             <tr >
                                              <th >Tahun</th>
                                                                        <th>Rincian</th>
                                                                        <th>keterangan</th>
                                                                        <th>Jumlah kegiatan</th>
                                                                        <th>Hasil Kegiatan</th>
                                                                        <th>Bukti fisik</th>
                                                                        <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                   
                                                foreach ($akses->data_pengembangan_4a($username) as $lihat) {
                                                     $kredit_anda=$lihat['angka_kredit']*$lihat['angka_k1'];
                                                     $tanggal =$lihat['tanggal'];
                                             
                                                    echo "
                                                         <tr>
                                                            <td>$tanggal</td>
                                                             <td>$lihat[rincian]</td>
                                                             <td>$lihat[keterangan]</td>
                                                             <td>$lihat[angka_k1]</td>
                                                             <td>$kredit_anda</td>";?><?php

                                                           




                                                             ?>

                                                             <?php echo "
                                                            <td><a href='download.php?file=$lihat[upload_data]' class='btn btn-info btn-sm' onclick='if(!confirm(`apakah anda mau mendownload file?`)){return false}'><i class='glyphicon glyphicon-download'></i>Download</td>
                                                              <td><a href='proses_delete_pendidikan_1a.php?id=$lihat[id_riwayat] && upload=$lihat[upload_data]' class='btn btn-danger btn-sm' onclick='if(!confirm(`apakah anda yakin?`)){return false}'> <i class='fa fa-trash-o'></i> Hapus</a>

                                                                <a id='edit1' data-toggle='modal' data-target='#edit' data-riwayat='$lihat[riwayat]' data-angka_kredit_saya='$lihat[angka_k1]' data-niy='$lihat[niy]' data-id='$lihat[id_riwayat];' data-tanggal='$lihat[tanggal]' data-uploaddata='$lihat[upload_data]' data-keterangan='$lihat[keterangan]'  >

                                                          <button type='button'class='btn btn-warning btn-sm'><i class='fa fa-edit'> </i> Edit</button></td></a>
                                                              
                                                        </tr>
                                                     
                                                    "; 
                                                }
                    
                                             ?>

                                             <div id="edit" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Edit Kegiatan</h4>


                                                
                                            </div>

                                            <form id="form" enctype="multipart/form-data">
                                                <div class="modal-body" id="modaledit">
                                                    <div class="from-group">
                                                          <?php
                                                                $sql=$akses->data_pustakawan($username);
                                                                $data=mysqli_fetch_array($sql);
                                                                  echo "<label>Nomor induk yayasan</label><br>
                                                    <input name='niy' value='$data[niy]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
                                                     <label>Nama</label><br>
                                                     <input name='nama' value='$data[nama]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>";
                                                                
                                                          
                                                            ?>
                                                        
                                                    </div>
                                                    <input type="hidden" name="id_riwayat" id="id_kegiatan">
                                                    <div class="from-group">
                                                        <label class="control-label" for="tanggal">Tahun Kegiatan</label>
                                                        <select id="tanggal" name="tanggal" class="datepicker form-control" required>
                                                         
                                                          <option>pilih tahun</option>
                                                           <?php for($y = date('Y'); $y >= 2000; $y--){?>
                                                          <option value=" <?php echo $y ?>"><?php echo "$y"; ?>  </option>
                                                        <?php } ?>
                                                        </select>
                                                       
                                                        
                                                   </div>
                                                     <div class="from-group">
                                                       <label class="control-label" for="riwayat">Rincian kegiatan</label>
                                                        <select id="riwayat" name="riwayat" class="form-control" class="chosen" required>
                                                        <option>Pilih</option>
                                                           <?php

                                                             $sql=$akses->ringkasan_peraturan7();
                                                                while($data=mysqli_fetch_array($sql)){
                                                                  echo '<option value="'.$data['id_rp'].'">'.$data['rincian'].'</option>';
                                                                }

                                                            ?>
                                                        </select>

                                                         <script type="text/javascript">
                                            
                                                             $(".chosen").chosen();
                                                        
                                                        </script>
                                                                        
                                                        
                                                    </div>

                                                    <div class="from-group">
                                                        <label class="control-label" for="angka_kredit_saya">Jumlah kegiatan</label>
                                                        <input type="number" name="angka_kredit_saya" class="form-control" id="angka_kredit_saya" required placeholder="Jumlah kegiatan">
                                                        
                                                   </div>


                                                     

                                                    <div class="from-group">
                                                        <label class="control-label" >Bukti fisik</label>
                                                        <div style="padding-bottom: 10px">
                                                          <img src="" width="80px" id="pict">
                                                        </div>
                                                        <input type="file" name="upload_data" class="form-control">
                                                        
                                                   </div>

                                                    <div class="from-group">
                                                        <label class="control-label" >Keterangan</label>
                                                        <textarea id="keterangan" name="komentar3" class="form-control" id="exampleFormControlTextarea1" rows="3" required placeholder="Silahkan isi komentar anda"></textarea>
                                                        
                                                   </div>

                                                  



                                                    <div class="modal-footer">
                                                        
                                                        <input type="submit" name="edit" class="btn btn-success" value="Simpan" onclick="if(!confirm('Data anda akan di simpan, apakah anda yakin?')){return false}">
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                      
                                            </div>

                                            
                                        </div>

                                     </div>
                                      <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                                     <script type="text/javascript">
                                       $(document).on("click", "#edit1", function(){

                                        var riwayat = $(this).data('riwayat');
                                        var angkakk = $(this).data('angka_kk_saya');
                                        var niy = $(this).data('niy');
                                        var id = $(this).data('id');
                                        var tanggal = $(this).data('tanggal');
                                        var uploaddata = $(this).data('uploaddata');
                                        var keterangan = $(this).data('keterangan');
                                        var status = $(this).data('status');

                                            
                                            $("#modaledit #id_kegiatan").val(id);
                                             $("#modaledit #angka_kredit_saya").val(angkakk);
                                            $("#modaledit #keterangan").val(keterangan);
                                            $("#modaledit #riwayat").val(riwayat);
                                             $("#modaledit #tanggal").val(tanggal);
                                              $("#modaledit #status").val(status);
                                              $("#modaledit #pict").attr("src", "upload1/"+uploaddata);


                                         
                                        

                                       })

                                       $(document).ready(function(e){
                                        $("#form").on("submit", (function(e){
                                          e.preventDefault();
                                          $.ajax({
                                            url : 'proses_edit1.php',
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
                                </tbody>
                              </table>
                               <div class="pagination-container">
                                  <nav>
                                      <ul class="pagination"></ul>
                                  </nav>
                              </div>

                                <script src="table/jquery.min.js"></script>
                            <script src="table/bootstrap.min.js"></script>
                            <script>
                            var table = '#mytable2'
                            $('#maxRows').on('change', function(){
                                $('.pagination').html('')
                                var trnum = 0
                                var maxRows = parseInt($(this).val())
                                var totalRows = $(table+' tbody tr').length
                                $(table+' tr:gt(0)').each(function(){
                                    trnum++
                                    if(trnum > maxRows){
                                        $(this).hide()
                                    }
                                    if(trnum <= maxRows){
                                        $(this).show()
                                    }
                                })
                                if(totalRows > maxRows){
                                    var pagenum = Math.ceil(totalRows/maxRows)
                                    for(var i=1;i<=pagenum;){
                                        $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
                                    }
                                }
                                $('.pagination li:first-child').addClass('active')
                                $('.pagination li').on('click',function(){
                                    var pageNum = $(this).attr('data-page')
                                    var trIndex = 0;
                                    $('.pagination li').removeClass('active')
                                    $(this).addClass('active')
                                    $(table+' tr:gt(0)').each(function(){
                                        trIndex++
                                        if(trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
                                            $(this).hide()
                                        } else{
                                            $(this).show()
                                        }
                                    })
                                })
                            })
                            $(function(){
                                $('table tr:eq(1)').prepend('<th>NO</th>')
                                var id = 0;
                                $('table tr:gt(1)').each(function(){
                                    id++
                                    $(this).prepend('<td>'+id+'</td>')
                                })
                            })
                            </script>
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
