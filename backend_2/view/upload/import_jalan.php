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

  //$date = date('Y-m-d H:i:s');
  //$rand = rand();

$query = "INSERT INTO rekapitulasi (iddomain,idindikator,idvariabel,idkampung,tanggal,nilai) VALUES ('$data1','$data2','$data3', '$data4', '$data5', '$data6')";
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

        <!-- Begin page -->
        <div id="wrapper">

        <?php require_once('../../controller/sidebar.php'); ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Upload Data</h4>
                                <p class="text-muted page-title-alt">Selamat Datang Pada Menu Upload Data</p>
                            </div>
                        </div>
                        
                        <div class="container">
                            <div class="col-lg-4">
                                <?php 
                                echo "<b>upload data selesai.</b> <br>";
                                echo "Data yang berhasil di-upload : " . $sukses .  "<br>";
                                echo "Data yang gagal di-upload : ".$gagal .  "<br>";
                                echo "<a href='index.php'>Upload Ulang</a>";
                                ?>
                                <div style="border-bottom:solid #4ECDC4 5px;">&nbsp;</div>
                                <center><br><h5><a href="//localhost/smartcity_backend/view/pertanyaan/">Lihat Data</a></h5></center>
                            </div>
                        </div>

                    </div> <!-- container -->
                </div> <!-- content -->

                <?php require_once('../../controller/footer.php'); ?>

            </div>

        </div>
        <!-- END wrapper -->

        <?php require_once('../../controller/bottom.php'); ?>

    </body>
</html>