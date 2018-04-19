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
                                <div class="btn-group pull-right m-t-15">
                                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Aksi <span class="m-l-5"><i class=" ti-panel"></i></span></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#"><i class=" ti-printer"></i> Cetak</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class=" ti-import"></i> Unduh</a></li>
                                    </ul>
                                </div>
                                <h4 class="page-title">Menu Administrator</h4>
                                <p class="text-muted page-title-alt">Selamat Datang Pada Menu Administrator</p>
                            </div>
                        </div>
                        
                        <?php 
                        $id = $_GET['id'];
                        $query = mysql_query("select * from admin where idadmin='$id'") or die(mysql_error());
                        $data = mysql_fetch_array($query);
                        ?>
                        <form name="update_data" action="update.php" method="post">
                            <div class="row">
                              <div class="col-lg-12">
                                  <div class="card-box">
                                      <h4 class="text-dark header-title m-t-0">Ubah Data Administrator</h4>
                                      <p class="text-muted m-b-15 font-13" align="justify">Pada menu top up, data hanya bisa disimpan, tidak dapat dihapus dan diubah. Hal tersebut karena menu ini merupakan menu transaksi/riwayat yang tidak boleh sembarangan dihapus/diubah. Jika terjadi kesalahan dalam pengisian data, mohon segera menghubungi admin.</p>
                                      <div class="row">
                                          <div class="col-sm-1">
                                              <h5><b>ID</b></h5>
                                              <input type="text" name="idadmin" class="form-control" value="<?php echo $data['idadmin']; ?>" readonly>
                                          </div>
                                          <div class="col-sm-5">
                                              <h5><b>Masukan Nama Lengkap</b></h5>
                                              <input type="text" name="namaadmin" class="form-control" value="<?php echo $data['namaadmin']; ?>">
                                          </div>
                                          <div class="col-md-6">
                                              <h5><b>Masukan Password</b></h5>
                                              <input type="text" name="passwordadmin" class="form-control" value="<?php echo $data['password']; ?>">
                                          </div>
                                          <div class="col-md-8">
                                              <h5><b>Masukan Alamat</b></h5>
                                              <input type="text" name="alamatadmin" class="form-control" value="<?php echo $data['alamatadmin']; ?>">
                                          </div>
                                          <div class="col-md-4">
                                              <h5><b>Masukan Nomor Telepon</b></h5>
                                              <input type="text" name="telponadmin" class="form-control" value="<?php echo $data['telponadmin']; ?>">
                                          </div>
                                      </div>
                                      <br><button type="submit" value="Update" name="submit" class="btn btn-default waves-effect waves-light">
                                         <span class="btn-label"><i class="fa fa-check"></i>
                                         </span>Ubah
                                     </button>
                                     <button type="button" class="btn btn-danger waves-effect waves-light">
                                         <span class="btn-label"><i class="fa fa-times"></i>
                                         </span>Batal
                                     </button>
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0">Daftar Administrator</h4>
                                    <div class="row">
                                      <div class="col-sm-12">
                                          <div class="card-box table-responsive">
                                              <table id="datatable-buttons" class="table table-striped table-bordered">
                                                  <thead>
                                                  <tr>
                                                      <th>No.</th>
                                                      <th>Nama</th>
                                                      <th>Password</th>
                                                      <th>Alamat</th>
                                                      <th>Telepon</th>
                                                      <th>Tercatat</th>
                                                  </tr>
                                                  </thead>
                                                  <tbody>
                                                  <?php 
                                                  $query = mysql_query("SELECT * FROM admin");
                                                  $no = 1;
                                                  while ($data = mysql_fetch_array($query)) {
                                                  ?>
                                                      <tr>
                                                          <td><?php echo $no; ?></td>
                                                          <td style="float:right">
                                                            <a class="btn btn-white btn-custom waves-effect" href="edit.php?id=<?php echo $data['idadmin']; ?>"><?php echo $data['namaadmin']; ?></a>
                                                            <a class="btn btn-white btn-danger waves-effect" href="delete.php?id=<?php echo $data['idadmin']; ?>"><i class="fa fa-trash-o"></i></a>
                                                          </td>
                                                          <td><?php echo $data['password']; ?></td>
                                                          <td><?php echo $data['alamatadmin']; ?></td>
                                                          <td><?php echo $data['telponadmin']; ?></td>
                                                          <td><?php echo $data['tercatatadmin']; ?></td>
                                                      </tr>
                                                  <?php 
                                                      $no++;
                                                  } 
                                                  ?>
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </form>

                    </div> <!-- container -->
                </div> <!-- content -->

                <?php require_once('../../controller/footer.php'); ?>

            </div>

        </div>
        <!-- END wrapper -->

        <?php require_once('../../controller/bottom.php'); ?>

    </body>
</html>