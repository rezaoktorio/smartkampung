<?php
include "excel_reader2.php";
$username = 'u156760488_admin';
$password = "gmdw66ZmXBMY";
$database = 'u156760488_smart';

mysql_connect("localhost", $username, $password);
mysql_select_db($database);

$data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['tmp_name']);
$hasildata = $data->rowcount($sheet_index=0);
// default nilai 
$sukses = 0;
$gagal = 0;

for ($i=2; $i<=$hasildata; $i++)
{
  $data1 = $data->val($i,2); 
  $data2 = $data->val($i,3);
  $data3 = $data->val($i,4);
  $data4 = $data->val($i,5);
  $data5 = $data->val($i,6);
  $data6 = $data->val($i,7);
  $data7 = $data->val($i,8);
  //$date = date('Y-m-d H:i:s');
  //$rand = rand();

$query = "INSERT INTO rekapitulasi  VALUES ('$data1','$data2','$data3', '$data4', '$data5', '$data6', '$data7')";
$hasil = mysql_query($query);

if ($hasildata) $sukses++;
else $gagal++;
  
//echo "<pre>";
//print_r($query);
//echo "Maaf, terjadi kesalahan dalam import data siswa !<br>";
//echo "</pre>";

}
?>

<?php require_once('../../controller/header.php'); ?>

<body class="fixed-left">

  <div id="wrapper">

  <?php require_once('../../controller/sidebar.php'); ?>

    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container">
          <div class="col-sm-12">
            <?php 
            echo "<b>import data selesai.</b> <br>";
            echo "Data yang berhasil di-import : " . $sukses .  "<br>";
            echo "Data yang gagal di-import : ".$gagal .  "<br>";
            ?>
            <div style="border-bottom:solid #4ECDC4 5px;">&nbsp;</div>
            <center><br><h5><a href="//localhost/smartcity_backend/view/upload/">Kembali ke menu upload</a></h5></center>
          </div>
        </div>
      </div>
      <?php require_once('../../controller/footer.php'); ?>
    </div>

  </div>

  <?php require_once('../../controller/bottom.php'); ?>

  </body>
</html>