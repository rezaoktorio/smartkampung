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

  //$date = date('Y-m-d H:i:s');
  //$rand = rand();

$query = "INSERT INTO indikator (indikator) VALUES ('$data1')";
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
                              <h4 class="page-title">Menu Kuesioner</h4>
                              <p class="text-muted page-title-alt">Selamat Datang Pada Menu Kuesioner</p>
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
