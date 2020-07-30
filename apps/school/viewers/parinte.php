<!DOCTYPE html>
<html lang="ro">

<title>Situație note</title>

<head>

    <?php include("_parts/header.php"); ?>


    <style>
        .caret {
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .caret::before {
            font-family: "FontAwesome";
            content: "\f0a9";
            color: #fff;
            display: inline-block;
            margin-right: 6px;
        }

        .caret-down::before {
            -ms-transform: rotate(90deg);
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
            transition: all 0.4s ease;
        }


        .nested {
            display: none;
        }

        .active {
            display: block;
            padding-left: 0;
        }

        td,
        th {
            border: 1px solid #bababa;
            overflow: hidden;
        }

        /* spin donut */
        span#procent {
            display: block;
            position: absolute;
            left: 50%;
            top: 50%;
            font-size: 2.5rem;
            transform: translate(-50%, -50%);
            color: #3949AB;
        }

        .canvas-wrap {
            position: relative;
            width: 300px;
            height: 300px;
        }
    </style>

</head>

<body>

    <?php include("_parts/menu-" .  $_SESSION['tipContStr'] . ".php"); ?>


    <div class="app-wrapper">
        <h1 class="font-weight-bold text-center p-2 pt-5">Notele lui <?php echo $dateCopil['nume'] ?></h1>

        <div class="container w-75 d-flex justify-content-center">
            <div class="row d-flex w-75 justify-content-center align-items-center">
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="canvas-wrap">
                        <div>
                            <canvas id="canvas" width="300" height="300"></canvas>
                            <span id="procent"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 d-flex justify-content-center">
                    Susține-ți copilul să obțină nota perfectă, pentru a avea un scor perfect. Acesta este scorul ce indică media generală a notelor.
                </div>
            </div>
        </div>



        <div class="container w-100 h-100 my-5">
            <?php if (!empty($noteElev[0])) { ?>

                <?php foreach ($noteElev[0] as $materieId => $materie) { ?>

                    <div>
                        <div class="caret col-bl text-light w-100 px-3 pb-2 pt-2 mt-2 rounded d-flex justify-content-between align-items-center">
                            <div><?php echo $materie['denumire']; ?></div>
                            <div>
                                <span class="badge badge-secondary p-2 border border-light">
                                    <?php echo count($materie['note']); ?> note
                                </span>
                            </div>
                        </div>

                        <!-- collapse -->
                        <div class="nested border border-top-0 rounded-bottom">

                            <div class="row py-3 d-flex justify-content-center align-items-center">
                                <div class="col-md-6 p-1 d-flex justify-content-center">
                                    <div id="chart_div_<?php echo $materieId; ?>"></div>
                                </div>
                                <div class="col-md-6 p-1 d-flex justify-content-center">
                                    <div class="bg-light p-2 rounded w-75 ">
                                        <div class="pt-2">Note: </div>
                                        <div class=" row pt-2 pl-1 pb-4 d-flex justify-content-between">

                                            <?php foreach ($materie['note'] as $nota) { ?>

                                                <div class="px-4">
                                                    <i class="fa fa-calendar"></i> <?php echo date("d/m", strtotime($nota['data'])); ?>:
                                                    <span class="badge <?php if ($nota['nota'] >= 8) echo 'badge-success';
                                                                        if ($nota['nota'] < 8 && $nota['nota'] >= 5) echo 'badge-warning';
                                                                        if ($nota['nota'] < 5) echo 'badge-danger'; ?>">
                                                        <?php echo $nota['nota']; ?></span>
                                                </div>

                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            <?php } ?>

        </div>

    </div>

    <?php include("_parts/footer-parinte.php"); ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            var can = document.getElementById('canvas'),
                spanProcent = document.getElementById('procent'),
                c = can.getContext('2d');


            var suma = 0;
            var nrNote = 0;
            <?php foreach ($noteElev[0] as $materieId => $materie) { ?>
                <?php if (!empty($materie['note'])) {
                    foreach ($materie['note'] as $nota) { ?>
                        suma += <?php echo $nota['nota'] ?>;
                        nrNote++;
            <?php }
                }
            } ?>



            var posX = can.width / 2,
                posY = can.height / 2,
                fps = 1000 / 150,
                procent = 0,
                oneProcent = 360 / 100,
                result = oneProcent * ((suma * 100) / (nrNote * 10));

            c.lineCap = 'round';
            arcMove();

            function arcMove() {
                var deegres = 0;
                var acrInterval = setInterval(function() {
                    deegres += 1;
                    c.clearRect(0, 0, can.width, can.height);
                    procent = deegres / oneProcent;

                    spanProcent.innerHTML = procent.toFixed();

                    c.beginPath();
                    c.arc(posX, posY, 70, (Math.PI / 180) * 270, (Math.PI / 180) * (270 + 360));
                    c.strokeStyle = '#8caff5';
                    c.lineWidth = '15';
                    c.stroke();

                    c.beginPath();
                    c.strokeStyle = '#3949AB';
                    c.lineWidth = '14';
                    c.arc(posX, posY, 70, (Math.PI / 180) * 270, (Math.PI / 180) * (270 + deegres));
                    c.stroke();
                    if (deegres >= result) clearInterval(acrInterval);
                }, fps);

            }


        }

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var options = {
                title: 'Grafic evoluție',
                vAxis: {
                    minValue: 0,

                }
            };

            <?php if (!empty($noteElev[0])) { ?>

                <?php foreach ($noteElev[0] as $materieId => $materie) { ?>
                    <?php if (!empty($materie['note'])) { ?>
                        var data<?php echo $materieId; ?> = google.visualization.arrayToDataTable([
                            ['Data', 'Nota'],

                            <?php foreach ($materie['note'] as $nota) { ?>['<?php echo date("d/m", strtotime($nota['data'])); ?>', <?php echo $nota['nota']; ?>],
                            <?php } ?>
                        ]);

                        var container<?php echo $materieId; ?> = document.getElementById('chart_div_<?php echo $materieId; ?>');
                        container<?php echo $materieId; ?>.style.display = 'block';
                        var chart<?php echo $materieId; ?> = new google.visualization.AreaChart(container<?php echo $materieId; ?>);
                        chart<?php echo $materieId; ?>.draw(data<?php echo $materieId; ?>, options);

            <?php }
                }
            } ?>


        }

        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
    </script>


</body>