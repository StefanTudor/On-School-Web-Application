<?php

//incarcare mesaje in chat
require FOLDER_APP_MODELS . "/model.php";

$idScoala   = $_SESSION["idScoala"];
$profesori  = extrageProfesori();
$ani        = extrageAniClase();
$aniLitera  = extrageClaseAnLitera();
$materii    = extrageMaterii();
$intentsTags = getIntentsTags();
$noteElev = getListaNoteElevById($_SESSION['userId']);


if (isset($_GET['action'])) {

    switch ($_GET['action']) {

        case "addProf":
            // input user
            $nume       =   isset($_POST['nume'])    ? $_POST['nume']     : null;
            $email      =   isset($_POST['email'])   ? $_POST['email']    : null;
            $telefon    =   isset($_POST['telefon']) ? $_POST['telefon']  : null;
            $pass       =   isset($_POST['pass'])    ? $_POST['pass']     : null;

            inserareProfesor($nume, $email, $telefon, $pass);

            break;

        case "editProf":
            // input user
            $idUser     =   isset($_POST['idUser'])  ? $_POST['idUser']   : null;
            $nume       =   isset($_POST['nume'])    ? $_POST['nume']     : null;
            $email      =   isset($_POST['email'])   ? $_POST['email']    : null;
            $telefon    =   isset($_POST['telefon']) ? $_POST['telefon']  : null;
            $pass       =   isset($_POST['pass'])    ? $_POST['pass']     : null;

            $pass ? editareUser($idUser, $nume, $email, $telefon, $pass) :
                editareUserFaraPass($idUser, $nume, $email, $telefon);

            break;

        case "editElev":
            // input user
            $idUser     =   isset($_POST['idUser'])  ? $_POST['idUser']   : null;
            $nume       =   isset($_POST['nume'])    ? $_POST['nume']     : null;
            $email      =   isset($_POST['email'])   ? $_POST['email']    : null;
            $telefon    =   isset($_POST['telefon']) ? $_POST['telefon']  : null;
            $pass       =   isset($_POST['pass'])    ? $_POST['pass']     : null;

            $pass ? editareUser($idUser, $nume, $email, $telefon, $pass) :
                editareUserFaraPass($idUser, $nume, $email, $telefon);

            break;

        case "editParinte":
            // input user
            $idUser     =   isset($_POST['idUser'])  ? $_POST['idUser']   : null;
            $nume       =   isset($_POST['nume'])    ? $_POST['nume']     : null;
            $email      =   isset($_POST['email'])   ? $_POST['email']    : null;
            $telefon    =   isset($_POST['telefon']) ? $_POST['telefon']  : null;
            $pass       =   isset($_POST['pass'])    ? $_POST['pass']     : null;

            $pass ? editareUser($idUser, $nume, $email, $telefon, $pass) :
                editareUserFaraPass($idUser, $nume, $email, $telefon);

            break;

        case "deleteProfesor":
            //input user
            $profesor = isset($_POST['profesor'])  ? $_POST['profesor'] : null;

            stergereProfesor($profesor);

            break;

        case "addElev":
            // input user
            $nume       =   isset($_POST['nume'])    ? $_POST['nume']     : null;
            $email      =   isset($_POST['email'])   ? $_POST['email']    : null;
            $telefon    =   isset($_POST['telefon']) ? $_POST['telefon']  : null;
            $pass       =   isset($_POST['pass'])    ? $_POST['pass']     : null;
            $clasa      =   isset($_POST['clasa'])   ? $_POST['clasa']     : null;

            inserareElev($nume, $email, $telefon, $clasa, $pass);

            break;

        case "deleteElev":
            //input user
            $elev = isset($_POST['elev'])  ? $_POST['elev'] : null;

            stergereElev($elev);

            break;

        case "addParinte":
            // input user
            $nume       =   isset($_POST['nume'])    ? $_POST['nume']     : null;
            $email      =   isset($_POST['email'])   ? $_POST['email']    : null;
            $telefon    =   isset($_POST['telefon']) ? $_POST['telefon']  : null;
            $pass       =   isset($_POST['pass'])    ? $_POST['pass']     : null;
            $idElev     =   isset($_POST['idElev'])  ? $_POST['idElev']   : null;

            inserareParinte($nume, $email, $telefon, $pass, $idElev);

            break;

        case "deleteParinte":
            //input user
            $parinte    = isset($_POST['parinte'])  ? $_POST['parinte'] : null;

            stergereParinte($parinte);

            break;

        case "addClasa":
            //input user
            $an     = isset($_POST['an'])       ? $_POST['an']      : null;
            $litera = isset($_POST['litera'])   ? $_POST['litera']  : null;

            inserareClasa($an, $litera);

            break;

        case "editClasa":
            //input user
            $an          =   isset($_POST['an'])          ? $_POST['an']          : null;
            $litera      =   isset($_POST['litera'])      ? $_POST['litera']      : null;
            $anNou       =   isset($_POST['anNou'])       ? $_POST['anNou']       : null;
            $literaNoua  =   isset($_POST['literaNoua'])  ? $_POST['literaNoua']  : null;

            editareClasa($an, $litera, $anNou, $literaNoua);

            break;

        case "deleteClasa":
            //input user
            $an          =   isset($_POST['an'])          ? $_POST['an']          : null;
            $litera      =   isset($_POST['litera'])      ? $_POST['litera']      : null;

            stergereClasa($an, $litera);

            break;

        case "addMaterie":
            //input user
            $materie = isset($_POST['materie']) ? $_POST['materie'] : null;

            inserareMaterie($materie);

            break;

        case "editMaterie":
            //input user
            $materie    = isset($_POST['materie'])      ? $_POST['materie']     : null;
            $materieNou = isset($_POST['materieNou'])   ? $_POST['materieNou']  : null;

            editareMaterie($materie, $materieNou);

            break;

        case "deleteMaterie":
            //input user
            $materie = isset($_POST['materieD1'])  ? $_POST['materieD1'] : null;

            stergereMaterie($materie);

            break;

        case "addProfmat":
            //input user
            $profesor   = isset($_POST['profesor']) ? $_POST['profesor'] : null;
            $materie    = isset($_POST['materie'])  ? $_POST['materie']  : null;

            inserareProfmat($profesor, $materie);

            break;

        case "deleteProfmat":
            //input user
            $profesor   = isset($_POST['profesorD']) ? $_POST['profesorD'] : null;
            $materie    = isset($_POST['materieD'])  ? $_POST['materieD']  : null;

            stergereProfmat($profesor, $materie);

            break;

        case "getLitere":

            header("Content-type: application/json; charset=utf-8");

            // get user input
            $anSelectat = isset($_POST['anSelectat']) ? $_POST['anSelectat'] : null;

            // preluare lista litere
            $litere = getLitere($anSelectat);

            echo json_encode($litere);

            break;

        case "getElevi":

            header("Content-type: application/json; charset=utf-8");

            // get user input
            $clasaSelectata = isset($_POST['clasaSelectata']) ? $_POST['clasaSelectata'] : null;

            // preluare lista litere
            $elevi = extrageElevi($clasaSelectata);

            echo json_encode($elevi);

            break;

        case "getParinti":

            header("Content-type: application/json; charset=utf-8");

            // get user input
            $clasaSelectata = isset($_POST['clasaSelectata']) ? $_POST['clasaSelectata'] : null;

            // preluare lista litere
            $parinti = extrageParinti($clasaSelectata);

            echo json_encode($parinti);

            break;

        case "getMateriiProfesor":

            header("Content-type: application/json; charset=utf-8");

            // get user input
            $profesorSelectat = isset($_POST['profesorSelectat']) ? $_POST['profesorSelectat'] : null;

            // preluare lista materii predate
            $materiiProfesor = getMateriiPredate($profesorSelectat);

            echo json_encode($materiiProfesor);

            break;

        case "sendMessage":
            // input user
            $mesaj  =   isset($_POST['mesaj'])  ? $_POST['mesaj']   : null;
            $data   =   isset($_POST['data'])   ? $_POST['data']    : null;
            $ora    =   isset($_POST['ora'])    ? $_POST['ora']     : null;
            $clasa  =   isset($_POST['clasa'])  ? $_POST['clasa']   : null;
            $userId =   $_SESSION["userId"];

            // inserare mesaj in db
            if ($mesaj && $data && $ora && $clasa) {
                $inserareMesaj = inserareMesaj($mesaj, $userId, $data, $ora, $clasa);
            } else {
                echo "Eroare la inserarea in baza de date!";
            }
            break;

        case "updateMessages":

            header("Content-type: application/json; charset=utf-8");

            $clasa = isset($_POST['clasa']) ? $_POST['clasa'] : null;
            $mesajeGrup = getMesaje($clasa);
            echo json_encode($mesajeGrup);

            break;

        case "addIntent":

            // input user
            $tag        =   isset($_POST['tag'])        ? $_POST['tag']         : null;
            $exista     =   isset($_POST['exista'])     ? $_POST['exista']      : null;
            $intrebare  =   isset($_POST['intrebare'])  ? $_POST['intrebare']   : null;
            $raspuns    =   isset($_POST['raspuns'])    ? $_POST['raspuns']     : null;

            $tag = strtolower($tag);

            if ($exista == true) {
                inserareIntentTagExistent($tag, $intrebare, $raspuns);
            } else {
                inserareIntentTagNou($tag, $intrebare, $raspuns);
            }

            updateFiserIntents();

            // $config = require CONFIG_FOLDER . "/chatbot.php";
            // $returned = exec('python ' . $config['chatbot_train_path']);


            break;

        case "addOra":
            // input user
            $ziua       =   isset($_POST['ziua'])       ? $_POST['ziua']        : null;
            $clasa      =   isset($_POST['clasa'])      ? $_POST['clasa']       : null;
            $materia    =   isset($_POST['materia'])    ? $_POST['materia']     : null;
            $ora        =   isset($_POST['ora'])        ? $_POST['ora']         : null;

            inserareOra($materia, $clasa, $ziua, $ora);

            break;

        case "getOreProfesor":

            header("Content-type: application/json; charset=utf-8");

            $idProfesor  =  isset($_POST['idProfesor']) ? $_POST['idProfesor'] : null;

            $oreProfesor = extrageOreProfesor($idProfesor);
            echo json_encode($oreProfesor);

            break;

        case "getOreElev":

            header("Content-type: application/json; charset=utf-8");

            $idElev  =  isset($_POST['idElev']) ? $_POST['idElev'] : null;

            $oreElev = extrageOreElev($idElev);
            echo json_encode($oreElev);

            break;

        case "addTask":
            // input user
            $denumire       =   isset($_POST['denumire'])    ? $_POST['denumire']     : null;
            $toataZiua      =   isset($_POST['toataZiua'])   ? $_POST['toataZiua']    : null;
            $dataInceput    =   isset($_POST['dataInceput']) ? $_POST['dataInceput']  : null;
            $dataSfarsit    =   isset($_POST['dataSfarsit']) ? $_POST['dataSfarsit']  : null;
            $oraInceput     =   isset($_POST['oraInceput'])  ? $_POST['oraInceput']   : null;
            $oraSfarsit     =   isset($_POST['oraSfarsit'])  ? $_POST['oraSfarsit']   : null;
            $url            =   isset($_POST['url'])         ? $_POST['url']          : null;
            $tip            =   isset($_POST['tip'])         ? $_POST['tip']          : null;


            inserareTask($denumire, $toataZiua, $dataInceput, $dataSfarsit, $oraInceput, $oraSfarsit, $url, $tip);

            break;

        case "getTasks":

            header("Content-type: application/json; charset=utf-8");

            $taskuri = extrageTaskuri();

            echo json_encode($taskuri);

            break;

        case "addNota":
            //input user
            $elev       = isset($_POST['elev'])         ? $_POST['elev']        : null;
            $nota       = isset($_POST['nota'])         ? $_POST['nota']        : null;
            $data       = isset($_POST['data'])         ? $_POST['data']        : null;
            $idMaterie  = isset($_POST['idMaterie'])    ? $_POST['idMaterie']   : null;
            $idProfesor = isset($_POST['idProfesor'])   ? $_POST['idProfesor']  : null;


            inserareNota($elev, $nota, $data, $idMaterie, $idProfesor);

            break;

        default:
            echo "Actiune inexistenta";
            break;
    }

    die();
}
