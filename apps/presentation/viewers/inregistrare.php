<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="ro">

<head>

    <title> Înregistrare </title>
    <?php include("_parts/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/modals.css">

    <style>
        #btnScroll {
            display: none;
            position: fixed;
            bottom: 10%;
            right: 30px;
            z-index: 99;
            border: 0;
            outline: 0;
            background-color: rgba(0, 44, 95, 0.7);
            color: white;
            cursor: pointer;
            padding: 0.6rem 1rem 0.8rem 1rem;
            -webkit-filter: grayscale(0) blur(0px);
            filter: grayscale(0) blur(0px);
            -webkit-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #btnScroll:active {
            background-color: #00aad2;
            border-radius: 50%;
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    </style>

</head>

<body class="gradient">
    <div>
        <h1 class="text-uppercase text-center h1-register">Formular de înscriere</h1>
    </div>
    <form id="form-register" class="w-100 horizontal-centered" action="<?php echo BASE_URL; ?>/inregistrare" method="post">
        <div class="row h-50 w-70 pad-bot-5 row-register">
            <div class="col-12 p-0">
                <?php if (count($errors) > 0) : ?>
                    <div class="alert alert-danger" data-aos="fade-right">
                        <?php foreach ($errors as $error) : ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-6 col-form-school pad-2">
                <div>
                    <div class="col-md">
                        <h2 class="text-center pad-bot-2" style="font-size: 1.4rem; color: #123456">UNITATE DE ÎNVĂȚĂMÂNT</h2>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label class="control-label" for="field-judet">Județ:</label>
                            <select class="form-control" id="field-judet" required>
                                <option value="">--Selectează--</option>
                                <?php if ($judete) :
                                    foreach ($judete as $judet) : ?>
                                        <option value="<?php echo $judet ?>"><?php echo $judet ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label class="control-label" for="field-oras">Oraș:</label>
                            <select class="form-control" id="field-oras" required>
                                <option value="">--Selectează--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label class="control-label" for="field-scoala">Unitatea de învățământ:</label>
                            <select class="form-control" id="field-scoala" required>
                                <option value="">--Selectează--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="field-namespace">Denumire namespace:</label>
                            <button type="button" class="btn" data-toggle="tooltip" data-placement="right" title="Namespace-ul este denumirea școlii din subdomeniul ce va fi creat. (ex: namespace.onschool.ro)">
                                <i class="fa fa-info-circle"></i> </button>
                            <input type="text" class="form-control" id="field-namespace" name="field-namespace" placeholder="Namespace" value="<?php echo $namespace; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="field-id" name="field-id" value="" hidden>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-form-admin pad-2">
                <div>
                    <div class="col-md">
                        <h2 class="text-center pad-bot-2" style="font-size: 1.4rem;">CONT ADMINISTRATOR</h2>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="field-nume">Nume:</label>
                            <input type="text" class="form-control" id="field-nume" name="field-nume" value="<?php echo $name; ?>" placeholder="Nume" required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="field-email">Adresa de e-mail:</label>
                            <input type="email" class="form-control" id="field-email" name="field-email" value="<?php echo $email; ?>" placeholder="E-mail" required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="field-tel">Telefon:</label>
                            <input type="number" class="form-control" id="field-tel" name="field-tel" value="<?php echo $phone; ?>" placeholder="Număr de telefon">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="fieldPass">Parolă:</label>
                            <input type="password" class="form-control" id="field-pass" name="field-pass" placeholder="Parolă" required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="fieldPass2">Repetare parolă:</label>
                            <input type="password" class="form-control" id="field-pass2" name="field-pass2" placeholder="Repetare parolă" required>
                        </div>
                    </div>
                    <div class="form-group pad-2">
                        <button id="btn-register" name="btn-register" type="submit" class="btn btn-sm btn-success right-3">
                            <i class="fa fa-check"></i> Trimite
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div id="modalSuccess" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header horizontal-centered">
                    <div class="icon-box">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <h4>Super!</h4>
                    <p>Contul tău a fost creeat cu succes.</p>
                    <a href="" id="btn-portal">
                        <div class="btn btn-success" data-dismiss="modal"><span>Deschide portal</span></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <button onclick="topFunction()" id="btnScroll" title="Mergi la începutul paginii">
        <i class="fa fa-angle-up fa-lg" aria-hidden="true"></i>
    </button>



    <?php include("_parts/footer-slim.php"); ?>

    <script>
        AOS.init({
            duration: 800
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $('#btn-portal').click(function() {
            let namespace = $('#field-namespace').val();
            //window.location.replace(namespace + ".onschool.ro");
        });

        function golireOrase() {
            $('#field-oras').empty();
            $('#field-oras').append(`<option value="">--Selectează--</option>`);
        }

        function golireScoli() {
            $('#field-scoala').empty();
            $('#field-scoala').append(`<option value="">--Selectează--</option>`);
        }

        function orasVizibil(val) {
            if (val)
                $('#field-oras').prop('disabled', false);
            else
                $('#field-oras').prop('disabled', true);

        }

        function scoalaVizibila(val) {
            if (val)
                $('#field-scoala').prop('disabled', false);
            else
                $('#field-scoala').prop('disabled', true);
        }


        //setam default sa fie dezactivate
        orasVizibil(false);
        scoalaVizibila(false);

        //daca se revine la valoarea default
        $('#field-judet').on('change', function() {
            if ($('#field-judet').val() === '') {
                orasVizibil(false);
                scoalaVizibila(false);

                // se goleste lista de orase
                golireOrase();
                // se goleste lista de scoli
                golireScoli();

            }
        });

        $('#field-oras').on('change', function() {
            if ($('#field-oras').val() === '') {
                scoalaVizibila(false);

                // se goleste lista de scoli
                golireScoli();
            }
        });

        // activam select-urile daca se selecteaza o optiune
        $('#field-judet').on('change', function() {

            if ($('#field-judet').val() !== '') {
                orasVizibil(true);

                // se goleste lista de orase
                golireOrase();

                let judetSelectat = $('#field-judet').val();

                $.post("<?php echo BASE_URL; ?>/data?action=getOrase", {
                    judetSelectat: judetSelectat
                }, function(response) {

                    $.each(response, function(key, valoare) {
                        $('#field-oras').append(`<option value="${valoare}">${valoare} </option>`);
                    });

                });

            }
        });

        $('#field-oras').on('change', function() {
            if ($('#field-oras').val() !== '') {
                scoalaVizibila(true);

                // se goleste lista de scoli
                golireScoli();

                let judetSelectat = $('#field-judet').val();
                let orasSelectat = $('#field-oras').val();

                $.post("<?php echo BASE_URL; ?>/data?action=getSchools", {
                    judetSelectat: judetSelectat,
                    orasSelectat: orasSelectat
                }, function(response) {

                    $.each(response, function(key, valoare) {
                        $('#field-scoala').append(`<option value='${valoare}'>${valoare} </option>`);
                    });

                });

            }
        });

        $('#field-scoala').on('change', function() {
            // verificare valoare default
            if ($('#field-oras').val() !== '') {

                let judetSelectat = $('#field-judet').val();
                let orasSelectat = $('#field-oras').val();
                let scoalaSelectata = $('#field-scoala').val();

                // efectuare request 
                $.post("<?php echo BASE_URL; ?>/data?action=getSchool", {
                    judetSelectat: judetSelectat,
                    orasSelectat: orasSelectat,
                    scoalaSelectata: scoalaSelectata
                }, function(response) {
                    // setarea id-ului cu raspunsul primit
                    var id_scoala = response;
                    $('#field-id').val(id_scoala);
                });
            }
        });

        var mybutton = document.getElementById("btnScroll");

        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
                mybutton.style.transform = "visibility 0s linear 0.33s, opacity 0.33s linear"
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        <?php if ($show_modal) : ?>

            $('#modalSuccess').modal('show');

        <?php endif; ?>
    </script>




</body>