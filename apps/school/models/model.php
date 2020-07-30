<?php

function getDetaliiScoalaDupaDomeniu()
{
    global $conn;

    $schoolQuery = "SELECT `denumire`,`id_scoala` FROM `scoala` WHERE `namespace`=?";
    $stmt = $conn->prepare($schoolQuery);
    $namespace = SUBDOMAIN;
    $stmt->bind_param('s', $namespace);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_row($result);
    if ($row) {
        $denumireScoala = $row[0];
        $idScoala = $row[1];
    }
    $stmt->close();

    return [
        "denumireScoala" => isset($denumireScoala)  ?  $denumireScoala  : null,
        "idScoala"       => isset($idScoala)        ?  $idScoala        : null,
    ];
}

function getDetaliiUser($userId)
{
    global $conn;

    $detaliiQuery = "SELECT `nume`,`email` FROM `user` WHERE `id_user`=?";
    $stmt = $conn->prepare($detaliiQuery);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_row($result);
    if ($row) {
        $nume = $row[0];
        $email = $row[1];
    }
    $stmt->close();

    return [
        "nume"   => isset($nume)  ?  $nume  : null,
        "email"  => isset($email) ?  $email : null,
    ];
}

function getClasaElev($idUser)
{
    global $conn;

    $clasaQuery = " SELECT clasa.id_clasa, an, litera
                    FROM user
                    INNER JOIN clasa_elev
                    ON user.id_user = clasa_elev.id_user AND user.id_user=?
                    INNER JOIN clasa
                    ON clasa_elev.id_clasa = clasa.id_clasa";

    $stmt = $conn->prepare($clasaQuery);
    $stmt->bind_param('i', $idUser);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_row($result);
    if ($row) {
        $idClasa = $row[0];
        $clasa = $row[1] . $row[2];
    }
    $stmt->close();

    return [
        "idClasa" => isset($idClasa)  ?  $idClasa  : null,
        "clasa"   => isset($clasa)    ?  $clasa    : null
    ];
}

function getMesaje($idClasa)
{
    global $conn;

    $mesaje = [];
    $mesajeQuery = "SELECT mesaj, data_mesaj, ora_mesaj, nume, email
                    FROM mesaj_user t1
                    INNER JOIN user t2 
                    ON t1.id_user = t2.id_user AND t1.id_clasa=?
                    ORDER BY id_mesaj;";

    $stmt = $conn->prepare($mesajeQuery);
    $stmt->bind_param('i', $idClasa);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $mesaje[] = [
                "mesaj"         => $row[0],
                "data_mesaj"    => $row[1],
                "ora_mesaj"     => $row[2],
                "nume"          => $row[3],
                "email"         => $row[4]
            ];
        }
    }
    $stmt->close();
    return $mesaje;
}

function getIntentsTags()
{
    global $conn;

    $intentsTags = [];
    $intentsQuery = "SELECT DISTINCT tag
                    FROM intent
                    ORDER BY tag";

    $stmt = $conn->prepare($intentsQuery);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $intentsTags[] = [
                "tag" => $row[0]
            ];
        }
    } else {
        echo ("err");
    }
    $stmt->close();
    return $intentsTags;
}

function getIntents()
{
    global $conn;

    $intents = [];
    $intentsQuery = "SELECT tag, pozitie, intrebare, raspuns
                    FROM intent
                    ORDER BY tag, pozitie";

    $stmt = $conn->prepare($intentsQuery);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $intents[] = [
                "tag"       => $row[0],
                "pozitie"   => $row[1],
                "intrebare" => $row[2],
                "raspuns"   => $row[3]
            ];
        }
    } else {
        echo ("err");
    }
    $stmt->close();
    return $intents;
}

function getTipContStr($tip)
{
    $tipContStr = '';

    if ($tip === 1) {
        $tipContStr = "administrator";
    } else if ($tip === 2) {
        $tipContStr = "profesor";
    } else if ($tip === 3) {
        $tipContStr = "elev";
    } else if ($tip === 4) {
        $tipContStr = "parinte";
    } else {
        die("Nu se gaseste acest tip de cont!");
    }
    return $tipContStr;
}

function getLitere($anSelectat)
{
    global $conn;

    $litere = [];

    $litereQuery = "SELECT DISTINCT `litera` FROM `clasa` WHERE id_scoala=? AND an=? ORDER BY `litera`";
    $stmt = $conn->prepare($litereQuery);
    $idScoala = $_SESSION['idScoala'];
    $stmt->bind_param('ii', $idScoala, $anSelectat);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $litere[] = $row[0];
        }
    }
    $stmt->close();

    return $litere;
}

function getMateriiPredate($profesor)
{
    global $conn;

    $materiiPredate = [];

    $materiiQuery = "SELECT materie.id_materie,`denumire`
                     FROM `materie`
                     INNER JOIN `prof_materie`
                     ON materie.id_materie = prof_materie.id_materie
                     WHERE prof_materie.id_user = ?;";
    $stmt = $conn->prepare($materiiQuery);
    $stmt->bind_param('i', $profesor);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $materiiPredate[] = [
                'idMaterie' => $row[0],
                'denumire' => $row[1]
            ];
        }
    }
    $stmt->close();

    return $materiiPredate;
}

function getParinte($idElev)
{
    global $conn;

    $parinteQuery = "SELECT id_parinte FROM `parinte_elev` WHERE `id_elev`=?";
    $stmt = $conn->prepare($parinteQuery);
    $stmt->bind_param('i', $idElev);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_row($result);
    if ($row) {
        $idParinte = $row[0];
    }
    $stmt->close();

    return  isset($idParinte)  ?  $idParinte  : null;
}

function getCopil($idParinte)
{
    global $conn;

    $copliQuery = " SELECT id_elev, user.nume
                    FROM `parinte_elev`
                    INNER JOIN user
                    ON parinte_elev.id_elev = user.id_user
                    AND `id_parinte`= ?";
    $stmt = $conn->prepare($copliQuery);
    $stmt->bind_param('i', $idParinte);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_row($result);
    if ($row) {
        $idElev = $row[0];
        $nume = $row[1];
    }
    $stmt->close();

    return  [
        'idElev'    => isset($idElev)      ?  $idElev   : null,
        'nume'      => isset($nume)        ?  $nume     : null
    ];
}

function extrageDateLogin($idScoala, $email)
{
    global $conn;
    // query pentru gasirea utilizatorului cu datele introduse
    $loginQuery =  "SELECT `parola`, `tip_cont`, `nume`,`id_user` 
                    FROM `user` 
                    WHERE id_scoala=? AND email=?";
    $stmt = $conn->prepare($loginQuery);
    $stmt->bind_param('is', $idScoala, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    // numarul de inregistrari gasite
    $userCount = $result->num_rows;
    $row = mysqli_fetch_row($result);
    if ($row) {
        $passRecived = $row[0];
        $tipCont = $row[1];
        $nume = $row[2];
        $userId = $row[3];
    }
    $stmt->close();

    return [
        // se verifca daca variabilele sunt populate
        "passRecived" => isset($passRecived)   ?  $passRecived  : null,
        "tipCont"     => isset($tipCont)       ?  $tipCont      : null,
        "nume"        => isset($nume)          ?  $nume         : null,
        "userCount"   => isset($userCount)     ?  $userCount    : null,
        "userId"      => isset($userId)        ?  $userId       : null,

    ];
}

function extrageProfesori()
{

    global $conn;

    $profesori = [];

    $profesoriQuery = "SELECT DISTINCT `id_user`, `nume`, `email`, `telefon`, `parola` FROM `user` WHERE id_scoala=? AND tip_cont=? ORDER BY `nume`";
    $stmt = $conn->prepare($profesoriQuery);
    $idScoala = $_SESSION['idScoala'];
    $tipCont = PROFESOR;
    $stmt->bind_param('ii', $idScoala, $tipCont);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $profesori[] = [
                'idUser'    => $row[0],
                'nume'      => $row[1],
                'email'     => $row[2],
                'telefon'   => $row[3]
            ];
        }
    }
    $stmt->close();

    return $profesori;
}

function extrageElevi($idClasa)
{
    global $conn;

    $elevi = [];

    $eleviQuery = " SELECT user.id_user, user.nume, user.email, user.telefon
                        FROM user
                        INNER JOIN clasa_elev ON user.id_user = clasa_elev.id_user
                        WHERE clasa_elev.id_clasa=?
                        ORDER BY user.nume";
    $stmt = $conn->prepare($eleviQuery);
    $stmt->bind_param('i', $idClasa);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $elevi[] = [
                'idUser'    => $row[0],
                'nume'      => $row[1],
                'email'     => $row[2],
                'telefon'   => $row[3]
            ];
        }
    }
    $stmt->close();

    return $elevi;
}

function extrageParinti($idClasa)
{
    global $conn;

    $parinti = [];

    $parintiQuery =    "SELECT user.id_user, user.nume, user.email, user.telefon
                        FROM user
                        INNER JOIN parinte_elev ON user.id_user = parinte_elev.id_parinte
                        INNER JOIN clasa_elev ON parinte_elev.id_elev = clasa_elev.id_user
                        WHERE clasa_elev.id_clasa=?
                        ORDER BY user.nume";
    $stmt = $conn->prepare($parintiQuery);
    $stmt->bind_param('i', $idClasa);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $elevi[] = [
                'idUser'    => $row[0],
                'nume'      => $row[1],
                'email'     => $row[2],
                'telefon'   => $row[3]
            ];
        }
    }
    $stmt->close();

    return $elevi;
}

function extrageAniClase()
{

    global $conn;

    $ani = [];

    $aniQuery = "SELECT DISTINCT `an` FROM `clasa` WHERE id_scoala=? ORDER BY `an`";
    $stmt = $conn->prepare($aniQuery);
    $idScoala = $_SESSION['idScoala'];
    $stmt->bind_param('i', $idScoala);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $ani[] = [
                'an' => $row[0]
            ];
        }
    }
    $stmt->close();

    return $ani;
}

function extrageClaseAnLitera()
{

    global $conn;

    $claseAnLitera = [];

    $aniQuery = "SELECT `id_clasa`, `an`, `litera` FROM `clasa` WHERE id_scoala=? ORDER BY `an`, `litera`";
    $stmt = $conn->prepare($aniQuery);
    $idScoala = $_SESSION['idScoala'];
    $stmt->bind_param('i', $idScoala);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $claseAnLitera[] = [
                'idClasa'   => $row[0],
                'denumire'  => $row[1] . $row[2]
            ];

            // $claseAnLitera[ $row[0] ] = $row[1] . $row[2];
        }
    }
    $stmt->close();

    return $claseAnLitera;
}

function extrageOreProfesor($idProfesor)
{

    global $conn;

    $oreProfesor = [];

    $oreQuery =    "SELECT materie.denumire, zi, ora, an, litera
                    FROM materie
                    INNER JOIN ora_de_curs
                    ON ora_de_curs.id_materie = materie.id_materie
                    AND ora_de_curs.id_profesor = ?
                    INNER JOIN clasa
                    ON ora_de_curs.id_clasa = clasa.id_clasa
                    ORDER BY ora";

    $stmt = $conn->prepare($oreQuery);
    $stmt->bind_param('i', $idProfesor);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $oreProfesor[] = [
                'materie'   => $row[0],
                'zi'        => $row[1],
                'ora'       => $row[2],
                'clasa'     => $row[3] . $row[4]
            ];
        }
    } else {
        echo "err";
    }
    $stmt->close();

    return $oreProfesor;
}

function extrageOreElev($idElev)
{

    global $conn;

    $oreProfesor = [];

    $oreQuery =    "SELECT materie.denumire, zi, ora
                    FROM materie
                    INNER JOIN ora_de_curs
                    ON ora_de_curs.id_materie = materie.id_materie
                    AND ora_de_curs.id_clasa = (SELECT clasa_elev.id_clasa FROM clasa_elev WHERE clasa_elev.id_user=?)
                    INNER JOIN clasa
                    ON ora_de_curs.id_clasa = clasa.id_clasa
                    ORDER BY ora";

    $stmt = $conn->prepare($oreQuery);
    $stmt->bind_param('i', $idElev);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $oreProfesor[] = [
                'materie'   => $row[0],
                'zi'        => $row[1],
                'ora'       => $row[2]
            ];
        }
    } else {
        echo "err";
    }
    $stmt->close();

    return $oreProfesor;
}

function extrageMaterii()
{

    global $conn;

    $materii = [];

    $materiiQuery = "SELECT `id_materie`,`denumire` FROM `materie` ORDER BY `denumire`";
    $stmt = $conn->prepare($materiiQuery);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $materii[] = [
                'idMaterie' => $row[0],
                'denumire' => $row[1]
            ];
        }
    }
    $stmt->close();

    return $materii;
}

function extrageMateriiElev($idElev)
{
    global $conn;

    $materii = [];

    $materiiQuery = "   SELECT DISTINCT materie.id_materie, materie.denumire
                        FROM `materie`
                        INNER JOIN ora_de_curs
                        ON materie.id_materie = ora_de_curs.id_materie
                        INNER JOIN clasa_elev
                        ON ora_de_curs.id_clasa = clasa_elev.id_clasa
                        AND clasa_elev.id_user = ?
                        ORDER BY `denumire`";

    $stmt = $conn->prepare($materiiQuery);
    $stmt->bind_param('i', $idElev);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $materii[] = [
                'idMaterie' => $row[0],
                'denumire' => $row[1]
            ];
        }
    }
    $stmt->close();

    return $materii;
}

function extrageTaskuri()
{

    global $conn;

    $taskuri = [];

    $materiiQuery = "SELECT id_task, denumire, data_inceput, data_sfarsit, ora_inceput, ora_sfarsit, toata_ziua, link, tip 
                     FROM `task` 
                     WHERE id_user = ?
                     ORDER BY `data_inceput`, `ora_inceput`";
    $stmt = $conn->prepare($materiiQuery);
    $idUser = $_SESSION['userId'];
    $stmt->bind_param('i', $idUser);

    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $taskuri[] = [
                'id' => $row[0],
                'denumire' => $row[1],
                'data_inceput' => $row[2],
                'data_sfarsit' => $row[3],
                'ora_inceput' => $row[4],
                'ora_sfarsit' => $row[5],
                'toata_ziua' => $row[6],
                'link' => $row[7],
                'tip' => $row[8]
            ];
        }
    }
    $stmt->close();

    return $taskuri;
}

function extrageUltimaPozitie($tag)
{

    global $conn;

    $pozitieQuery = "SELECT pozitie 
                    FROM intent 
                    WHERE tag=? 
                    ORDER BY pozitie DESC 
                    LIMIT 1;";
    $stmt = $conn->prepare($pozitieQuery);
    $tag = strtolower($tag);
    $stmt->bind_param('s', $tag);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_row($result);
    if ($row) {
        $ultimaPozitie = $row[0];
    }
    $stmt->close();

    return  isset($ultimaPozitie)  ?  $ultimaPozitie  : null;
}

function inserareMesaj($mesaj, $userId, $data, $ora, $clasa)
{
    global $conn;

    $mesaj = clearText($mesaj);

    $insert = "INSERT INTO `mesaj_user` (id_user, mesaj, data_mesaj, ora_mesaj, id_clasa) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert);
    $stmt->bind_param('isssi', $userId, $mesaj, $data, $ora, $clasa);

    if (!$stmt->execute()) {
        die($stmt->error);
    }

    $stmt->close();

    return true;
}

function inserareProfesor($nume, $email, $telefon, $pass)
{

    global $conn;

    // inserare profesor in db
    if ($nume && $email && $telefon && $pass) {
        $insert = " INSERT INTO `user` (nume, email, telefon, parola, tip_cont, id_scoala) 
            VALUES (?, ?, ?, ?, ?, ?) ";
        $stmt = $conn->prepare($insert);
        $tip_cont = PROFESOR;
        $id_scoala = $_SESSION['idScoala'];
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $stmt->bind_param('ssssii', $nume, $email, $telefon, $pass, $tip_cont, $id_scoala);
        if ($stmt->execute()) {
            echo ('success');
        } else {
            echo ('Email existent!');
        }

        $stmt->close();
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function inserareElev($nume, $email, $telefon, $clasa, $pass)
{

    global $conn;

    // inserare elev in db
    if ($nume && $email && $telefon && $pass) {
        $insertElev = " INSERT INTO `user` (nume, email, telefon, parola, tip_cont, id_scoala) 
            VALUES (?, ?, ?, ?, ?, ?) ";
        $stmt = $conn->prepare($insertElev);
        $tipCont = ELEV;
        $idScoala = $_SESSION['idScoala'];
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $stmt->bind_param('ssssii', $nume, $email, $telefon, $pass, $tipCont, $idScoala);
        if ($stmt->execute()) {
            $idElev = $conn->insert_id;
            inserareClasaElev($idElev, $clasa, $idScoala);
            echo ('success');
        } else {
            echo ('Email existent!');
        }

        $stmt->close();
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function inserareClasaElev($idElev, $clasa, $idScoala)
{
    global $conn;

    if ($idElev && $clasa && $idScoala) {
        $insertClasaElev = " INSERT INTO `clasa_elev` (id_clasa, id_user, id_scoala) 
            VALUES (?, ?, ?) ";
        $stmt = $conn->prepare($insertClasaElev);

        $stmt->bind_param('iii', $clasa, $idElev, $idScoala);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function inserareParinte($nume, $email, $telefon, $pass, $idElev)
{
    global $conn;

    // inserare elev in db
    if ($nume && $email && $telefon && $pass) {
        $insertParinte = " INSERT INTO `user` (nume, email, telefon, parola, tip_cont, id_scoala) 
            VALUES (?, ?, ?, ?, ?, ?) ";
        $stmt = $conn->prepare($insertParinte);
        $tipCont = PARINTE;
        $idScoala = $_SESSION['idScoala'];
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $stmt->bind_param('ssssii', $nume, $email, $telefon, $pass, $tipCont, $idScoala);
        if ($stmt->execute()) {
            $idParinte = $conn->insert_id;
            inserareParinteElev($idParinte, $idElev);
            echo ('success');
        } else {
            echo ('Email existent!');
        }

        $stmt->close();
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function inserareParinteElev($idParinte, $idElev)
{
    global $conn;

    if ($idParinte && $idElev) {
        $insertParinteElev = " INSERT INTO `parinte_elev` (id_parinte, id_elev) 
            VALUES (?, ?) ";
        $stmt = $conn->prepare($insertParinteElev);

        $stmt->bind_param('ii', $idParinte, $idElev);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function inserareClasa($an, $litera)
{

    global $conn;

    // inserare clasa in db
    if ($an && $litera) {

        if (!existaClasa($an, $litera)) {
            $insert = " INSERT INTO `clasa` (an, litera, id_scoala) 
            VALUES (?, ?, ?) ";

            $stmt = $conn->prepare($insert);
            $id_scoala = $_SESSION['idScoala'];

            $stmt->bind_param('isi', $an, $litera, $id_scoala);
            if ($stmt->execute()) {
                echo ('success');
                $stmt->close();
            }
        } else {
            echo "exista";
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function inserareMaterie($materie)
{

    global $conn;

    // inserare clasa in db
    if ($materie) {

        if (!existaMaterie($materie)) {
            $insert = " INSERT INTO `materie` (denumire) 
            VALUES (?) ";

            $stmt = $conn->prepare($insert);

            $stmt->bind_param('s', $materie);
            if ($stmt->execute()) {
                echo ('success');
                $stmt->close();
            }
        } else {
            echo "exista";
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function inserareOra($materie, $clasa, $zi, $ora)
{

    global $conn;

    // inserare clasa in db
    if ($materie && $clasa && $zi && $ora) {

        $insert = " INSERT INTO `ora_de_curs` (id_profesor, id_materie, id_clasa, zi, ora) 
            VALUES (?, ?, ?, ?, ?) ";

        $stmt = $conn->prepare($insert);
        $idProfesor = $_SESSION['userId'];
        $stmt->bind_param('iiiis', $idProfesor, $materie, $clasa, $zi, $ora);
        if ($stmt->execute()) {
            echo ('success');
            $stmt->close();
        } else {
            echo "exista";
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function inserareProfmat($profesor, $materie)
{
    global $conn;

    // inserare clasa in db
    if ($materie) {

        if (!existaProfmat($profesor, $materie)) {
            $insert = " INSERT INTO `prof_materie` (id_user, id_materie) 
            VALUES (?, ?) ";

            $stmt = $conn->prepare($insert);

            $stmt->bind_param('ii', $profesor, $materie);
            if ($stmt->execute()) {
                echo ('success');
                $stmt->close();
            }
        } else {
            echo "exista";
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function inserareIntentTagExistent($tag, $intrebare, $raspuns)
{
    global $conn;

    // inserare intent in db
    if ($tag && $intrebare && $raspuns) {

        $insert = " INSERT INTO `intent` (tag, pozitie, intrebare, raspuns, id_user) 
            VALUES (?, ?, ?, ?, ?) ";

        $stmt = $conn->prepare($insert);
        $pozitie = extrageUltimaPozitie($tag) + 1;
        $idUser = $_SESSION['userId'];
        $stmt->bind_param('sissi', $tag, $pozitie, $intrebare, $raspuns, $idUser);
        if ($stmt->execute()) {
            echo ('success');
            $stmt->close();
        } else {
            echo ('errExista');
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function inserareIntentTagNou($tag, $intrebare, $raspuns)
{
    global $conn;

    // inserare intent in db
    if ($tag && $intrebare && $raspuns) {

        $insert = " INSERT INTO `intent` (tag, pozitie, intrebare, raspuns, id_user) 
            VALUES (?, ?, ?, ?, ?) ";

        $stmt = $conn->prepare($insert);
        $pozitie = 1;
        $idUser = $_SESSION['userId'];
        $stmt->bind_param('sissi', $tag, $pozitie, $intrebare, $raspuns, $idUser);
        if ($stmt->execute()) {
            echo ('success');
            $stmt->close();
        } else {
            echo ('errNuExista');
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function inserareTask($denumire, $toataZiua, $dataInceput, $dataSfarsit, $oraInceput, $oraSfarsit, $url, $tip)
{
    global $conn;

    // inserare task in db
    $insert = " INSERT INTO `task` (denumire, data_inceput, data_sfarsit, ora_inceput, ora_sfarsit, toata_ziua, link, tip, id_user) 
            VALUES (?, ?, NULLIF(?,''), ?,  NULLIF(?,''),  NULLIF(?,''),  NULLIF(?,''), ?, ?) ";

    $stmt = $conn->prepare($insert);
    $idUser = $_SESSION['userId'];

    $stmt->bind_param('sssssissi', $denumire, $dataInceput, $dataSfarsit, $oraInceput, $oraSfarsit, $toataZiua, $url, $tip, $idUser);
    if ($stmt->execute()) {
        echo ('success');
        $stmt->close();
    } else {
        echo ('errExista');
    }
}

function inserareNota($elev, $nota, $data, $idMaterie, $idProfesor)
{
    global $conn;

    // inserare clasa in db
    if ($elev && $nota && $data && $idMaterie && $idProfesor) {

        $insert = " INSERT INTO `nota` (id_elev, id_materie, id_profesor, nota, data) 
            VALUES (?, ?, ?, ?, ?) ";

        $stmt = $conn->prepare($insert);
        $idProfesor = $_SESSION['userId'];
        $stmt->bind_param('iiiis', $elev, $idMaterie, $idProfesor, $nota, $data);
        if ($stmt->execute()) {
            echo ('success');
            $stmt->close();
        } else {
            echo "exista";
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function editareUser($idUser, $nume, $email, $telefon, $pass)
{

    global $conn;

    // update profesor
    if ($idUser && $nume && $email && $telefon && $pass) {
        $update = " UPDATE `user` SET nume=?, email=?, telefon=?, parola=?
                    WHERE id_user=?";
        $stmt = $conn->prepare($update);
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $stmt->bind_param('ssssi', $nume, $email, $telefon, $pass, $idUser);
        if ($stmt->execute()) {
            echo ('success');
        } else {
            echo ('Email existent!');
        }

        $stmt->close();
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function editareUserFaraPass($idUser, $nume, $email, $telefon)
{

    global $conn;

    // update profesor
    if ($idUser && $nume && $email && $telefon) {
        $update = " UPDATE `user` SET nume=?, email=?, telefon=?
                    WHERE id_user=?";
        $stmt = $conn->prepare($update);

        $stmt->bind_param('sssi', $nume, $email, $telefon, $idUser);
        if ($stmt->execute()) {
            echo ('success');
        } else {
            echo ('Email existent!');
        }

        $stmt->close();
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function editareClasa($an, $litera, $anNou, $literaNoua)
{

    global $conn;

    // update clasa
    if ($an && $litera && $anNou && $literaNoua) {

        if (!existaClasa($anNou, $literaNoua)) {
            $update = " UPDATE `clasa` SET an=?, litera=?
                    WHERE id_scoala=? AND an=? AND litera=?";

            $stmt = $conn->prepare($update);
            $idScoala = $_SESSION['idScoala'];

            $stmt->bind_param('isiis', $anNou, $literaNoua, $idScoala, $an, $litera);
            if ($stmt->execute()) {
                echo ('success');
                $stmt->close();
            }
        } else {
            echo "exista";
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function editareMaterie($materie, $materieNou)
{
    global $conn;

    if ($materie && $materieNou) {

        if (!existaMaterie($materieNou)) {
            $update = " UPDATE `materie` SET denumire=?
                        WHERE id_materie=?";

            $stmt = $conn->prepare($update);

            $stmt->bind_param('si', $materieNou, $materie);
            if ($stmt->execute()) {
                echo ('success');
                $stmt->close();
            }
        } else {
            echo "exista";
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function stergereProfmat($profesor, $materie)
{

    global $conn;

    if ($profesor && $materie) {

        $delete = " DELETE FROM `prof_materie`
                    WHERE id_user=? AND id_materie=?";

        $stmt = $conn->prepare($delete);

        $stmt->bind_param('ii', $profesor, $materie);
        if ($stmt->execute()) {
            echo ('success');
            $stmt->close();
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function stergereMaterie($materie)
{

    global $conn;

    if ($materie) {

        $delete = " DELETE FROM `materie`
                    WHERE id_materie=?";

        $stmt = $conn->prepare($delete);

        $stmt->bind_param('i', $materie);
        if ($stmt->execute()) {
            echo ('success');
            $stmt->close();
        } else {
            echo ('err');
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function stergereClasa($an, $litera)
{

    global $conn;

    if ($an && $litera) {

        $delete = " DELETE FROM `clasa`
                    WHERE id_scoala=? AND an=? AND litera=?";

        $stmt = $conn->prepare($delete);
        $idScoala = $_SESSION['idScoala'];

        $stmt->bind_param('iis', $idScoala, $an, $litera);
        if ($stmt->execute()) {
            echo ('success');
            $stmt->close();
        } else {
            echo ('err');
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function stergereParinte($parinte)
{
    global $conn;

    if ($parinte) {

        $delete1 = " DELETE FROM `user`
                     WHERE id_user=?";
        $delete2 = " DELETE FROM `parinte_elev`
                     WHERE id_parinte=?";

        $stmt1 = $conn->prepare($delete1);
        $stmt2 = $conn->prepare($delete2);

        $stmt1->bind_param('i', $parinte);
        $stmt2->bind_param('i', $parinte);
        if ($stmt1->execute() && $stmt2->execute()) {
            echo ('success');
            $stmt1->close();
            $stmt2->close();
        } else {
            echo ('err');
        }
    } else {
        echo "Eroare la inserarea in baza de date!";
    }
}

function stergereProfesor($profesor)
{
    global $conn;

    if ($profesor) {

        $delete1 = " DELETE FROM `user`
                     WHERE id_user=?";
        $delete2 = " DELETE FROM `prof_materie`
                     WHERE id_user=?";

        $stmt1 = $conn->prepare($delete1);
        $stmt2 = $conn->prepare($delete2);

        $stmt1->bind_param('i', $profesor);
        $stmt2->bind_param('i', $profesor);
        if ($stmt1->execute() && $stmt2->execute()) {
            echo ('success');
            $stmt1->close();
            $stmt2->close();
        } else {
            echo ('err');
        }
    } else {
        echo "Eroare la stergerea din baza de date!";
    }
}

function stergereElev($elev)
{
    global $conn;

    if ($elev) {

        $idParinte = getParinte($elev);

        $delete1 = " DELETE FROM `user`
                     WHERE id_user=?; ";
        $delete2 = " DELETE FROM `clasa_elev`
                     WHERE id_user=?";
        $delete3 = " DELETE FROM `parinte_elev`
                     WHERE id_elev=?";


        $stmt1 = $conn->prepare($delete1);
        $stmt2 = $conn->prepare($delete2);
        $stmt3 = $conn->prepare($delete3);

        $stmt1->bind_param('i', $elev);
        $stmt2->bind_param('i', $elev);
        $stmt3->bind_param('i', $elev);
        if ($stmt1->execute() && $stmt2->execute() && $stmt3->execute()) {
            if ($idParinte) {
                stergereParinte($idParinte);
            }
            $stmt1->close();
            $stmt2->close();
            $stmt3->close();
        } else {
            echo ('err');
        }
    } else {
        echo "Eroare la stergerea din baza de date!";
    }
}

function existaClasa($an, $litera)
{

    global $conn;

    if ($an && $litera) {
        $check = "SELECT id_clasa FROM clasa WHERE id_scoala=? AND an=? AND litera=?";
        $stmt1 = $conn->prepare($check);
        $id_scoala = $_SESSION['idScoala'];
        $stmt1->bind_param('iis', $id_scoala, $an, $litera);
        $stmt1->execute();
        $result = $stmt1->get_result();

        if (mysqli_num_rows($result) == 0) {
            $stmt1->close();
            return false;
        }
        $stmt1->close();
        return true;
    }
}

function existaMaterie($materie)
{

    global $conn;

    if ($materie) {
        $check = "SELECT id_materie FROM materie WHERE denumire=?";
        $stmt1 = $conn->prepare($check);
        $stmt1->bind_param('s', $materie);
        $stmt1->execute();
        $result = $stmt1->get_result();

        if (mysqli_num_rows($result) == 0) {
            $stmt1->close();
            return false;
        }
        $stmt1->close();
        return true;
    }
}

function existaProfmat($profesor, $materie)
{
    global $conn;

    if ($materie) {
        $check = "SELECT id_user FROM prof_materie WHERE id_user=? AND id_materie=?";
        $stmt1 = $conn->prepare($check);
        $stmt1->bind_param('ii', $profesor, $materie);
        $stmt1->execute();
        $result = $stmt1->get_result();

        if (mysqli_num_rows($result) == 0) {
            $stmt1->close();
            return false;
        }
        $stmt1->close();
        return true;
    }
}

function updateFiserIntents()
{
    $intents = getIntents();

    if (file_exists("intents.json")) {
        unlink("intents.json");
    }
    $myfile = fopen(BASE_FOLDER . "/chatbotBrain/intents.json", "w");

    $intentObjects = [];

    $date = "{'intents':[";

    while ($intents) {
        $firstTag = array_values($intents)[0]['tag'];
        $intrebari = [];
        $raspunsuri = [];
        $intentjson = '';

        foreach ($intents as $elementKey => $element) {
            foreach ($element as $valueKey => $value) {
                if ($valueKey == 'tag' && $value == $firstTag) {
                    $intrebari[] = $element['intrebare'];
                    $raspunsuri[] = $element['raspuns'];
                    unset($intents[$elementKey]);
                }
            }
        }

        $intentjson .= "{'tag': '" . $firstTag . "',";
        $intentjson .= "'patterns': [ ";
        $intentjson .= "'" . implode("', '", $intrebari) . "'";

        $intentjson .= " ],";
        $intentjson .= "'responses': [ ";
        $intentjson .= "'" . implode("', '", $raspunsuri) . "'";
        $intentjson .= " ]}";

        $intentObjects[] = $intentjson;

        $intrebari = [];
        $raspunsuri = [];
    }

    $date .= implode(",", $intentObjects);
    $date .= "]}";
    $date = str_replace("'", '"', $date);

    fwrite($myfile, $date);

    fclose($myfile);


    /*

        $vect = [];

        $vect['asd'] = 'sd';
        $vect['asd']['sdsds'] = 'wewe';

        $stringJson = json_encode($vect);
        $arrayJson = json_decode($stringJson, true);

        file_put_contents("asd.txt", $stringJson);

        $content = file_get_contents("asd.txt");

    */
}

function getNoteElevByMaterie($elevId, $materieId)
{

    global $conn;

    $note = [];
    $noteQuery = "SELECT id_materie, nota, data
                    FROM nota
                    WHERE id_elev = ?
                    AND id_materie = ?";

    $stmt = $conn->prepare($noteQuery);
    $stmt->bind_param('ii', $elevId, $materieId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $note[] = [
                "id_materie"    => $row[0],
                "nota"          => $row[1],
                "data"          => $row[2]
            ];
        }
    }
    $stmt->close();
    return $note;
}


function getListaNoteEleviByCLasa($clasaId, $materieId)
{

    $lista = [];

    $lista[] = extrageElevi($clasaId);

    for ($i = 0; $i < count($lista[0]); $i++) {
        $lista[0][$i]['note'] = getNoteElevByMaterie($lista[0][$i]['idUser'], $materieId);
    }

    return $lista;
}

function getListaNoteElevById($idElev)
{

    $lista = [];

    $lista[] = extrageMateriiElev($idElev);

    for ($i = 0; $i < count($lista[0]); $i++) {
        $lista[0][$i]['note'] = getNoteElevByMaterie($idElev, $lista[0][$i]['idMaterie']);
    }

    return $lista;
}
