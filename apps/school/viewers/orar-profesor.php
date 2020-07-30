<!DOCTYPE html>
<html lang="ro">

<title>Orar profesori</title>

<head>

    <?php include("_parts/header.php"); ?>

</head>

<body>

    <?php include("_parts/menu-" .  $_SESSION['tipContStr'] . ".php"); ?>

    <div class="app-wrapper container-orar">
        <h1 class="font-weight-bold text-center p-2 pt-4">Orar prof. <?php echo $numeProfesor ?></h1>
        <div class="container pt-3 pb-3">

            <div class="row d-flex justify-content-around">

                <div class="col-sm-3 m-3 p-0">
                    <div class="tabela-orar">
                        <div class="col-orange p-0 tab-orar-head">
                            <div class="pt-2 pl-3">
                                <h3 class="font-weight-bold m-0">Luni<h3>
                            </div>
                            <hr class="m-0 bg-secondary">
                        </div>

                        <ul class="p-0" id="ul-luni">

                            <!-- <li class="li-materie px-3">
                                <div class="row p-2">
                                    <div class="col-3">
                                        10:30
                                    </div>
                                    <div class="col-6 p-0 text-center">
                                        Limba
                                    </div>
                                    <div class="col-3 text-center">
                                        12C
                                    </div>
                                </div>
                            </li> -->

                        </ul>

                        <?php if ($idProfesor == $_SESSION['userId']) { ?>

                            <div class="d-flex justify-content-center align-items-end pb-3" style="bottom: 1px">
                                <button class="btn btn-success bg-light text-success border border-success rounded" id="btnLuni">
                                    <i class="fa fa-plus"></i>
                                    <span>Adaugă activitate</span>
                                </button>
                            </div>

                        <?php } ?>
                    </div>

                </div>

                <div class="col-sm-3 m-3 p-0">
                    <div class="tabela-orar">
                        <div class="col-orange p-0 tab-orar-head">
                            <div class="pt-2 pl-3">
                                <h3 class="font-weight-bold m-0">Marți<h3>
                            </div>
                            <hr class="m-0 bg-secondary">
                        </div>

                        <ul class="p-0" id="ul-marti">

                        </ul>
                        <?php if ($idProfesor == $_SESSION['userId']) { ?>

                            <div class="d-flex justify-content-center align-items-end pb-3" style="bottom: 1px">
                                <button class="btn btn-success bg-light text-success border border-success rounded" id="btnMarti">
                                    <i class="fa fa-plus"></i>
                                    <span>Adaugă activitate</span>
                                </button>
                            </div>

                        <?php } ?>
                    </div>
                </div>

                <div class="col-sm-3 m-3 p-0">
                    <div class="tabela-orar">
                        <div class="col-orange p-0 tab-orar-head">
                            <div class="pt-2 pl-3">
                                <h3 class="font-weight-bold m-0">Miercuri<h3>
                            </div>
                            <hr class="m-0 bg-secondary">
                        </div>

                        <ul class="p-0" id="ul-miercuri">

                        </ul>
                        <?php if ($idProfesor == $_SESSION['userId']) { ?>

                            <div class="d-flex justify-content-center align-items-end pb-3" style="bottom: 1px">
                                <button class="btn btn-success bg-light text-success border border-success rounded" id="btnMiercuri">
                                    <i class="fa fa-plus"></i>
                                    <span>Adaugă activitate</span>
                                </button>
                            </div>

                        <?php } ?>
                    </div>
                </div>

            </div>

            <div class="row d-flex justify-content-around py-5">

                <div class="col-sm-3 m-3 p-0">
                    <div class="tabela-orar">
                        <div class="col-orange p-0 tab-orar-head">
                            <div class="pt-2 pl-3">
                                <h3 class="font-weight-bold m-0">Joi<h3>
                            </div>
                            <hr class="m-0 bg-secondary">
                        </div>

                        <ul class="p-0" id="ul-joi">

                        </ul>
                        <?php if ($idProfesor == $_SESSION['userId']) { ?>

                            <div class="d-flex justify-content-center align-items-end pb-3" style="bottom: 1px">
                                <button class="btn btn-success bg-light text-success border border-success rounded" id="btnJoi">
                                    <i class="fa fa-plus"></i>
                                    <span>Adaugă activitate</span>
                                </button>
                            </div>

                        <?php } ?>
                    </div>
                </div>

                <div class="col-sm-3 m-3 p-0">
                    <div class="tabela-orar">
                        <div class="col-orange p-0 tab-orar-head">
                            <div class="pt-2 pl-3">
                                <h3 class="font-weight-bold m-0">Vineri<h3>
                            </div>
                            <hr class="m-0 bg-secondary">
                        </div>

                        <ul class="p-0" id="ul-vineri">

                        </ul>
                        <?php if ($idProfesor == $_SESSION['userId']) { ?>

                            <div class="d-flex justify-content-center align-items-end pb-3" style="bottom: 1px">
                                <button class="btn btn-success bg-light text-success border border-success rounded" id="btnVineri">
                                    <i class="fa fa-plus"></i>
                                    <span>Adaugă activitate</span>
                                </button>
                            </div>

                        <?php } ?>
                    </div>
                </div>

                <div class="col-sm-3 m-3 p-0">
                </div>

                <div class="col-sm-3">
                </div>

            </div>


            <?php if ($idProfesor == $_SESSION['userId']) { ?>

                <div class="container bg-light rounded py-3 px-4 mb-5">
                    <form id="form-add-ora" action="" method="post">

                        <div class="row" id="addOra">
                            <div class="col-md-3 pt-3">
                                <label style="margin-bottom:5px;">Ziua:</label>
                                <select name="field-ziua" class="form-control" id="field-ziua">
                                    <option value="">-- Alege ziua --</option>
                                    <option value="1">Luni</option>
                                    <option value="2">Marți</option>
                                    <option value="3">Miercuri</option>
                                    <option value="4">Joi</option>
                                    <option value="5">Vineri</option>
                                </select>
                            </div>

                            <div class="col-md-3 pt-3">
                                <label style="margin-bottom:5px;">Clasa:</label>

                                <select name="field-clasa" class="form-control" id="field-clasa">
                                    <option value="">-- Alege clasa --</option>
                                    <?php foreach ($aniLitera as $idClasa => $denumireClasa) { ?>
                                        <option value="<?php echo $idClasa; ?>"><?php echo $denumireClasa; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-3 pt-3">
                                <label style="margin-bottom:5px;">Materia:</label>

                                <select name="field-materia" class="form-control" id="field-materia">
                                    <option value="">-- Alege materia --</option>

                                </select>
                            </div>

                            <div class="col-md-3 pt-3">
                                <label style="margin-bottom:5px;">Ora de intrare:</label>
                                <input type="time" class="form-control" id="field-ora">
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                <div>
                                    <button type="submit" name="btn-add-ora" id="btn-add-ora" class="btn btn-success">Adaugă în orar</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            <?php } ?>




        </div>
    </div>

    <?php include("_parts/footer.php"); ?>

    <script>
        var luni = 0;
        var marti = 0;
        var miercuri = 0;
        var joi = 0;
        var vineri = 0;

        function getOre() {
            $idProfesor = <?php echo $idProfesor ?>;

            $.post("<?php echo BASE_URL; ?>/data?action=getOreProfesor", {
                idProfesor: $idProfesor
            }, function(response) {

                $('#ul-luni').empty();
                $('#ul-marti').empty();
                $('#ul-miercuri').empty();
                $('#ul-joi').empty();
                $('#ul-vineri').empty();

                $.each(response, function(key, valoare) {

                    switch (valoare['zi']) {
                        case 1:
                            $('#ul-luni').append(`<li class="li-materie px-3">
                        <div class="row p-2">
                            <div class="col-3">
                                ${valoare['ora']}
                            </div>
                            <div class="col-6 p-0 text-center">
                            ${valoare['materie']}
                            </div>
                            <div class="col-3 text-center">
                                ${valoare['clasa']}
                            </div>
                        </div>
                    </li>`);

                            luni++;

                            break;

                        case 2:
                            $('#ul-marti').append(`<li class="li-materie px-3">
                        <div class="row p-2">
                            <div class="col-3">
                                ${valoare['ora']}
                            </div>
                            <div class="col-6 p-0 text-center">
                            ${valoare['materie']}
                            </div>
                            <div class="col-3 text-center">
                                ${valoare['clasa']}
                            </div>
                        </div>
                    </li>`);

                            marti++;

                            break;

                        case 3:
                            $('#ul-miercuri').append(`<li class="li-materie px-3">
                        <div class="row p-2">
                            <div class="col-3">
                                ${valoare['ora']}
                            </div>
                            <div class="col-6 p-0 text-center">
                            ${valoare['materie']}
                            </div>
                            <div class="col-3 text-center">
                                ${valoare['clasa']}
                            </div>
                        </div>
                    </li>`);

                            miercuri++;

                            break;

                        case 4:
                            $('#ul-joi').append(`<li class="li-materie px-3">
                        <div class="row p-2">
                            <div class="col-3">
                                ${valoare['ora']}
                            </div>
                            <div class="col-6 p-0 text-center">
                            ${valoare['materie']}
                            </div>
                            <div class="col-3 text-center">
                                ${valoare['clasa']}
                            </div>
                        </div>
                    </li>`);

                            joi++;

                            break;

                        case 5:
                            $('#ul-vineri').append(`<li class="li-materie px-3">
                        <div class="row p-2">
                            <div class="col-3">
                                ${valoare['ora']}
                            </div>
                            <div class="col-6 p-0 text-center">
                            ${valoare['materie']}
                            </div>
                            <div class="col-3 text-center">
                                ${valoare['clasa']}
                            </div>
                        </div>
                    </li>`);

                            vineri++;

                            break;
                    }
                });
                if (luni == 0) {
                    $('#ul-luni').append(` <li class="li-materie px-3 text-center">
                                <div class="p-2">Zi liberă</div>
                            </li>`);

                }
                if (marti == 0) {
                    $('#ul-marti').append(` <li class="li-materie px-3 text-center">
                                <div class="p-2">Zi liberă</div>
                            </li>`);
                }
                if (miercuri == 0) {
                    $('#ul-miercuri').append(` <li class="li-materie px-3 text-center">
                                <div class="p-2">Zi liberă</div>
                            </li>`);
                }
                if (joi == 0) {
                    $('#ul-joi').append(` <li class="li-materie px-3 text-center">
                                <div class="p-2">Zi liberă</div>
                            </li>`);
                }
                if (vineri == 0) {
                    $('#ul-vineri').append(` <li class="li-materie px-3 text-center">
                                <div class="p-2">Zi liberă</div>
                            </li>`);
                }
            });
        }

        getOre();

        $("#btnLuni").click(function() {
            $('html,body').animate({
                    scrollTop: $("#addOra").offset().top - $("#addOra").height()
                },
                'fast');

            $("#field-ziua").val(1);
        });

        $("#btnMarti").click(function() {
            $('html,body').animate({
                    scrollTop: $("#addOra").offset().top - $("#addOra").height()
                },
                'fast');

            $("#field-ziua").val(2);
        });

        $("#btnMiercuri").click(function() {
            $('html,body').animate({
                    scrollTop: $("#addOra").offset().top - $("#addOra").height()
                },
                'fast');

            $("#field-ziua").val(3);
        });

        $("#btnJoi").click(function() {
            $('html,body').animate({
                    scrollTop: $("#addOra").offset().top - $("#addOra").height()
                },
                'fast');

            $("#field-ziua").val(4);
        });

        $("#btnVineri").click(function() {
            $('html,body').animate({
                    scrollTop: $("#addOra").offset().top - $("#addOra").height()
                },
                'fast');

            $("#field-ziua").val(5);
        });

        //extragere materii profesor
        $("#field-clasa").change(function(e) {

            $('#field-materia').empty();
            let profesorSelectat = <?php echo $idProfesor ?>

            $.post("<?php echo BASE_URL; ?>/dataProf?action=getMateriiProfesor", {
                profesorSelectat: profesorSelectat
            }, function(response) {

                $.each(response, function(key, valoare) {
                    $('#field-materia').append(`<option value="${valoare['idMaterie']}">${valoare['denumire']} </option>`);
                });

            });
        });


        <?php if ($idProfesor == $_SESSION['userId']) { ?>

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

            $("#field-ziua").change(function(e) {
                validareLipsaValoare("#field-ziua");
            });
            $("#field-clasa").change(function(e) {
                validareLipsaValoare("#field-clasa");
            });
            $("#field-materia").change(function(e) {
                validareLipsaValoare("#field-materia");
            });
            $("#field-ora").change(function(e) {
                validareLipsaValoare("#field-ora");
            });

            $("#btn-add-ora").click(function(e) {
                e.preventDefault();

                // preluam datele din form
                let fieldZiua = $("#field-ziua").val();
                let fieldClasa = $("#field-clasa").val();
                let fieldMateria = $("#field-materia").val();
                let fieldOra = $("#field-ora").val();


                // validari input
                var errDetected = false;

                if (validareLipsaValoare("#field-ziua") == false)
                    errDetected = true;

                if (validareLipsaValoare("#field-clasa") == false)
                    errDetected = true;

                if (validareLipsaValoare("#field-materia") == false)
                    errDetected = true;

                if (validareLipsaValoare("#field-ora") == false)
                    errDetected = true;


                if (errDetected == false) {

                    // trimitem
                    $.post("<?php echo BASE_URL; ?>/dataProf?action=addOra", {
                        ziua: fieldZiua,
                        clasa: fieldClasa,
                        materia: fieldMateria,
                        ora: fieldOra
                    }, function(response) {
                        if (response.trim() == 'success') {

                            // resetam inputul din formular
                            $("#form-add-ora").trigger('reset');

                            // eliminam tipul de valididate al campurilor
                            $(".form-control, .custom-control-input").removeClass('is-valid is-invalid');

                        } else if (response.trim() == 'exista') {
                            alert("Există deja o activitate la această oră!");
                        } else {

                            // afisam mesaj de eroare
                            alert("S-a intampinat o eroare! Va rugam sa reincercati.");

                        }

                    });
                }
                getOre();
            });

        <?php } ?>

        //validare campuri
    </script>


</body>

</html>