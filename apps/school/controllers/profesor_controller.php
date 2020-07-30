<?php

require FOLDER_APP_MODELS . "/model.php";

$aniLitera  = [];
$listaMaterii = [];
$listaNote = [];
$oreProfesor = [];
$numeProfesor = '';
$idProfesor  = '';

// parsare
foreach (extrageClaseAnLitera() as $v) {
    $aniLitera[$v['idClasa']] = $v['denumire'];
}

foreach (getMateriiPredate($_SESSION['userId']) as $v) {
    $listaMaterii[$v['idMaterie']] = $v['denumire'];
}

if (isset($_GET['clasa']) && isset($_GET['materie'])) {

    $clasa = $_GET['clasa'];
    $materie = $_GET['materie'];

    $listaNote = getListaNoteEleviByCLasa($clasa, $materie);
}

if (isset($_GET['profesor'])) {

    $idProfesor  =  $_GET['profesor'];
    $numeProfesor = getDetaliiUser($_GET['profesor'])['nume'];

    $oreProfesor = extrageOreProfesor($idProfesor);
}

if (isset($_GET['action'])) {

    switch ($_GET['action']) {

        case "getMateriiProfesor":

            header("Content-type: application/json; charset=utf-8");

            // get user input
            $profesorSelectat = isset($_POST['profesorSelectat']) ? $_POST['profesorSelectat'] : null;

            // preluare lista materii predate
            $materiiProfesor = getMateriiPredate($profesorSelectat);

            echo json_encode($materiiProfesor);

        break;

            case "addOra":
                // input user
                $ziua       =   isset($_POST['ziua'])       ? $_POST['ziua']        : null;
                $clasa      =   isset($_POST['clasa'])      ? $_POST['clasa']       : null;
                $materia    =   isset($_POST['materia'])    ? $_POST['materia']     : null;
                $ora        =   isset($_POST['ora'])        ? $_POST['ora']         : null;
    
                inserareOra($materia, $clasa, $ziua, $ora);
    
                break;

        break;

        default:
            echo "Actiune inexistenta";
            break;
    }

    die();
}
