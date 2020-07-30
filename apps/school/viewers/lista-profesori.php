<!DOCTYPE html>
<html lang="ro">

<title>Orar profesori</title>

<head>

    <?php include("_parts/header.php"); ?>

</head>

<body>

    <?php include("_parts/menu-" .  $_SESSION['tipContStr'] . ".php"); ?>


    <div class="app-wrapper">
        <h1 class="font-weight-bold text-center p-2 pt-5">Orar profesori</h1>


        <div class="container w-100 h-100 my-5">

            <?php foreach ($profesori as $profesor) { ?>

                <div class="col-gray-light text-dark w-100 px-3 pb-2 pt-2 mt-2 rounded d-flex justify-content-between align-items-center" id="tab-<?php echo $profesor['idUser']; ?>" idProf=<?php echo $profesor['idUser']; ?>>
                    <div><?php echo $profesor['nume']; ?></div>
                    <btn class="btn-sm btn-dark m-0 px-2 font-weight-light" id="btn-<?php echo $profesor['idUser']; ?>" style="cursor: pointer; font-size: 0.8rem">Vezi orar</btn>
                </div>
            <?php } ?>
        </div>

    </div>


    <?php include("_parts/footer.php"); ?>

    </div>

    <script>
        <?php foreach ($profesori as $profesor) { ?>
            $("#btn-<?php echo $profesor['idUser']; ?>").click(function(e) {

                   var idProf = $("#tab-<?php echo $profesor['idUser']; ?>").attr("idProf");
                    window.location.href = "<?php echo BASE_URL; ?>/profesor/orar?profesor=" + idProf;

                });
        <?php } ?>
    </script>


</body>