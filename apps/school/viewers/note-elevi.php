<!DOCTYPE html>
<html lang="ro">

<title>Note elevi</title>

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
    </style>

</head>

<body>

    <?php include("_parts/menu-" .  $_SESSION['tipContStr'] . ".php"); ?>

    <div class="app-wrapper">
        <h1 class="font-weight-bold text-center p-2 pt-5 pb-5">Note elevi</h1>

        <div class="container mt-5 d-flex justify-content-center">
            <div class="user-info w-100  d-flex justify-content-center">
                <select class="form-control col-trans" id="field-select-clasa">
                    <option value="0">-- Selectează clasa --</option>
                    <?php foreach ($aniLitera as $idClasa => $denumireClasa) { ?>
                        <option class="text-center" value="<?php echo $idClasa; ?>" <?php if (isset($_GET['clasa']) && $_GET['clasa'] == $idClasa) echo 'selected'; ?>>
                            <?php echo $denumireClasa; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="container mt-3 d-flex justify-content-center">
            <div class="user-info w-100  d-flex justify-content-center">
                <select class="form-control col-trans" id="field-select-materie">
                    <option value="0">-- Selectează materie --</option>
                    <?php foreach ($listaMaterii as $idMaterie => $denumireMaterie) { ?>
                        <option value="<?php echo $idMaterie; ?>" <?php if (isset($_GET['materie']) && $_GET['materie'] == $idMaterie) echo 'selected'; ?>>
                            <?php echo $denumireMaterie; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>


        <div class="container w-100 h-100 my-5" id="container-elevi">


            <?php if (empty($listaNote[0])) { ?>

                <div class="alert alert-warning text-center">
                    Selectează o clasă și o materie pentru a accesa pagina notelor!
                </div>

            <?php } ?>

            <?php if (!empty($listaNote[0])) { ?>

                <?php foreach ($listaNote[0] as $elevId => $elev) { ?>

                    <div>
                        <div class="caret col-bl text-light w-100 px-3 pb-2 pt-2 mt-2 rounded d-flex justify-content-between align-items-center">
                            <div><?php echo $elev['nume']; ?></div>
                            <div>
                                <span class="badge badge-secondary p-2 border border-light">
                                    <?php echo count($elev['note']); ?> note
                                </span>
                            </div>
                        </div>

                        <!-- collapse -->
                        <div class="nested border border-top-0 rounded-bottom">

                            <div class="row py-3 d-flex justify-content-center align-items-center">
                                <div class="col-md-6 p-1 d-flex justify-content-center">
                                    <div id="chart_div_<?php echo $elevId; ?>"></div>
                                </div>
                                <div class="col-md-6 p-1 d-flex justify-content-center">
                                    <div class="bg-light p-2 rounded w-75 ">
                                        <div class="pt-2">Note: </div>
                                        <div class=" row pt-2 pl-1 pb-4 d-flex justify-content-between">

                                            <?php foreach ($elev['note'] as $nota) { ?>

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


            <?php if (!empty($listaNote[0])) { ?>

                <div class="container mt-3 d-flex justify-content-end">
                    <btn class="btn-sm btn-success mt-5 px-5 py-2 font-weight-light" id="btn-add-nota" id-elev="<?php echo $elevId; ?>" style="cursor: pointer; font-size: 0.9rem" data-toggle="modal" data-target="#modal-add-nota"><i class="fa fa-plus"></i> Adaugă notă</btn>
                </div>

            <?php } ?>


        </div>
    </div>


    <div id="modal-add-nota" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-plus"></i> Adaugă o notă</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-add-nota" action="" method="post">
                        <div class="row pad-lr-1">
                            <div class="col-md-6 pad-2">
                                <div class="form-group">
                                    <label class="control-label" for="field-add-elev">Elev:</label>
                                    <select class="form-control" id="field-add-elev" name="field-add-elev">
                                        <option value="">--Selectează un elev--</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 pad-2">
                                <div class="form-group">
                                    <label for="field-add-nota">Nota:</label>
                                    <input type="number" id="field-add-nota" name="field-add-nota" class="form-control" placeholder="Nota">
                                </div>
                            </div>
                            <div class="col-md-6 pad-2">
                                <div class="form-group">
                                    <label for="field-add-data">Data:</label>
                                    <input type="date" id="field-add-data" name="field-add-data" class="form-control" placeholder="Data">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                            <button type="submit" id="btn-adauga-elev" class="btn btn-success">Adaugă</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("_parts/footer.php"); ?>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
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

            <?php if (!empty($listaNote[0])) { ?>

                <?php foreach ($listaNote[0] as $elevId => $elev) { ?>

                    var data<?php echo $elevId; ?> = google.visualization.arrayToDataTable([
                        ['Data', 'Nota'],
                        <?php foreach ($elev['note'] as $nota) { ?>['<?php echo date("d/m", strtotime($nota['data'])); ?>', <?php echo $nota['nota']; ?>],
                        <?php } ?>
                    ]);

                    var container<?php echo $elevId; ?> = document.getElementById('chart_div_<?php echo $elevId; ?>');
                    container<?php echo $elevId; ?>.style.display = 'block';
                    var chart<?php echo $elevId; ?> = new google.visualization.AreaChart(container<?php echo $elevId; ?>);
                    chart<?php echo $elevId; ?>.draw(data<?php echo $elevId; ?>, options);

                <?php } ?>

            <?php } ?>

        }

        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }

        <?php if (!empty($listaNote[0])) { ?>

            //populare elevi in modala
            $.post("<?php echo BASE_URL; ?>/data?action=getElevi", {
                clasaSelectata: <?php echo $_GET['clasa'] ?>
            }, function(response) {
                $.each(response, function(key, valoare) {
                    $('#field-add-elev').append(`<option value="${valoare['idUser']}">${valoare['nume']} </option>`);
                });

            });

            //validare date
            function validareLipsaValoare(field) {
                $(field).removeClass('is-valid is-invalid');
                let val = $(field).val();

                if (val === '') {

                    $(field).addClass('is-invalid');

                    return false;
                }

                $(field).addClass('is-valid');

                return true;
            }

            function validareNota(field) {
                $(field).removeClass('is-valid is-invalid');
                let val = $(field).val();

                if (val < 1 || val > 10) {

                    $(field).addClass('is-invalid');

                    return false;
                }

                $(field).addClass('is-valid');

                return true;
            }

            $("#field-add-elev").change(function(e) {
                validareLipsaValoare("#field-add-elev");
            });
            $("#field-add-nota").change(function(e) {
                validareNota("#field-add-nota");
            });
            $("#field-add-data").change(function(e) {
                validareLipsaValoare("#field-add-data");
            });

            $("#btn-adauga-elev").click(function(e) {
                e.preventDefault();

                // preluam datele din form
                let fieldAddElev = $("#field-add-elev").val();
                let fieldAddNota = $("#field-add-nota").val();
                let fieldAddData = $("#field-add-data").val();
                let idMaterie = <?php echo $_GET['materie'] ?>;
                let idProfesor = <?php echo $_SESSION['userId']?>;


                // validari input
                var errDetected = false;

                if (validareLipsaValoare("#field-add-elev") == false)
                validareLipsaValoare = true;

                if (validareNota("#field-add-nota") == false)
                    errDetected = true;

                if (validareLipsaValoare("#field-add-data") == false)
                    errDetected = true;

                if (errDetected == false) {

                    // trimitem
                    $.post("<?php echo BASE_URL; ?>/data?action=addNota", {
                        elev: fieldAddElev,
                        nota: fieldAddNota,
                        data: fieldAddData,
                        idMaterie: idMaterie,
                        idProfesor: idProfesor
                    }, function(response) {
                        if (response.trim() == 'success') {

                            // resetam inputul din formular
                            $("#form-add-nota").trigger('reset');

                            // eliminam tipul de valididate al campurilor
                            $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                            // afisam mesaj de ok
                            alert("S-a adaugat cu succes nota introdusa!");

                        } else if (response.trim() == "exista") {
                            alert("A fost deja adaugata o nota in aceasta zi!");
                        } else {

                            // afisam mesaj de eroare
                            alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                        }

                    });
                }

            });


        <?php } ?>


        $("#field-select-clasa").change(function(e) {

            clasa = $(this).val();
            materie = $("#field-select-materie").val()

            if (clasa != '0' && materie != '0') {
                window.location.href = "<?php echo BASE_URL; ?>/profesor/note?clasa=" + clasa + "&materie=" + materie;
            }

        });

        $("#field-select-materie").change(function(e) {

            materie = $(this).val();
            clasa = $("#field-select-clasa").val();

            if (materie == '0' || clasa == '0') {
                window.location.href = "<?php echo BASE_URL; ?>/profesor/note";
            }
            if (clasa != '0' && materie != '0') {
                window.location.href = "<?php echo BASE_URL; ?>/profesor/note?clasa=" + clasa + "&materie=" + materie;
            }

        });
    </script>


</body>

</html>