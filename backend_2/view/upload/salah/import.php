<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once('@css.php'); ?>    
  </head>
  <body>

    <?php require_once('@header.php'); ?>
    <?php
        $user_name = "root";
        $password = "gmdw66ZmXBMY";
        $database = "deny";
        $host_name = "localhost";
          
        $connect_db=mysql_connect($host_name, $user_name, $password);
         
        $find_db=mysql_select_db($database);
    ?>
  <div class="wrapper">
    <div class="container">

      <!-- Row start -->
      <div class="row">
          <div class="col-lg-7 col-md-7">
              <div class="card-box">
                  <div class="row">
                      <div class="col-md-12">
                        <h1>Import File Excel</h1>

                        <div class="" style="border-bottom:solid red 0px;padding-top:2%">
                        <strong><h3>Langkah Pertama</h3></strong>
                        Sebelum melakukan update data siswa menggunakan import file, pastikan dahulu apakah data kelas tersebut sudah ter-import atau belum, agar tidak terjadi error / duplikasi data.
                        Hal tersebut juga akan berpengaruh pada menu pencatatan dan analisa.<br>
                          <br>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="col-md-4"><b>Kelas X</b><br><br>
                                <?php 
                                $query = mysql_query("select distinct kelas from siswa where kelas like '_ %'");
                                
                                $no = 1;
                                while ($data = mysql_fetch_array($query)) {
                                ?>
                                    <ul>
                                        <li><?php echo $data['kelas']; ?></li>
                                    </ul>
                                <?php 
                                    $no++;
                                } 
                                ?>
                              </div>
                              <div class="col-md-4"><b>Kelas XI</b><br><br>
                                <?php 
                                $query = mysql_query("select distinct kelas from siswa where kelas like '_I %'");
                                
                                $no = 1;
                                while ($data = mysql_fetch_array($query)) {
                                ?>
                                    <ul>
                                        <li><?php echo $data['kelas']; ?></li>
                                    </ul>
                                <?php 
                                    $no++;
                                } 
                                ?>
                              </div>
                              <div class="col-md-4"><b>Kelas XII</b><br><br>
                                <?php 
                                $query = mysql_query("select distinct kelas from siswa where kelas like '_II%'");
                                
                                $no = 1;
                                while ($data = mysql_fetch_array($query)) {
                                ?>
                                    <ul>
                                        <li><?php echo $data['kelas']; ?></li>
                                    </ul>
                                <?php 
                                    $no++;
                                } 
                                ?>
                              </div>
                            </div>
                          <br>
                        </div>

                        <div class="" style="border-top:solid #4ECDC4 0px;padding-top:2%">
                        <form method="post" enctype="multipart/form-data" action="import_jalan.php">
                        <strong><h3>Langkah Kedua</h3></strong>
                        Import Data Siswa Dan Siswi <br><br><input name="fileexcel" type="file"> <br><br>
                        <button class="btn" style="background-color:#4ECDC4" name="upload" type="submit" value="Import"><span class="glyphicon glyphicon-upload" style="margin-right:5%"></span>Import</button>
                        </form>
                        * file yang bisa di import adalah .xls (Excel 2003-2007).

                        </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-5 col-md-5">
              <div class="card-box">
                  <div class="row">
                      <div class="col-md-12">
                        <center>
                          <h3>Panduan Import File Excel</h3>
                        </center>
                        
                        <!--
                        <li>Langkah pertama adalah</li><br>
                        <img class="img-responsive " style="width:90%" src="assets/img/Ss 1.png"><br>

                        <li>Langkah kedua adalah</li><br>
                        <img class="img-responsive " style="width:90%" src="assets/img/Ss 2.png"><br>

                        <li>Langkah ketiga adalah</li><br>
                        <img class="img-responsive " style="width:90%" src="assets/img/Ss 3.png"><br>
                        -->

                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End of Row -->
    </div>
  </div>

  <!-- jQuery  -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/detect.js"></script>
  <script src="assets/js/fastclick.js"></script>
  <script src="assets/js/jquery.slimscroll.js"></script>
  <script src="assets/js/jquery.blockUI.js"></script>
  <script src="assets/js/waves.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/jquery.nicescroll.js"></script>
  <script src="assets/js/jquery.scrollTo.min.js"></script>

  <!-- Autocorrect -->
  <script src="../assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
  <script src="../assets/plugins/switchery/js/switchery.min.js"></script>
  <script type="text/javascript" src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="../assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
  <script type="text/javascript" src="../assets/plugins/select2/js/select2.min.js"></script>
  <script type="text/javascript" src="../assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="../assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
  <script type="text/javascript" src="../assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
  <script type="text/javascript" src="../assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

  <!-- App core js -->
  <script src="assets/js/jquery.core.js"></script>
  <script src="assets/js/jquery.app.js"></script>

  </body>
</html>