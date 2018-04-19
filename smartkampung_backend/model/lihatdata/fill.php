<div class="row">
    <div class="col-sm-4"> 
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
                    <!-- <p align="justify">
                        Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam.
                    </p> -->
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
                                $query = mysql_query("SELECT distinct(domain.domain) as domain FROM rekapitulasi join domain on rekapitulasi.iddomain = domain.iddomain");
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
                    <!-- <p align="justify">
                        Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam.
                    </p> -->
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
                                $query = mysql_query("SELECT distinct(kampung.namakampung) as kampung FROM rekapitulasi join kampung on rekapitulasi.idkampung = kampung.idkampung");
                                $no = 1;
                                while ($data = mysql_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['kampung']; ?></td>
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

    <div class="col-sm-8">
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
                    <!-- <p align="justify">
                        Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam.
                    </p> -->
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
                                $query = mysql_query("SELECT distinct(indikator.indikator) as indikator FROM rekapitulasi join indikator on rekapitulasi.idindikator = indikator.idindikator");
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
                    <!-- <p align="justify">
                        Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam.
                    </p> -->
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
                                $query = mysql_query("SELECT distinct(variabel.variabel) as variabel FROM rekapitulasi join variabel on rekapitulasi.idvariabel = variabel.idvariabel");
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