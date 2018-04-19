<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
              <div class="wrapper-page">
                <div class=" card-box">
                    <div class="panel-heading"> 
                        <h3 class="text-center"> Sign In to <strong class="text-custom"> Smart Kampung</strong> </h3>
                    </div> 
                    <div class="panel-body">
                        <form class="form-horizontal m-t-20" action="index.html">
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" required="" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" required="" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group text-center m-t-40">
                                <div class="col-xs-12">
                                    <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
                        </form> 
                    </div>   
                </div>
              </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
    <div class="col-sm-12">
      <div class="card-box">
          <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT namakampung as nama FROM kampung where idkampung = '$id'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <h4 class="text-dark header-title m-t-0">Kampung <?php echo $data['nama'];?></h4>
            <?php 
                $no++;
            } 
            ?>
          <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div id="container1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card-box">
                    <div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card-box">
                    <div id="container3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card-box">
                    <div id="container4" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card-box">
                    <div id="container5" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card-box">
                    <div id="container6" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">

Highcharts.chart('container1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Smart Economy'
    },
    subtitle: {
        text: 'Perolehan Nilai'
    },
    xAxis: {
        categories: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '1'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo "'".$data['variabel']."',";?>
            <?php 
                $no++;
            } 
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT kampung.namakampung as nama FROM rekapitulasi JOIN kampung ON rekapitulasi.idkampung = kampung.idkampung WHERE rekapitulasi.idkampung = '$id'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo "name: 'Nilai Kampung ".$data['nama']."',";?>
            <?php 
                $no++;
            } 
            ?>
        data: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '1'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo $data['nilai'].",";?>
            <?php 
                $no++;
            } 
            ?>
        ]

    }, {
        name: 'Nilai Rata-Rata Semua Kampung',
        data: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.iddomain = '1' group by variabel");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo $data['nilai'].",";?>
            <?php 
                $no++;
            } 
            ?>
        ]

    }]
});
</script>

<script type="text/javascript">

Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Smart Mobility'
    },
    subtitle: {
        text: 'Perolehan Nilai'
    },
    xAxis: {
        categories: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '2'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo "'".$data['variabel']."',";?>
            <?php 
                $no++;
            } 
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT kampung.namakampung as nama FROM rekapitulasi JOIN kampung ON rekapitulasi.idkampung = kampung.idkampung WHERE rekapitulasi.idkampung = '$id'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo "name: 'Nilai Kampung ".$data['nama']."',";?>
            <?php 
                $no++;
            } 
            ?>
        data: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '2'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo $data['nilai'].",";?>
            <?php 
                $no++;
            } 
            ?>
        ]

    }, {
        name: 'Nilai Rata-Rata Semua Kampung',
        data: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.iddomain = '2' group by variabel");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo $data['nilai'].",";?>
            <?php 
                $no++;
            } 
            ?>
        ]

    }]
});
</script>

<script type="text/javascript">

Highcharts.chart('container3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Smart Environment'
    },
    subtitle: {
        text: 'Perolehan Nilai'
    },
    xAxis: {
        categories: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '3'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo "'".$data['variabel']."',";?>
            <?php 
                $no++;
            } 
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT kampung.namakampung as nama FROM rekapitulasi JOIN kampung ON rekapitulasi.idkampung = kampung.idkampung WHERE rekapitulasi.idkampung = '$id'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo "name: 'Nilai Kampung ".$data['nama']."',";?>
            <?php 
                $no++;
            } 
            ?>
        data: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '3'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo $data['nilai'].",";?>
            <?php 
                $no++;
            } 
            ?>
        ]

    }, {
        name: 'Nilai Rata-Rata Semua Kampung',
        data: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.iddomain = '3' group by variabel");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo $data['nilai'].",";?>
            <?php 
                $no++;
            } 
            ?>
        ]

    }]
});
</script>

<script type="text/javascript">

Highcharts.chart('container4', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Smart People'
    },
    subtitle: {
        text: 'Perolehan Nilai'
    },
    xAxis: {
        categories: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '4'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo "'".$data['variabel']."',";?>
            <?php 
                $no++;
            } 
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT kampung.namakampung as nama FROM rekapitulasi JOIN kampung ON rekapitulasi.idkampung = kampung.idkampung WHERE rekapitulasi.idkampung = '$id'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo "name: 'Nilai Kampung ".$data['nama']."',";?>
            <?php 
                $no++;
            } 
            ?>
        data: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '4'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo $data['nilai'].",";?>
            <?php 
                $no++;
            } 
            ?>
        ]

    }, {
        name: 'Nilai Rata-Rata Semua Kampung',
        data: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.iddomain = '4' group by variabel");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo $data['nilai'].",";?>
            <?php 
                $no++;
            } 
            ?>
        ]

    }]
});
</script>

<script type="text/javascript">

Highcharts.chart('container5', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Smart Living'
    },
    subtitle: {
        text: 'Perolehan Nilai'
    },
    xAxis: {
        categories: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '5'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo "'".$data['variabel']."',";?>
            <?php 
                $no++;
            } 
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT kampung.namakampung as nama FROM rekapitulasi JOIN kampung ON rekapitulasi.idkampung = kampung.idkampung WHERE rekapitulasi.idkampung = '$id'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo "name: 'Nilai Kampung ".$data['nama']."',";?>
            <?php 
                $no++;
            } 
            ?>
        data: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '5'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo $data['nilai'].",";?>
            <?php 
                $no++;
            } 
            ?>
        ]

    }, {
        name: 'Nilai Rata-Rata Semua Kampung',
        data: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.iddomain = '5' group by variabel");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo $data['nilai'].",";?>
            <?php 
                $no++;
            } 
            ?>
        ]

    }]
});
</script>

<script type="text/javascript">

Highcharts.chart('container6', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Smart Governance'
    },
    subtitle: {
        text: 'Perolehan Nilai'
    },
    xAxis: {
        categories: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '6'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo "'".$data['variabel']."',";?>
            <?php 
                $no++;
            } 
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT kampung.namakampung as nama FROM rekapitulasi JOIN kampung ON rekapitulasi.idkampung = kampung.idkampung WHERE rekapitulasi.idkampung = '$id'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo "name: 'Nilai Kampung ".$data['nama']."',";?>
            <?php 
                $no++;
            } 
            ?>
        data: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '6'");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo $data['nilai'].",";?>
            <?php 
                $no++;
            } 
            ?>
        ]

    }, {
        name: 'Nilai Rata-Rata Semua Kampung',
        data: [
        <?php 
            $id = $_GET['id'];
            $query = mysql_query("SELECT variabel.variabel AS variabel , rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.iddomain = '6' group by variabel");
            $no = 1;
            while ($data = mysql_fetch_array($query)) {
            ?>
                <?php echo $data['nilai'].",";?>
            <?php 
                $no++;
            } 
            ?>
        ]

    }]
});
</script>