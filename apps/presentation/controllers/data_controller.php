<?php

    include FOLDER_APP_MODELS . "/model.php";

    $errors = [];
    $name = "";
    $email = "";
    $phone = "";
    $namespace = "";

    $show_modal = false;

    

    // extragere orase si scoli

    if (isset($_GET['action'])) {

        switch ($_GET['action']) {

            case "getOrase":

                header("Content-type: application/json; charset=utf-8");

                // get user input
                $judetSelectat = isset($_POST['judetSelectat']) ? $_POST['judetSelectat'] : null;

                // preluare lista orase
                $orase = getOrase($judetSelectat);
                
                echo json_encode($orase);

                break;

            case "getSchools":

                header("Content-type: application/json; charset=utf-8");

                // get user input
                $judetSelectat = isset($_POST['judetSelectat']) ? $_POST['judetSelectat'] : null;
                $orasSelectat = isset($_POST['orasSelectat']) ? $_POST['orasSelectat'] : null;

                //preuluare lista scoli
                $scoli = getScoli($judetSelectat, $orasSelectat);

                echo json_encode($scoli);

                break;

            case "getSchool":

                // get user input
                $judetSelectat = isset($_POST['judetSelectat']) ? $_POST['judetSelectat'] : null;
                $orasSelectat = isset($_POST['orasSelectat']) ? $_POST['orasSelectat'] : null;
                $scoalaSelectata = isset($_POST['scoalaSelectata']) ? $_POST['scoalaSelectata'] : null;

                // run query
                $id_scoala = getIdScoala($scoalaSelectata, $orasSelectat, $judetSelectat);

                echo $id_scoala;

                break;

            default:

                echo "Actiune inexistenta";

                break;
        }

        die();

    }