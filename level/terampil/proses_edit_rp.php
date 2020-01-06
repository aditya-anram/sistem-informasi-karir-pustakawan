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

												$id = $_POST['id_rp'];
												 $komponen = $_POST['komponen'];
                                                  $butir = $_POST['butir'];
                                                  $rincian = $_POST['rincian'];
                                                  $angka_kredit = $_POST['angka_kredit'];
                                                  $status = "ahli";

                                                 

                                                     $akses->ubahringkasan($komponen, $butir, $rincian, $angka_kredit, $id);

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
                                                                location.href='ubah_data.php'
                                                              }
                                                              })
                                                            </script>
                                                            ";
                                                     



?>