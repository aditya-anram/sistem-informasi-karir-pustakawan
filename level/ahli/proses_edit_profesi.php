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

<?php

$id = $_POST['id_riwayat'];
 $niy = $_POST['niy'];
$riwayat = $_POST['riwayat'];
$angka_kk_saya = "1";
$tanggal = $_POST['tanggal'];
$data1 =  $_FILES['upload_data']['tmp_name'];
$Keterangan = $_POST['komentar3'];
$status = "baru";
 $jumlah = $_POST['penulis'];
$status_penulis = $_POST['status_penulis'];

$data = $_FILES['upload_data']['name'];
$extensi = explode('.', $data);
 $file1 = "file-".round(microtime(true)).".".end($extensi);
$sumber = $data1;


  if($data == ''){
if($jumlah=='2' && $status_penulis=='utama'){
    $hasil = $angka_kk_saya*60/100;
$akses->ubahriwayat2b($riwayat,$tanggal,$Keterangan,$niy,$id,$hasil);
echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'success',
                                                              title: 'Data berhasil diubah',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
}
    else if($jumlah=='2' && $status_penulis=='pembantu'){
 $hasil = $angka_kk_saya*40/100;
$akses->ubahriwayat2b($riwayat,$tanggal,$Keterangan,$niy,$id,$hasil);
echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'success',
                                                              title: 'Data berhasil diubah',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
}
  else if($jumlah=='3' && $status_penulis=='utama'){
 $hasil = $angka_kk_saya*50/100;
$akses->ubahriwayat2b($riwayat,$tanggal,$Keterangan,$niy,$id,$hasil);
echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'success',
                                                              title: 'Data berhasil diubah',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
}
 else if($jumlah=='3' && $status_penulis=='pembantu'){
 $hasil = $angka_kk_saya*25/100;
$akses->ubahriwayat2b($riwayat,$tanggal,$Keterangan,$niy,$id,$hasil);
echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'success',
                                                              title: 'Data berhasil diubah',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                          }
 else if($jumlah=='4' && $status_penulis=='utama'){
$hasil = $angka_kk_saya*40/100;
$akses->ubahriwayat2b($riwayat,$tanggal,$Keterangan,$niy,$id,$hasil);
echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'success',
                                                              title: 'Data berhasil diubah',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
}
  else if($jumlah=='4' && $status_penulis=='pembantu'){
 $hasil = $angka_kk_saya*20/100;
$akses->ubahriwayat2b($riwayat,$tanggal,$Keterangan,$niy,$id,$hasil);
echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'success',
                                                              title: 'Data berhasil diubah',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
}
 else if($jumlah>='5' && $status_penulis=='utama'){
 $hasil = $angka_kk_saya*40/100;
$akses->ubahriwayat2b($riwayat,$tanggal,$Keterangan,$niy,$id,$hasil);
echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'success',
                                                              title: 'Data berhasil diubah',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
}
else if($jumlah>='5' && $status_penulis=='pembantu'){
$hasil = ($angka_kk_saya*60/100)/($jumlah-1);
$akses->ubahriwayat2b($riwayat,$tanggal,$Keterangan,$niy,$id,$hasil);
echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'success',
                                                              title: 'Data berhasil diubah',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
}
else{
  $akses->ubahriwayat2b($riwayat,$tanggal,$Keterangan,$niy,$id,$angka_kk_saya);
echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'success',
                                                              title: 'Data berhasil diubah',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
}

} else {
  $file_awal = $akses->datariwayat($id)->fetch_object()->upload_data;
  unlink("upload1/".$file_awal);

  $upload = move_uploaded_file($sumber, "upload1/".$file1);




                                                  if($jumlah=='2' && $status_penulis=='utama'){
                                                    $hasil = $angka_kk_saya*60/100;

                                                  if ($upload) {
                                                          $akses->ubahriwayat3b($riwayat,$tanggal,$Keterangan,$niy,$id,$file1,$hasil);
                                                    
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
                                                                location.href='dashboard.php'
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
                                                              title: 'File yang anda kirim tidak sesuai !!',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                  }
                                                }
                                                 else if($jumlah=='2' && $status_penulis=='pembantu'){
                                                    $hasil = $angka_kk_saya*40/100;


                                                  if ($upload) {
                                                          $akses->ubahriwayat3b($riwayat,$tanggal,$Keterangan,$niy,$id,$file1,$hasil);
                                                    
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
                                                                location.href='dashboard.php'
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
                                                              title: 'File yang anda kirim tidak sesuai !!',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                  }
                                                }
                                                  else if($jumlah=='3' && $status_penulis=='utama'){
                                                    $hasil = $angka_kk_saya*50/100;

                                                  if ($upload) {
                                                          $akses->ubahriwayat3b($riwayat,$tanggal,$Keterangan,$niy,$id,$file1,$hasil);
                                                    
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
                                                                location.href='dashboard.php'
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
                                                              title: 'File yang anda kirim tidak sesuai !!',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                  }
                                                }
                                                  else if($jumlah=='3' && $status_penulis=='pembantu'){
                                                    $hasil = $angka_kk_saya*25/100;


                                                  if ($upload) {
                                                          $akses->ubahriwayat3b($riwayat,$tanggal,$Keterangan,$niy,$id,$file1,$hasil);
                                                    
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
                                                                location.href='dashboard.php'
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
                                                              title: 'File yang anda kirim tidak sesuai !!',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                  }
                                                }
                                                 else if($jumlah=='4' && $status_penulis=='utama'){
                                                    $hasil = $angka_kk_saya*40/100;


                                                  if ($upload) {
                                                          $akses->ubahriwayat3b($riwayat,$tanggal,$Keterangan,$niy,$id,$file1,$hasil);
                                                    
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
                                                                location.href='dashboard.php'
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
                                                              title: 'File yang anda kirim tidak sesuai !!',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                  }
                                                }
                                                   else if($jumlah=='4' && $status_penulis=='pembantu'){
                                                    $hasil = $angka_kk_saya*20/100;


                                                  if ($upload) {
                                                          $akses->ubahriwayat3b($riwayat,$tanggal,$Keterangan,$niy,$id,$file1,$hasil);
                                                    
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
                                                                location.href='dashboard.php'
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
                                                              title: 'File yang anda kirim tidak sesuai !!',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                  }
                                                }
                                                 else if($jumlah>='5' && $status_penulis=='utama'){
                                                    $hasil = $angka_kk_saya*40/100;

                                                  if ($upload) {
                                                          $akses->ubahriwayat3b($riwayat,$tanggal,$Keterangan,$niy,$id,$file1,$hasil);
                                                    
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
                                                                location.href='dashboard.php'
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
                                                              title: 'File yang anda kirim tidak sesuai !!',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                  }
                                                }
                                                   else if($jumlah>='5' && $status_penulis=='pembantu'){
                                                    $hasil = ($angka_kk_saya*60/100)/($jumlah-1);

                                                  if ($upload) {
                                                          $akses->ubahriwayat3b($riwayat,$tanggal,$Keterangan,$niy,$id,$file1,$hasil);
                                                    
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
                                                                location.href='dashboard.php'
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
                                                              title: 'File yang anda kirim tidak sesuai !!',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                  }
                                                } else{
                                                     if ($upload) {
                                                          $akses->ubahriwayat3b($riwayat,$tanggal,$Keterangan,$niy,$id,$file1,$angka_kk_saya);
                                                    
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
                                                                location.href='dashboard.php'
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
                                                              title: 'File yang anda kirim tidak sesuai !!',
                                                              showConfirmButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              confirmButtonText: 'Kembali'

                                                            }).then((result) => {
                                                              if(result.value){
                                                                location.href='dashboard.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                  }
                                                }
}





?>