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
$angka_kk_saya = $_POST['angka_kredit_saya'];
$tanggal = $_POST['tanggal'];
$data1 =  $_FILES['upload_data']['tmp_name'];
$Keterangan = $_POST['komentar3'];

$status = "baru";
$penilai = "sudah diperbaiki";

$data = $_FILES['upload_data']['name'];
$extensi = explode('.', $data);
 $file1 = "file-".round(microtime(true)).".".end($extensi);
$sumber = $data1;
 

  if($data == ''){
$akses->ubahriwayat2a($riwayat,$tanggal,$Keterangan,$angka_kk_saya,$niy,$id,$penilai);
echo "<script>window.location='dashboard.php'</script>";

} else {
  $file_awal = $akses->datariwayat($id)->fetch_object()->upload_data;
  unlink("upload1/".$file_awal);

  $upload = move_uploaded_file($sumber, "upload1/".$file1);




                                                  if ($upload) {
                                                          $akses->ubahriwayat3a($riwayat,$tanggal,$Keterangan,$angka_kk_saya,$niy,$id,$file1);
                                                    
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




?>