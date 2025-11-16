<?php
$elektryka_hydraulika = isset($_REQUEST['elektryka_hydraulika']) ? $_REQUEST['elektryka_hydraulika'] : '';
$rodzaj_ogrzewania = isset($_REQUEST['rodzaj_ogrzewania']) ? $_REQUEST['rodzaj_ogrzewania'] : '';
$konstrukcja_pomieszczenia = isset($_REQUEST['konstrukcja_pomieszczenia']) ? $_REQUEST['konstrukcja_pomieszczenia'] : '';
$inteligentny_dom = isset($_REQUEST['inteligentny_dom']) ? $_REQUEST['inteligentny_dom'] : '';

if ($wstecz != "true") {
    $SQL = [];
    //tresc zapytan
    array_push($SQL, "UPDATE a_charakterystyka_pomieszczenia SET elektryka_hydraulika = '" . $elektryka_hydraulika . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_charakterystyka_pomieszczenia SET rodzaj_ogrzewania = '" . $rodzaj_ogrzewania . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_charakterystyka_pomieszczenia SET konstrukcja_pomieszczenia = '" . $konstrukcja_pomieszczenia . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_charakterystyka_pomieszczenia SET inteligentny_dom = '" . $inteligentny_dom . "' WHERE ankietaID = " . $ankietaID . ";");

    //wykonanie zapytan
    for ($s = 0; $s < count($SQL); $s++) mysqli_query($conn, $SQL[$s]);
}
