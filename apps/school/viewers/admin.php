<?php
if (isset($_SESSION['user'])) {
?>

    <!DOCTYPE html>
    <html lang="ro">

    <title> Administrare </title>

    <head>

        <?php include("_parts/header.php"); ?>

    </head>

    <body class="container-admin">

        <div class="dropdown" style="z-index: 5;">
            <div class="w-100 d-flex position-fixed">
                <div class="p-3 ml-auto mt-3 mr-2">
                    <a class="btn" href="#" role="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/assets/img/admin.png" class="rounded-circle user-img-msg-white">
                    </a>
                    <div class="dropdown-menu mr-5" aria-labelledby="dropdownMenu">
                        <a class="dropdown-item py-2" href=""><i class="fa fa-cogs"></i> Setări cont</a>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item py-2" href="/"><i class="fa fa-power-off text-danger"></i> <span class="text-danger">Deconecteză-te</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-2"></div>
        <div class="container">
            <h1 class="text-center font-weight-bold pad-2 text-light" id="admin-h1">Administrare</h1>

            <div class="row horizontal-centered">

                <div class="col-md-4 col-board">
                    <div class="card card-board-admin bg-trans">
                        <img class="card-img-top" src="<?php echo BASE_URL ?>/assets/img/profesor.png">
                        <div class="card-body text-center">
                            <h5 class="card-title">Profesori</h5>

                            <div>
                                <a href="" data-toggle="modal" data-target="#modal-add-prof" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                <a href="" data-toggle="modal" data-target="#modal-edit-prof" class="btn btn-secondary" id="btn-pr-edit-prof"><i class="fa fa-pencil"></i></a>
                                <a href="" data-toggle="modal" data-target="#modal-delete-prof" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-board">
                    <div class="card card-board-admin bg-trans">
                        <img class="card-img-top" src="<?php echo BASE_URL ?>/assets/img/elev.png">
                        <div class="card-body text-center">
                            <h5 class="card-title">Elevi</h5>

                            <div>
                                <a href="" data-toggle="modal" data-target="#modal-add-elev" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                <a href="" data-toggle="modal" data-target="#modal-edit-elev" class="btn btn-secondary"><i class="fa fa-pencil"></i></a>
                                <a href="" data-toggle="modal" data-target="#modal-delete-elev" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-board">
                    <div class="card card-board-admin bg-trans">
                        <img class="card-img-top" src="<?php echo BASE_URL ?>/assets/img/parinte.png">
                        <div class="card-body text-center">
                            <h5 class="card-title">Părinți</h5>

                            <div>
                                <a href="" data-toggle="modal" data-target="#modal-add-parinte" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                <a href="" data-toggle="modal" data-target="#modal-edit-parinte" class="btn btn-secondary"><i class="fa fa-pencil"></i></a>
                                <a href="" data-toggle="modal" data-target="#modal-delete-parinte" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-board">
                    <div class="card card-board-admin bg-trans">
                        <img class="card-img-top" src="<?php echo BASE_URL ?>/assets/img/clasa.png">
                        <div class="card-body text-center">
                            <h5 class="card-title">Clase</h5>

                            <div>
                                <a href="" data-toggle="modal" data-target="#modal-add-clasa" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                <a href="" data-toggle="modal" data-target="#modal-edit-clasa" class="btn btn-secondary"><i class="fa fa-pencil"></i></a>
                                <a href="" data-toggle="modal" data-target="#modal-delete-clasa" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-board">
                    <div class="card card-board-admin bg-trans">
                        <img class="card-img-top" src="<?php echo BASE_URL ?>/assets/img/book.png">
                        <div class="card-body text-center">
                            <h5 class="card-title">Materii</h5>

                            <div>
                                <a href="" data-toggle="modal" data-target="#modal-add-materie" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                <a href="" data-toggle="modal" data-target="#modal-edit-materie" class="btn btn-secondary"><i class="fa fa-pencil"></i></a>
                                <a href="" data-toggle="modal" data-target="#modal-delete-materie" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-board">
                    <div class="card card-board-admin bg-trans">
                        <img class="card-img-top" src="<?php echo BASE_URL ?>/assets/img/profmat.png">
                        <div class="card-body text-center">
                            <h5 class="card-title">Materii profesori</h5>

                            <div>
                                <a href="" data-toggle="modal" data-target="#modal-add-profmat" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                <a href="" data-toggle="modal" data-target="#modal-delete-profmat" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <?php include("_parts/modals-admin.php"); ?>
        <?php include("_parts/footer-slim.php"); ?>

    </body>

    </html>

<?php
} else {
    header("Location: /");
}
?>