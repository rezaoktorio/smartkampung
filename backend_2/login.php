<?php
session_start();

if (!empty($_SESSION['username'])) {
  header('location:view/dashboard/');
}
?>
<html>
<head>
<title>Smart Kampung for Smart City</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

<?php
//kode php ini kita gunakan untuk menampilkan pesan eror
if (!empty($_GET['error'])) {
  if ($_GET['error'] == 1) {
    echo '<center><h3>Username dan Password belum diisi!</h3></center>';
  } else if ($_GET['error'] == 2) {
    echo '<center><h3>Isi Username dengan benar!</h3></center>';
  } else if ($_GET['error'] == 3) {
    echo '<center><h3>Isi Password dengan benar!</h3></center>';
  } else if ($_GET['error'] == 4) {
    echo '<center><h3>Akun tidak terdaftar!</h3></center>';
  }
}
?>

<div class="col-lg-3 col-md-3" style="padding-top:12%;border:solid black 0px;">

</div>
<div class="col-lg-6 col-md-6" style="padding-top:10%;border:solid black 0px;background:;">
  <div class="col-lg-12 col-md-12" style="border-top:solid black 0px;background:#34495E;">
    <center>
        <font color="#4ECDC4"><h3><i class="fa fa-paw"></i>Visualisasi Informasi</h3></font>
      </center>
  </div>
  <div class="col-lg-6 col-md-6" style="padding-top:3%;border:solid black 0px;">
    <center><img class="img-responsive " style="width:55%;float:" src="assets/images/logo_login.png"></center>
  </div>
  <div class="col-lg-6 col-md-6" style="padding-top:2%;border:solid black 0px;">
    <form class="form-inline" role="form" name="login" action="otentikasi.php" method="post">
      <div class="form-group has-success has-feedback" style="margin-bottom:4%">
        <label class="control-label" for="inputSuccess4"><font style="color:#34495E">Username</font></label>
        <input type="text" class="form-control" name="username" id="inputSuccess4">
      </div>
      <div class="form-group has-success has-feedback">
        <label class="control-label" for="inputSuccess4"><font style="color:#34495E">Password</font></label>
        <input type="password" class="form-control" name="password" id="inputSuccess4"><br>
        <input class="btn btn-default" style="margin-top:4%;background:#34495E;color:#4ECDC4" type="submit" name="login" value="Masuk" />
        <a href="" target="_" style="color:#34495E" class="btn btn-white btn-custom waves-effect"> Lewati</a>
      </div>
    </form>
  </div>
  <div class="col-lg-12 col-md-12" style="color:#34495E;border-top:solid #34495E 1px;margin-top:2%">
    <center>
        <h1><i class="fa fa-paw"></i>Smart Kampung for Smart City</h1>
        <p>Departemen Perencanaan Wilayah dan Kota ITS<br>Jalan Raya ITS Campus ITS Sukolilo Surabaya Jawa Timur 60111, Keputih, Sukolilo, Kota SBY, Jawa Timur 60117<br>2017 © All Rights Reserved.</p>
      </center>
  </div>
</div>
<div class="col-lg-3 col-md-3" style="padding-top:12%;border:solid black 0px;">

</div>

</body>
</html>
