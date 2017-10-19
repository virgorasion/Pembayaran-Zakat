<!DOCTYPE html>
<html>
  <head>
    <?php
    $user1 = 'Fauzan';
    $user2 = 'Oky';
    $user3 = 'Handi';
    $pass = 'Admin';
    session_start();
     ?>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Form Login</title>
     <style media="screen">
       div{
         position: absolute;
         padding:20px;
         border-radius: 7px;
         background-color: white;
         color:black;
         top: 200px;
         left: 450px;
         width: 400px;
         height: 200px;
       }
       ul{
         list-style: none;
         position: relative;
         left: 20px;top: 0px;
       }
       input[type="text"]{
         width: 200px;
        height: 35px;
        border-radius: 5px;
       }
       input[type="password"]{
         width: 200px;
         height: 35px;
         border-radius: 5px;
       }
       input[type="submit"]{
         background-color: green;
         color: white;
         width: 80px;
         height: 40px;
         left: 70px;
         position: relative;
         border-radius: 7px;
       }
       @media (max-width:480px){
         div{
           left: 20px;
         }
       }
     </style>
  </head>
  <body bgcolor="black" style="margin:0;padding:0;">
    <div class="form">
      <p align="center">SILAHKAN LOGIN TERLEBIH DAHULU !!!</p>
      <form method="post">
        <ul>
          <li>Username :<input type="text" name="username" placeholder="Username"></li>
          <li>Password : <input type="password" name="password" placeholder="**********"></li><br>
          <input type="submit" name="submit" value="Login">
        </ul>
      </form>
      <?php
      if (isset($_POST['submit'])) {
        if ($_POST['username'] == $user2 || $_POST['username'] == $user1 || $_POST['username'] == $user3 AND $_POST['password'] == $pass) {
            $_SESSION['user'] = $_POST['username'];

            $myfile = fopen("login.txt", "a") or die("Unable to open file!");
            $txt = 'Telah Login : ' . $_POST['username']. " Pada : ". date("d-m-Y h:i:sa")."\n";
            fwrite($myfile, $txt);


            header('location: Home.php');
        }else {
          echo '<p style="position:relative;top:-10px;color:red;">Login Gagal !!!</p>';
        }
      }
      if (isset($_SESSION['user'])) {
          header('location: Home.php');
      }
       ?>
    </div>
  </body>
</html>
