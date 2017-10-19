<?php
  session_start();
  //query menulis text ke login.txt
  $mytext = fopen('login.txt','a');
  $txt = 'Telah Logout: '. $_SESSION['user']. ' Pada : ' . date('d-m-Y h:i:sa')."\n";
  fwrite($mytext,$txt);
//  query penghapusan session login
  session_destroy();
  header("location: Login.php");
 ?>
