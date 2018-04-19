<div class="row">
    <div class="col-sm-5">
        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-heading bg-primary">
                    <h3 class="portlet-title">
                        Data Domain
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-info" class="collapsed" aria-expanded="false"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <?php
                  $query = mysql_query("SELECT count(iddomain) as total FROM domain");
                  $no = 1;
                  while ($data = mysql_fetch_array($query)) {
                  ?>
                    <p align="justify">
                        <center>Terdapat <?php echo $data['total']; ?> total domain tercatat.</center>
                    </p>
                  <?php
                      $no++;
                  }
                  ?>
                  <form method="post" enctype="multipart/form-data" action="import_jalan1.php">
                      <div class="col-sm-12">
                          <div class="col-sm-12">
                              <center><input name="fileexcel" type="file"></center><br>
                          </div>
                          <div class="col-sm-12">
                            <center>
                              <a class="btn btn-white btn-danger waves-effect" href="delete1.php?id=<?php echo $data['idkampung']; ?>"><i class="fa fa-trash-o"></i> Hapus</a>
                              <button class="btn bg-primary" name="upload" type="submit" value="Import"><span class="glyphicon glyphicon-upload" style="margin-right:0%"></span>Upload</button>
                            </center>
                          </div>
                      </div>
                  </form>
                </div>
                <div id="bg-info" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Domain</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = mysql_query("SELECT * FROM domain");
                                $no = 1;
                                while ($data = mysql_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['domain']; ?></td>
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

        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-heading bg-custom">
                    <h3 class="portlet-title">
                        Data Kampung
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-success" class="collapsed" aria-expanded="false"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <?php
                  $query = mysql_query("SELECT count(idkampung) as total FROM kampung");
                  $no = 1;
                  while ($data = mysql_fetch_array($query)) {
                  ?>
                    <p align="justify">
                        Terdapat <?php echo $data['total']; ?> total kampung tercatat.
                    </p>
                  <?php
                      $no++;
                  }
                  ?>
                  <form method="post" enctype="multipart/form-data" action="import_jalan2.php">
                      <div class="col-sm-12">
                          <div class="col-sm-12">
                              <center><input name="fileexcel" type="file"></center><br>
                          </div>
                          <div class="col-sm-12">
                            <center>
                              <a class="btn btn-white btn-danger waves-effect" href="delete2.php?id=<?php echo $data['idkampung']; ?>"><i class="fa fa-trash-o"></i> Hapus</a>
                              <button class="btn bg-primary" name="upload" type="submit" value="Import"><span class="glyphicon glyphicon-upload" style="margin-right:0%"></span>Upload</button>
                            </center>
                          </div>
                      </div>
                  </form>
                </div>
                <div id="bg-success" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kampung</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = mysql_query("SELECT * FROM kampung");
                                $no = 1;
                                while ($data = mysql_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['namakampung']; ?></td>
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

    <div class="col-sm-7">
        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-heading bg-danger">
                    <h3 class="portlet-title">
                        Data Indikator
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-danger" class="collapsed" aria-expanded="false"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <?php
                  $query = mysql_query("SELECT count(idindikator) as total FROM indikator");
                  $no = 1;
                  while ($data = mysql_fetch_array($query)) {
                  ?>
                    <p align="justify">
                        Terdapat <?php echo $data['total']; ?> total indikator tercatat.
                    </p>
                  <?php
                      $no++;
                  }
                  ?>
                  <form method="post" enctype="multipart/form-data" action="import_jalan3.php">
                      <div class="col-sm-12">
                          <div class="col-sm-12">
                              <center><input name="fileexcel" type="file"></center><br>
                          </div>
                          <div class="col-sm-12">
                            <center>
                              <a class="btn btn-white btn-danger waves-effect" href="delete3.php?id=<?php echo $data['idindikator']; ?>"><i class="fa fa-trash-o"></i> Hapus</a>
                              <button class="btn bg-primary" name="upload" type="submit" value="Import"><span class="glyphicon glyphicon-upload" style="margin-right:0%"></span>Upload</button>
                            </center>
                          </div>
                      </div>
                  </form>
                </div>
                <div id="bg-danger" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Indikator</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = mysql_query("SELECT * FROM indikator");
                                $no = 1;
                                while ($data = mysql_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['indikator']; ?></td>
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
        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-heading bg-purple">
                    <h3 class="portlet-title">
                        Data Variabel
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-inverse" class="collapsed" aria-expanded="false"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <?php
                  $query = mysql_query("SELECT count(idvariabel) as total FROM variabel");
                  $no = 1;
                  while ($data = mysql_fetch_array($query)) {
                  ?>
                    <p align="justify">
                        Terdapat <?php echo $data['total']; ?> total variabel tercatat.
                    </p>
                  <?php
                      $no++;
                  }
                  ?>
                  <form method="post" enctype="multipart/form-data" action="import_jalan4.php">
                      <div class="col-sm-12">
                          <div class="col-sm-12">
                              <center><input name="fileexcel" type="file"></center><br>
                          </div>
                          <div class="col-sm-12">
                            <center>
                              <a class="btn btn-white btn-danger waves-effect" href="delete4.php?id=<?php echo $data['idvariabel']; ?>"><i class="fa fa-trash-o"></i> Hapus</a>
                              <button class="btn bg-primary" name="upload" type="submit" value="Import"><span class="glyphicon glyphicon-upload" style="margin-right:0%"></span>Upload</button>
                            </center>
                          </div>
                      </div>
                  </form>
                </div>
                <div id="bg-inverse" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Variabel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = mysql_query("SELECT * FROM variabel");
                                $no = 1;
                                while ($data = mysql_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['variabel']; ?></td>
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
<div class="row">
    <div class="col-sm-12">
      <div class="card-box">
          <h4 class="text-dark header-title m-t-0">Kuesioner</h4>
          <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Domain</th>
                            <th>Indikator</th>
                            <th>Variabel</th>
                            <th>Kampung</th>
                            <th>Nilai</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = mysql_query("SELECT kampung.namakampung AS kampung, rekapitulasi.nilai AS nilai, domain.domain AS domain, variabel.variabel AS variabel, indikator.indikator AS indikator FROM rekapitulasi
                                                JOIN domain ON rekapitulasi.iddomain = domain.iddomain
                                                JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel
                                                JOIN indikator ON rekapitulasi.idindikator = indikator.idindikator
                                                JOIN kampung ON rekapitulasi.idkampung = kampung.idkampung
                                                ORDER BY `rekapitulasi`.`idrekapitulasi`  ASC");
                        $no = 1;
                        while ($data = mysql_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['domain']; ?></td>
                                <td><?php echo $data['indikator']; ?></td>
                                <td><?php echo $data['variabel']; ?></td>
                                <td><?php echo $data['kampung']; ?></td>
                                <td><?php echo $data['nilai']; ?></td>
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
