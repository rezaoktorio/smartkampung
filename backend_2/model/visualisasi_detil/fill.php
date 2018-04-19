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
            $id = $_POST['kampung'];
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
                    <div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
      <div class="card-box">
        <div class="row">
            <div class="col-sm-7">
                <div class="card-box">
                    <div id="container3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-sm-5">
                <form name="update_data" action="detil_domain.php" method="post">
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Domain</th>
                                        <th>Nilai Rata-rata </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $id = $_POST['kampung'];
                                    $query = mysql_query("SELECT domain.domain AS domain, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' GROUP BY domain.domain ORDER BY domain.iddomain ASC");
                                    $no = 1;
                                    while ($data = mysql_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['domain']; ?></td>
                                            <td><?php echo round($data['nilai'],1); ?></td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-box" style="padding-bottom:12%">
                                <center><p align="justify" style="float:right"><b>Untuk data lebih rinci, silahkan klik</b> <a class="btn btn-white btn-custom waves-effect" href="detil_domain.php?id=<?php $id = $_POST['kampung']; echo $id; ?>">disini</a></p></center>
                            </div>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function () {

    // Build the chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Presentase Perolehan Nilai'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Sebesar',
            colorByPoint: true,
            data: [{
                <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS nama, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' and rekapitulasi.iddomain = '1' GROUP BY domain.domain ");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo "name: '".$data['nama']."',";?>
                    <?php echo "y: ".($data['nilai']).",";?>
                <?php
                    $no++;
                }
                ?>
            }, {
                <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS nama, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' and rekapitulasi.iddomain = '2' GROUP BY domain.domain ");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo "name: '".$data['nama']."',";?>
                    <?php echo "y: ".($data['nilai']).",";?>
                <?php
                    $no++;
                }
                ?>
            }, {
                <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS nama, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' and rekapitulasi.iddomain = '3' GROUP BY domain.domain ");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo "name: '".$data['nama']."',";?>
                    <?php echo "y: ".($data['nilai']).",";?>
                <?php
                    $no++;
                }
                ?>
            }, {
                <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS nama, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' and rekapitulasi.iddomain = '4' GROUP BY domain.domain ");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo "name: '".$data['nama']."',";?>
                    <?php echo "y: ".($data['nilai']).",";?>
                <?php
                    $no++;
                }
                ?>
            }, {
                <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS nama, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' and rekapitulasi.iddomain = '5' GROUP BY domain.domain ");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo "name: '".$data['nama']."',";?>
                    <?php echo "y: ".($data['nilai']).",";?>
                <?php
                    $no++;
                }
                ?>
            }, {
                <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS nama, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' and rekapitulasi.iddomain = '6' GROUP BY domain.domain ");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo "name: '".$data['nama']."',";?>
                    <?php echo "y: ".($data['nilai']).",";?>
                <?php
                    $no++;
                }
                ?>
            }]
        }]
    });
});
</script>

<script type="text/javascript">


    Highcharts.chart('container2', {

        chart: {
            polar: true,
            type: 'line'
        },

        title: {
            text: 'Potensi Karakteristik',
            x: 0
        },

        pane: {
            size: '80%'
        },

        xAxis: {
            categories: ['Smart Economy', 'Smart Mobility', 'Smart Environment', 'Smart People','Smart Living', 'Smart Governance'],
            tickmarkPlacement: 'on',
            lineWidth: 0
        },

        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            min: 0
        },

        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>: {point.y:,.0f}</b><br/>'
        },

        legend: {
            align: 'bottom',
            verticalAlign: 'top',
            y: 30,
            layout: 'vertical'
        },

        colors: ['#4c5667', '#fb6d9d', '#5d9cec'],

        series: [{
            name: 'Nilai Maksimal',
            data: [
            <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS domain, MAX(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' GROUP BY domain.domain ORDER BY domain.iddomain ASC");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo $data['nilai'].",";?>
                <?php
                    $no++;
                }
                ?>
            ],
            pointPlacement: 'on'
        },{
            type: 'area',
            name: 'Rata-rata',
            data: [
            <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS domain, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' GROUP BY domain.domain ORDER BY domain.iddomain ASC");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo $data['nilai'].",";?>
                <?php
                    $no++;
                }
                ?>
            ],
            pointPlacement: 'on'
        }, {
            type: 'area',
            name: 'Nilai Minimal',
            data: [
            <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS domain, MIN(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' GROUP BY domain.domain ORDER BY domain.iddomain ASC");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo $data['nilai'].",";?>
                <?php
                    $no++;
                }
                ?>
            ],
            pointPlacement: 'on'
        }]

    });
</script>

<script type="text/javascript">

// Create the chart
Highcharts.chart('container3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Presentase Perolehan Nilai'
    },
    subtitle: {
        text: 'Klik kolom untuk melihat detil.'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total persentase'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span><br/>'
    },

    series: [{
        name: 'Domain',
        colorByPoint: true,
        data: [{
            <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS nama, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' and rekapitulasi.iddomain = '1' GROUP BY domain.domain ");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo "name: '".$data['nama']."',";?>
                    <?php echo "y: ".($data['nilai']).",";?>
                    <?php echo "drilldown: '".$data['nama']."'";?>
                <?php
                    $no++;
                }
                ?>
        }, {
            <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS nama, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' and rekapitulasi.iddomain = '2' GROUP BY domain.domain ");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo "name: '".$data['nama']."',";?>
                    <?php echo "y: ".$data['nilai'].",";?>
                    <?php echo "drilldown: '".$data['nama']."'";?>
                <?php
                    $no++;
                }
                ?>
        }, {
            <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS nama, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' and rekapitulasi.iddomain = '3' GROUP BY domain.domain ");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo "name: '".$data['nama']."',";?>
                    <?php echo "y: ".$data['nilai'].",";?>
                    <?php echo "drilldown: '".$data['nama']."'";?>
                <?php
                    $no++;
                }
                ?>
        }, {
            <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS nama, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' and rekapitulasi.iddomain = '4' GROUP BY domain.domain ");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo "name: '".$data['nama']."',";?>
                    <?php echo "y: ".$data['nilai'].",";?>
                    <?php echo "drilldown: '".$data['nama']."'";?>
                <?php
                    $no++;
                }
                ?>
        }, {
            <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS nama, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' and rekapitulasi.iddomain = '5' GROUP BY domain.domain ");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo "name: '".$data['nama']."',";?>
                    <?php echo "y: ".$data['nilai'].",";?>
                    <?php echo "drilldown: '".$data['nama']."'";?>
                <?php
                    $no++;
                }
                ?>
        }, {
            <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT domain.domain AS nama, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '$id' and rekapitulasi.iddomain = '6' GROUP BY domain.domain ");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <?php echo "name: '".$data['nama']."',";?>
                    <?php echo "y: ".$data['nilai'].",";?>
                    <?php echo "drilldown: '".$data['nama']."'";?>
                <?php
                    $no++;
                }
                ?>
        },]
    }],

    drilldown: {
        series: [
          {
            name: 'Smart Economy',
            id: 'Smart Economy',
            data: [
              <?php
              $id = $_POST['kampung'];
              $query = mysql_query("SELECT variabel.variabel AS variabel, rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '1' GROUP BY variabel.idvariabel ORDER BY rekapitulasi.iddomain ASC ");
              $no = 1;
              while ($data = mysql_fetch_array($query)) {
              ?>
                  [
                  <?php echo "'".$data['variabel']."'," ?>
                  <?php echo "".$data['nilai']."," ?>
                  ],
              <?php
                  $no++;
              }
              ?>
            ]
        }, {
            name: 'Smart Mobility',
            id: 'Smart Mobility',
            data: [
                <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT variabel.variabel AS variabel, rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '2' GROUP BY variabel.variabel ORDER BY rekapitulasi.iddomain ASC");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    [
                    <?php echo "'".$data['variabel']."'," ?>
                    <?php echo "".$data['nilai']."," ?>
                    ],
                <?php
                    $no++;
                }
                ?>
            ]
        }, {
            name: 'Smart Environment',
            id: 'Smart Environment',
            data: [
                <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT variabel.variabel AS variabel, rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '3' GROUP BY variabel.variabel ORDER BY rekapitulasi.iddomain ASC");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    [
                    <?php echo "'".$data['variabel']."'," ?>
                    <?php echo "".$data['nilai']."," ?>
                    ],
                <?php
                    $no++;
                }
                ?>
            ]
        }, {
            name: 'Smart People',
            id: 'Smart People',
            data: [
                <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT variabel.variabel AS variabel, rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '4' GROUP BY variabel.variabel ORDER BY rekapitulasi.iddomain ASC");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    [
                    <?php echo "'".$data['variabel']."'," ?>
                    <?php echo "".$data['nilai']."," ?>
                    ],
                <?php
                    $no++;
                }
                ?>
            ]
        }, {
            name: 'Smart Living',
            id: 'Smart Living',
            data: [
                <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT variabel.variabel AS variabel, rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '5' GROUP BY variabel.variabel ORDER BY rekapitulasi.iddomain ASC");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    [
                    <?php echo "'".$data['variabel']."'," ?>
                    <?php echo "".$data['nilai']."," ?>
                    ],
                <?php
                    $no++;
                }
                ?>
            ]
        }, {
            name: 'Smart Governance',
            id: 'Smart Governance',
            data: [
                <?php
                $id = $_POST['kampung'];
                $query = mysql_query("SELECT variabel.variabel AS variabel, rekapitulasi.nilai AS nilai FROM rekapitulasi JOIN variabel ON rekapitulasi.idvariabel = variabel.idvariabel WHERE rekapitulasi.idkampung = '$id' AND rekapitulasi.iddomain = '6' GROUP BY variabel.variabel ORDER BY rekapitulasi.iddomain ASC");
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    [
                    <?php echo "'".$data['variabel']."'," ?>
                    <?php echo "".$data['nilai']."," ?>
                    ],
                <?php
                    $no++;
                }
                ?>
            ]
        }]
    }
});
        </script>
