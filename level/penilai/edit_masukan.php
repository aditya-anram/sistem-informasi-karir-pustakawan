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

<?php
$nilai = $_POST['hasil'];
$id = $_POST['id_riwayat'];
$Keterangan = $_POST['komentar3'];
$status = $_POST['statusnilai'];
$status1 = "sudah lama mengajukan";

$akses->inputpenilai1($id,$username,$status,$id,$Keterangan);
$akses->updatekredityangdisetujui($id,$status1);
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




?>