<?php

    require 'fungsi_sikap.php';

    $akses = new Sikap();
    $akses->koneksi();

?>






<!DOCTYPE html>
<html>
    <head>

    <script type="text/javascript" src="css/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="css/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sweetalert2/dist/sweetalert2.min.css">



     
   </head>
   <body>

   <?php
// Source Code Download File dengan PHP
if(isset($_GET['file'])){
 $file = 'upload1/'.$_GET['file'];
 
 if (file_exists($file))
 {
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename='.basename($file));
  header('Content-Transfer-Encoding: binary');
  header('Expires: 0');
  header('Cache-Control: private');
  header('Pragma: private');
  header('Content-Length: ' . filesize($file));
  ob_clean();
  flush();
  readfile($file);
  exit;
 } 
 else 
 {
  echo "file {$_GET['file']} sudah tidak ada.";
 }
}
?>


    </body>
</html>






