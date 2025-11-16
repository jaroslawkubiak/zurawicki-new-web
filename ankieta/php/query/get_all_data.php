<?php
$hash = isset($_REQUEST['hash']) ? $_REQUEST['hash'] : '';

// mamy id ankiety
if ($ankietaID != '') {
    $sql = "SELECT * FROM a_naglowek WHERE id = " . $ankietaID . ";";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
} else if (isset($hash)) {
    $sql = "SELECT * FROM a_naglowek WHERE hash = '" . $hash . "';";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $ankietaID = $row['id'];
}

$sql2 = "SELECT * FROM a_projektowane_pomieszczenia WHERE ankietaID = " . $ankietaID . ";";
$row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));

$sql3 = "SELECT * FROM a_charakterystyka_mieszkancow WHERE ankietaID = " . $ankietaID . ";";
$row3 = mysqli_fetch_assoc(mysqli_query($conn, $sql3));

$sql4 = "SELECT * FROM a_przedzial_wiekowy_mieszkancow WHERE ankietaID = " . $ankietaID . ";";
$row4 = mysqli_fetch_assoc(mysqli_query($conn, $sql4));

$sql5 = "SELECT * FROM a_charakterystyka_pomieszczenia WHERE ankietaID = " . $ankietaID . ";";
$row5 = mysqli_fetch_assoc(mysqli_query($conn, $sql5));

$sql6 = "SELECT * FROM a_aranzacja_wnetrza WHERE ankietaID = " . $ankietaID . ";";
$row6 = mysqli_fetch_assoc(mysqli_query($conn, $sql6));

$sql7 = "SELECT * FROM a_lazienka WHERE ankietaID = " . $ankietaID . ";";
$row7 = mysqli_fetch_assoc(mysqli_query($conn, $sql7));

$sql8 = "SELECT * FROM a_kuchnia WHERE ankietaID = " . $ankietaID . ";";
$row8 = mysqli_fetch_assoc(mysqli_query($conn, $sql8));
