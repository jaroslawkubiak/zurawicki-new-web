<?php
$budzet = isset($_REQUEST['budzet']) ? $_REQUEST['budzet'] : '';
$uwagi = isset($_REQUEST['uwagi']) ? $_REQUEST['uwagi'] : '';
$wykonawcy = isset($_REQUEST['wykonawcy']) ? $_REQUEST['wykonawcy'] : '';

if ($wstecz != "true") {
    $SQL = [];
    //tresc zapytan
    array_push($SQL, "UPDATE a_naglowek SET budzet = '" . $budzet . "' WHERE id = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_naglowek SET uwagi = '" . $uwagi . "' WHERE id = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_naglowek SET wykonawcy = '" . $wykonawcy . "' WHERE id = " . $ankietaID . ";");

    //wykonanie zapytan
    for ($s = 0; $s < count($SQL); $s++) mysqli_query($conn, $SQL[$s]);
}
