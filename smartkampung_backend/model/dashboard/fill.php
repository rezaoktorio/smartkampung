<div class="row">
    <div class="col-sm-12">
      <div class="card-box">
          <div class="row">
            <div class="col-sm-6">
                <div class="card-box">
                    <div id="container1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-sm-6">
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
        <div class="card-box widget-inline">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-inline-box text-center">
                        <h3><i class="text-primary md md-account-balance"></i>
                        <?php
                          $query = mysql_query("SELECT COUNT(DISTINCT(idkampung)) AS total FROM rekapitulasi");
                          $no = 1;
                          while ($data = mysql_fetch_array($query)) {
                          ?>

                          <b data-plugin="counterup"><?php echo $data['total']; ?></b></h3>

                          <?php
                              $no++;
                          }
                          ?>
                        <h4 class="text-muted">Total Kampung</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="widget-inline-box text-center">
                        <h3><i class="text-custom md md-book"></i><?php
                          $query = mysql_query("SELECT COUNT(DISTINCT(iddomain)) AS total FROM rekapitulasi");
                          $no = 1;
                          while ($data = mysql_fetch_array($query)) {
                          ?>

                          <b data-plugin="counterup"><?php echo $data['total']; ?></b></h3>

                          <?php
                              $no++;
                          }
                          ?>
                        <h4 class="text-muted">Total Domain</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="widget-inline-box text-center b-0">
                        <h3><i class="text-pink md md-assignment"></i><?php
                          $query = mysql_query("SELECT COUNT(DISTINCT(idindikator)) AS total FROM rekapitulasi");
                          $no = 1;
                          while ($data = mysql_fetch_array($query)) {
                          ?>

                          <b data-plugin="counterup"><?php echo $data['total']; ?></b></h3>

                          <?php
                              $no++;
                          }
                          ?>
                        <h4 class="text-muted">Total Indikator</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="widget-inline-box text-center">
                        <h3><i class="text-purple md md-description"></i><?php
                          $query = mysql_query("SELECT COUNT(DISTINCT(idvariabel)) AS total FROM rekapitulasi");
                          $no = 1;
                          while ($data = mysql_fetch_array($query)) {
                          ?>

                          <b data-plugin="counterup"><?php echo $data['total']; ?></b></h3>

                          <?php
                              $no++;
                          }
                          ?>
                        <h4 class="text-muted">Total Variabel</h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    Highcharts.chart('container1', {

        chart: {
            polar: true,
            type: 'line'
        },

        title: {
            text: 'Karakteristik Kampung Margo Rukun',
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
                $query = mysql_query("SELECT domain.domain AS domain, MAX(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '1' GROUP BY domain.domain ORDER BY domain.iddomain ASC ");
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
                $query = mysql_query("SELECT domain.domain AS domain, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '1' GROUP BY domain.domain ORDER BY domain.iddomain ASC");
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
                $query = mysql_query("SELECT domain.domain AS domain, MIN(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '1' GROUP BY domain.domain ORDER BY domain.iddomain ASC");
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


    Highcharts.chart('container2', {

        chart: {
            polar: true,
            type: 'line'
        },

        title: {
            text: 'Karakteristik Kampung Lawas Maspati',
            x: 0
        },

        pane: {
            size: '80%'
        },

        xAxis: {
            categories: ['Smart Living', 'Smart People', 'Smart Governance', 'Smart Environment',
                    'Smart Economy', 'Smart Mobility'],
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
                $query = mysql_query("SELECT domain.domain AS domain, MAX(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '2' GROUP BY domain.domain ORDER BY domain.iddomain ASC");
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
                $query = mysql_query("SELECT domain.domain AS domain, AVG(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '2' GROUP BY domain.domain ORDER BY domain.iddomain ASC");
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
                $query = mysql_query("SELECT domain.domain AS domain, MIN(rekapitulasi.nilai) AS nilai FROM rekapitulasi JOIN domain ON rekapitulasi.iddomain = domain.iddomain WHERE rekapitulasi.idkampung = '2' GROUP BY domain.domain ORDER BY domain.iddomain ASC");
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
