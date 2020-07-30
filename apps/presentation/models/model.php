<?php

function getListaJudete()
{
    //referirea conexiunii globale
    global $conn;

    $judete = [];
    $judeteQuery = "SELECT DISTINCT `judet` FROM `scoala` ORDER BY `judet`";
    $stmt = $conn->prepare($judeteQuery);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $judete[] = $row[0];
        }
    }
    $stmt->close();

    return $judete;
}


function getOrase($judetSelectat)
{
    //referirea conexiunii globale
    global $conn;

    $orase = [];

    $oraseQuery = "SELECT DISTINCT `localitate` FROM `scoala` WHERE judet=? ORDER BY `localitate`";
    $stmt = $conn->prepare($oraseQuery);
    $stmt->bind_param('s', $judetSelectat);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $orase[] = $row[0];
        }
    }
    $stmt->close();

    return $orase;
}

function getScoli($judetSelectat, $orasSelectat)
{
    //referirea conexiunii globale
    global $conn;

    $scoliQuery = "SELECT DISTINCT `denumire` FROM `scoala` WHERE localitate=? AND judet=? ORDER BY `denumire`";
    $stmt = $conn->prepare($scoliQuery);
    $stmt->bind_param('ss', $orasSelectat, $judetSelectat);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $scoli[] = $row[0];
        }
    }
    $stmt->close();

    return $scoli;
}

function getIdScoala($scoalaSelectata, $orasSelectat, $judetSelectat)
{
    // referirea conexiunii globale
    global $conn;

    $scoliQuery = "SELECT `id_scoala` FROM `scoala` WHERE denumire=? AND localitate=? AND judet=?";
    $stmt = $conn->prepare($scoliQuery);
    // efectuare binding
    $stmt->bind_param('sss', $scoalaSelectata, $orasSelectat, $judetSelectat);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_row($result);
    $id_scoala = $row[0];

    $stmt->close();

    return $id_scoala;
}