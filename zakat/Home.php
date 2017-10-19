<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <style type="text/css">
      *{
  padding:0;
  margin:0;

}
h1{
  padding: 20px;
  background-color: green;
  position: absolute;
  top: 0;left: 0;right: 0;
  font-size: 40px;
  color: white;
  text-align: center;
}
ul{
  padding:20px;width: 1235px;
  background-color: white;
  position: absolute;
  top: 110px;
  left: 45px;
}
li{
  float: left;
  list-style: none;
  color: black;
  position: relative;
  left: 0px;
}
input[name="nama"],input[name="alamat"],input[name="fitrah"],input[name="mall"],input[name="infaq"]{
  height: 30px;
  font-size: 17px;
  font-weight: bold;
  font-variant:small-caps;
}
input[type="checkbox"]{
  position: relative;
  width: 20px;height: 20px;top: 6px;
}
input[type="submit"]{
  height: 37px;width: 70px;
  position: relative;left: 5px;top: -3px;
  background-color: green;
  color: white;
}
input[type="submit"]:hover{
  cursor: pointer;
}
div{
  padding:20px;
  font-size: 20px;
  font-weight: bold;
  background-color: white;
  position: relative;
  top: 260px;left: 45px;
  width: 1235px; height: 250px;
  text-align: center;
  overflow: auto;
}
footer{
  padding: 20px;
  position: fixed;
  bottom: 0;left: 0;right: 0;
  background-color: green;
  color: white;
  text-align: center;
  font-size: 20px;
}
aside{
  padding:20px;
  position: absolute;
  top: 12px;right: 0px;
  color: white;
  font-size: 20px;
}
.clear{
  display: none;
  clear: both;
  width: 0px;
  background-color: skyblue;
}
table{
position: relative;
left: 20px;
width: 1200px;
}
@media screen and (max-width:480px){
  h1{
    font-size: 20px;
    text-align: center;

  }
  aside{
    font-size: 15px;
    top: -15px;right: 0px;
    font-weight: bold;
  }
  li{
    float: none;
  }
  li:nth-child(4){
    font-size: 20px;
  }
  ul{
    width: 350px;
  }
  input[name="nama"],input[name="alamat"],input[name="fitrah"],input[name="mall"],input[name="infaq"]{
    width: 345px;
  }
  input[type="radio"]{
    position: relative;
    top: 2px;
  }
  input[type="submit"]{
    position: relative;
    top: 2px;left: 130px;
  }
  div{
    top: 400px;
    width: 350px;
    font-size: 10px;
  }
  table{
    width: 350px;
    left: 0px;
  }

}

    </style>
    <title>Zakat Fitrah</title>
    <?php
    session_start();

    $server = 'localhost';
    $user = 'root';
    $pass = 'admin';
    $db = 'zakat';

    $connect = new mysqli($server,$user,$pass,$db);
    if ($connect -> connect_error) {
        die("Connected Failed: " . $connect->connect_error);
    }
     ?>
  </head>
  <body bgcolor="skyblue">
    <nav>
      <h1>Pembayaran Zakat Fitrah</h1>
    </nav>
    <aside class="akun">
      <?php
      $time= date("Y-m-d H:i:s");
      date_default_timezone_set('Asia/Jakarta');
      echo date('d-m-Y'). '<br>';
      echo date ('H:i:s'). '<br>';
        if (isset($_SESSION['user'])) {
            echo $_SESSION['user'];
        }else {
          echo "Silahkan Anda Login Terlebih Dahulu !!!";
          header('location:Eror.php');
          exit();
        }
       ?>
       <a href="logout.php">Logout</a>
    </aside>
    <form action="Home.php" method="post">
    <ul>
      <li><input type="text" name="nama" placeholder="NAMA"></li>
      <li><input type="text" name="alamat" placeholder="ALAMAT"></li>
      <li><input type="text" name="fitrah" placeholder="ZAKAT FITRAH"></li>
      <li>Beli :<input type="radio" name="beli" value="Beli">Tidak :<input type="radio" name="beli" value="Tidak" checked></li>
      <li><input type="text" name="mall" placeholder="ZAKAT MALL"></li>
      <li><input type="text" name="infaq" placeholder="INFAQ"></li>
      <li><input type="submit" name="submit" value="Selesai"></li>
    </ul>
    </form>
    <div>RESULT :
  <?php
    echo "<br><br>";


      if (isset($_POST['submit'])) {
          $nama = $_POST['nama'];
          $alamat =$_POST['alamat'];
          $fitrah=$_POST['fitrah'];
          $beli=$_POST['beli'];
          $mall=$_POST['mall'];
          $infaq=$_POST['infaq'];
          $date=$time;
          $ID=1;
          $NO="SELECT ID FROM db_zakat";
          $kirim=mysqli_query($connect,$NO);
          if ($kirim->num_rows > 0) {
              while ($hasil = $kirim->fetch_assoc()){
                $ID++;
              }
          }
          $sql = "INSERT INTO db_zakat values('$ID','$nama','$alamat','$fitrah','$beli','$mall','$infaq','$date')";

          if (mysqli_query($connect,$sql) == TRUE) {
              echo "Berhasil menambahkan";
              header('location: Home.php');
          }else {
            echo "gagal menambahkan";
          }
      }
      $SELECT = "SELECT * FROM db_zakat";
      $result = mysqli_query($connect,$SELECT);

if ($result->num_rows > 0) {
    $no = 0;
    echo '<table border="1">
              <tr>
                  <th>ID</th>
                  <th>NAMA</th>
                  <th>ALAMAT</th>
                  <th>ZAKAT FITRAH</th>
                  <th>BELI</th>
                  <th>ZAKAT MALL</th>
                  <th>INFAQ</th>
                  <th>WAKTU</th>
              </tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $no++;
        echo "<tr><td>".$no."</td><td>".$row["NAMA"]."</td><td>".$row["ALAMAT"]."</td><td> ".$row["ZAKAT FITRAH"]." KG"."</td><td>".$row["BELI"]."</td><td>".$row["ZAKAT MALL"]."</td><td>".$row['INFAQ']."</td><td>".$row["WAKTU"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


       ?>
       <div class="clear">
         &nbsp;
       </div>
    </div>
    <footer>&copy;2017 Created By M Nur Fauzan W </footer>
  </body>
</html>
