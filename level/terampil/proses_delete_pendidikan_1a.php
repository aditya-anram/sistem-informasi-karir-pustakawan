<?php

    require 'fungsi_sikap.php';

    $akses = new Sikap();
    $akses->koneksi();

?>






<!DOCTYPE html>
<html>
    <head>

   <script type="text/javascript" src="sweetalert2/dist/sweetalert2.all.min.js"></script>
     <script type="text/javascript" src="sweetalert2/dist/sweetalert2.min.js"></script>
     <link rel="stylesheet" type="text/css" href="sweetalert2/dist/sweetalert2.min.css">



     
   </head>
   <body>

    <?php 

$id=$_GET['id'];
$hapus=$_GET['upload'];
unlink("upload1/".$hapus);
$akses->delete_pendidikan_1a($id);
                                                    echo "
                                                              <script type='text/javascript'>
                                                            Swal.fire({
                                                              position: 'middle',
                                                              type: 'success',
                                                              title: 'Data telah di hapus',
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


    </body>
</html>






