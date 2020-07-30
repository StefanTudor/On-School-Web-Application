<?php

    require FOLDER_APP_MODELS . "/model.php";

    $idUser = $_SESSION['userId'];
    $dateCopil = getCopil($idUser);
    $noteElev = getListaNoteElevById($dateCopil['idElev']);


