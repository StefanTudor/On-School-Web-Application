<!DOCTYPE html>
<html lang="ro">

<title>Orar</title>

<head>

    <?php include("_parts/header.php"); ?>

</head>

<body>

    <?php include("_parts/menu-" .  $_SESSION['tipContStr'] . ".php"); ?>

    <div class="app-wrapper container-orar">
        <h1 class="font-weight-bold text-center p-2 pt-4">Orarul lui <?php echo $dateCopil['nume'] ?></h1>
        <div class="container pt-3 pb-3">

            <div class="row d-flex justify-content-between">

                <div class="col-sm-3 m-3 p-0">
                    <div class="tabela-orar">
                        <div class="col-orange p-0 tab-orar-head">
                            <div class="pt-2 pl-3">
                                <h3 class="font-weight-bold m-0">Luni<h3>
                            </div>
                            <hr class="m-0 bg-secondary">
                        </div>

                        <ul class="p-0" id="ul-luni">
                        </ul>
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
                    </div>
                </div>

            </div>

            <div class="row d-flex justify-content-between py-5">

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
                    </div>
                </div>

                <div class="col-sm-3 m-3 p-0">
                </div>

            </div>

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
            $idElev = <?php echo $dateCopil['idElev'] ?>

            $.post("<?php echo BASE_URL; ?>/data?action=getOreElev", {
                idElev: $idElev
            }, function(response) {

                $.each(response, function(key, valoare) {

                    switch (valoare['zi']) {
                        case 1:
                            $('#ul-luni').append(`<li class="li-materie px-3">
                        <div class="row p-2">
                            <div class="col-3">
                                ${valoare['ora']}
                            </div>
                            <div class="col-9 p-0 text-center">
                            ${valoare['materie']}
                            </div>
                        </div>
                    </li>`);
                            luni++;
                            console.log(luni);
                            break;

                        case 2:
                            $('#ul-marti').append(`<li class="li-materie px-3">
                        <div class="row p-2">
                            <div class="col-3">
                                ${valoare['ora']}
                            </div>
                            <div class="col-9 p-0 text-center">
                            ${valoare['materie']}
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
                            <div class="col-9 p-0 text-center">
                            ${valoare['materie']}
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
                            <div class="col-9 p-0 text-center">
                            ${valoare['materie']}
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
                            <div class="col-9 p-0 text-center">
                            ${valoare['materie']}
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
    </script>

</body>

</html>