<?php

include FOLDER_APP_MODELS . "/model.php";

$errors = [];
$denumireScoala = "";
$tipCont = "";
$idScoala = "";
$email = "";
$passLogin = "";
$nume = "";


$numeScoala = getDetaliiScoalaDupaDomeniu()["denumireScoala"];
$_SESSION["scoala"] = $numeScoala;


if (isset($_POST['btn-login'])) {

    $email = $_POST['field-email'];
    $passLogin = $_POST['field-pass'];

    //validari  

    if (empty($email)) {
        $errors['email'] = 'Introdu aresa de e-mail.';
    }

    if (empty($passLogin)) {
        $errors['password'] = 'Introdu parola.';
    }

    $idScoala = getDetaliiScoalaDupaDomeniu()["idScoala"];

    $extractedDatas = extrageDateLogin($idScoala, $email);
    $passRecived = $extractedDatas["passRecived"];
    $tipCont = $extractedDatas["tipCont"];
    $userCount = $extractedDatas["userCount"];
    $nume = $extractedDatas["nume"];
    $userId = $extractedDatas["userId"];


    if ($userCount === 1 && isset($passRecived) && password_verify($passLogin, $passRecived)) {



        $_SESSION['user'] = $email;
        $_SESSION['userId'] = $userId;
        $_SESSION['userName'] = $nume;
        $tipContStr = getTipContStr($tipCont);
        $_SESSION['tipCont'] = $tipCont;
        $_SESSION['tipContStr'] = $tipContStr;
        $_SESSION['idScoala'] = $idScoala;
        $clasa = getClasaElev($_SESSION['userId']);
		$_SESSION['idClasaElev'] = $clasa['idClasa'];
        $_SESSION['clasaElev'] = $clasa['clasa'];



        switch ($tipCont) {

            case ADMINISTRATOR:

                header("Location: /admin");

                break;

            case ELEV:

                header("Location: /elev");

                break;

            case PROFESOR:

                header("Location: /profesor");

                break;

            case PARINTE:

                header("Location: /parinte");

                break;

            default:

                header("HTTP/1.0 404 Not Found");

                break;
        }
    } else {
        $errors['login'] = 'Nu există un cont cu aceste date.';
    }
}
