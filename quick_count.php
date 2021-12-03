<?php

include "inc/koneksi.php";
header("Refresh: 60");

?>

<?php
//BEM FTI
$bem_hitung = "SELECT COUNT(id_vote) from tb_vote  where id_calon='1' and level='bemfti'";
$bem_hit = mysqli_query($koneksi, $bem_hitung);
$bem = mysqli_fetch_array($bem_hit);
$bem_paslon1 = (int)$bem[0];
$bem_hitung2 = "SELECT COUNT(id_vote) from tb_vote  where id_calon='2' and level='bemfti'";
$bem_hit2 = mysqli_query($koneksi, $bem_hitung2);
$bem2 = mysqli_fetch_array($bem_hit2);
$bem_paslon2 = (int)$bem2[0];

//HMP-TI
//1
$hmpti_hitung = "SELECT COUNT(id_vote) from tb_vote  where id_calon='1' and level='hmpti'";
$hmpti_hit = mysqli_query($koneksi, $hmpti_hitung);
$hmpti = mysqli_fetch_array($hmpti_hit);
$hmpti_paslon1 = (int)$hmpti[0];
//2
$hmpti_hitung2 = "SELECT COUNT(id_vote) from tb_vote  where id_calon='2' and level='hmpti'";
$hmpti_hit2 = mysqli_query($koneksi, $hmpti_hitung2);
$hmpti2 = mysqli_fetch_array($hmpti_hit2);
$hmpti_paslon2 = (int)$hmpti2[0];
//3
$hmpti_hitung3 = "SELECT COUNT(id_vote) from tb_vote  where id_calon='3' and level='hmpti'";
$hmpti_hit3 = mysqli_query($koneksi, $hmpti_hitung3);
$hmpti3 = mysqli_fetch_array($hmpti_hit3);
$hmpti_paslon3 = (int)$hmpti3[0];

//HMPSI
$hmpsi_hitung = "SELECT COUNT(id_vote) from tb_vote  where id_calon='1' and level='hmpsi'";
$hmpsi_hit = mysqli_query($koneksi, $hmpsi_hitung);
$hmpsi = mysqli_fetch_array($hmpsi_hit);
$hmpsi_paslon1 = (int)$hmpsi[0];
//2
$hmpsi_hitung2 = "SELECT COUNT(id_vote) from tb_vote  where id_calon='2' and level='hmpsi'";
$hmpsi_hit2 = mysqli_query($koneksi, $hmpsi_hitung2);
$hmpsi2 = mysqli_fetch_array($hmpsi_hit2);
$hmpsi_paslon2 = (int)$hmpsi2[0];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quick Count</title>
    <link rel="icon" href="dist/img/LOGO KPU FTI-01.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="description" content="chart created using amCharts live editor" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- amCharts custom font -->
    <link href='https://fonts.googleapis.com/css?family=Covered+By+Your+Grace' rel='stylesheet' type='text/css'>

    <!-- amCharts javascript sources -->
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/pie.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/chalk.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- amCharts javascript code -->
    <script type="text/javascript">
        AmCharts.makeChart("chartBem", {
            "type": "pie",
            "angle": 10,
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "titleField": "category",
            "valueField": "column-1",
            "fontSize": 35,
            "theme": "chalk",
            "allLabels": [],
            "balloon": {
                "animationDuration": 0.04,
                "fadeOutDuration": 0.08
            },
            "legend": {
                "enabled": true,
                "align": "center",
                "bottom": 0,
                "fontSize": 30,
                "labelWidth": 0,
                "markerType": "circle",
                "spacing": 33,
                "valueText": "",
                "valueWidth": 11
            },
            "titles": [],
            "dataProvider": [{
                    "category": "Paslon 1",
                    "column-1": <?php echo $bem_paslon1 ?>
                },
                {
                    "category": "Paslon 2",
                    "column-1": <?php echo $bem_paslon2 ?>
                },
            ]
        });
    </script>
    <style>
        .header {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 50px;
            text-align: center;
        }

        hr {
            border: 2px solid black;
            border-radius: 2px;
            margin-top: 10px;
        }

        .head {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 20px;
            text-align: center;
        }

        body {
            background-color: rgb(245, 245, 245);
        }
    </style>
    <script type="text/javascript">
        AmCharts.makeChart("chartTi", {
            "type": "pie",
            "angle": 10,
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "titleField": "category",
            "valueField": "column-1",
            "fontSize": 35,
            "theme": "chalk",
            "allLabels": [],
            "balloon": {
                "animationDuration": 0.04,
                "fadeOutDuration": 0.08
            },
            "legend": {
                "enabled": true,
                "align": "center",
                "bottom": 0,
                "fontSize": 30,
                "labelWidth": 0,
                "markerType": "circle",
                "spacing": 33,
                "valueText": "",
                "valueWidth": 11
            },
            "titles": [],
            "dataProvider": [{
                    "category": "Paslon 1",
                    "column-1": <?php echo $hmpti_paslon1 ?>
                },
                {
                    "category": "Paslon 2",
                    "column-1": <?php echo $hmpti_paslon2 ?>
                },
                {
                    "category": "Paslon 3",
                    "column-1": <?php echo $hmpti_paslon3 ?>
                }
            ]
        });
    </script>
    <script type="text/javascript">
        AmCharts.makeChart("chartSi", {
            "type": "pie",
            "angle": 10,
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "titleField": "category",
            "valueField": "column-1",
            "fontSize": 35,
            "theme": "chalk",
            "allLabels": [],
            "balloon": {
                "animationDuration": 0.04,
                "fadeOutDuration": 0.08
            },
            "legend": {
                "enabled": true,
                "align": "center",
                "bottom": 0,
                "fontSize": 30,
                "labelWidth": 0,
                "markerType": "circle",
                "spacing": 33,
                "valueText": "",
                "valueWidth": 11
            },
            "titles": [],
            "dataProvider": [{
                    "category": "Paslon 1",
                    "column-1": <?php echo $hmpsi_paslon1 ?>
                },
                {
                    "category": "Paslon 2",
                    "column-1": <?php echo $hmpsi_paslon2 ?>
                }
            ]
        });
    </script>
</head>

<body>


    <div class="head">
        <img src="dist/img/LOGO KPU FTI-01.png" width=120px />
        <h1>KPU FTI UNISKA QUICK COUNT</h1>
        <p id="time"></p>
        <p> <strong>*Data diupdate setiap 1 menit</strong> </p>
    </div>
    <hr>

    <h1 class="header">BEM FTI</h1>
    <div id="chartBem" style="width: 100%; height: 600px; background-color: #33015e;"></div>
    <hr>
    <h1 class="header">HMP-TI</h1>
    <div id="chartTi" style="width: 100%; height: 600px; background-color: #001a68;"></div>
    <hr>

    <h1 class="header">HMP-SI</h1>

    <div id="chartSi" style="width: 100%; height: 600px; background-color: #0029a5;"></div>
    <hr>
</body>
<script type="text/javascript">
    var timestamp = '<?= time(); ?>';

    function updateTime() {
        $('#time').html(Date(timestamp));
        timestamp++;
    }
    $(function() {
        setInterval(updateTime, 1000);
    });
</script>

</html>