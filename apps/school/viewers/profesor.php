<!DOCTYPE html>
<html lang="ro">

<title> Pagina profesorului </title>

<head>

    <?php include("_parts/header.php"); ?>

</head>

<body>

    <?php include("_parts/menu-" .  $_SESSION['tipContStr'] . ".php"); ?>

    <div class="app-wrapper">
        <div class="fluid-container container-elev">
            <div class="container trans-container pb-3 px-5">

                <div class="row text-center justify-content-center text-dark">
                    <div class="col-xs col-board pl-3">
                        <a href="<?php echo BASE_URL; ?>/profesor/orar?profesor=<?php echo $_SESSION['userId']?>">
                            <div class="card card-board-profesor bg-light">
                                <img class="card-img-top" src="<?php echo BASE_URL ?>/assets/img/orar.png">
                                <div class="card-body text-center">
                                    <h5>Orar</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs col-board pr-3">
                        <a href="/profesor/note">
                            <div class="card card-board-profesor bg-light">
                                <img class="card-img-top" src="<?php echo BASE_URL ?>/assets/img/note.png">
                                <div class="card-body text-center">
                                    <h5>Note elevi</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs d-none d-lg-block d-xl-block col-board">
                        <img class="card-img-top rounded-circle" id="bot-hi" src="<?php echo BASE_URL ?>/assets/img/bot-slim.gif">
                    </div>
                    <div class="col-xs col-board pl-3">
                        <a href="/profesor/calendar">
                            <div class="card card-board-profesor bg-light">
                                <img class="card-img-top" src="<?php echo BASE_URL ?>/assets/img/task.png">
                                <div class="card-body text-center">
                                    <h5>Sarcini</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs col-board pr-3">
                        <a href="/profesor/lista-profesori">
                            <div class="card card-board-profesor bg-light">
                                <img class="card-img-top" src="<?php echo BASE_URL ?>/assets/img/profesori.png">
                                <div class="card-body text-center">
                                    <h5 class="hover-black">Profesori</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <hr style="background-color:#aaa">

                <div class="row text-center horizontal-centered bg-seconday pt-3">
                    <div class="col-lg-6 py-2">
                        <div class="col-chat" style="height: 30rem;">
                            <?php include("_parts/chatbot-profesor.php"); ?>

                        </div>

                    </div>
                    <div class="col-lg-6 py-2">
                        <div class="col-chatbot" style="height: 30rem;">
                            <?php include("_parts/chat-class-profesor.php"); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include("_parts/footer.php"); ?>
    <?php include("_parts/chatbot-script.php"); ?>

    <script>
        document.getElementById('bot-hi').setAttribute('draggable', false);
    </script>

</body>