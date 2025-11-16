<?php
$liczba_mieszkancow = isset($_REQUEST['liczba_mieszkancow']) ? $_REQUEST['liczba_mieszkancow'] : '';
$a_charakterystyka_mieszkancow = isset($_REQUEST['a_charakterystyka_mieszkancow']) ? $_REQUEST['a_charakterystyka_mieszkancow'] : '';
$tryb_zycia = isset($_REQUEST['tryb_zycia']) ? $_REQUEST['tryb_zycia'] : '';
$zainteresowania = isset($_REQUEST['zainteresowania']) ? $_REQUEST['zainteresowania'] : '';
$informacje_dodatkowe = isset($_REQUEST['informacje_dodatkowe']) ? $_REQUEST['informacje_dodatkowe'] : '';
$zwierzeta = isset($_REQUEST['zwierzeta']) ? $_REQUEST['zwierzeta'] : '';

$ilosc_noworodek = isset($_REQUEST['ilosc_noworodek']) ? $_REQUEST['ilosc_noworodek'] : '';
$ilosc_niemowle = isset($_REQUEST['ilosc_niemowle']) ? $_REQUEST['ilosc_niemowle'] : '';
$ilosc_dziecko_1_3 = isset($_REQUEST['ilosc_dziecko_1_3']) ? $_REQUEST['ilosc_dziecko_1_3'] : '';
$ilosc_dziecko_przedszkole = isset($_REQUEST['ilosc_dziecko_przedszkole']) ? $_REQUEST['ilosc_dziecko_przedszkole'] : '';
$ilosc_dziecko_szkola = isset($_REQUEST['ilosc_dziecko_szkola']) ? $_REQUEST['ilosc_dziecko_szkola'] : '';
$ilosc_nastolatek = isset($_REQUEST['ilosc_nastolatek']) ? $_REQUEST['ilosc_nastolatek'] : '';
$ilosc_student = isset($_REQUEST['ilosc_student']) ? $_REQUEST['ilosc_student'] : '';
$ilosc_dorosly = isset($_REQUEST['ilosc_dorosly']) ? $_REQUEST['ilosc_dorosly'] : '';
$ilosc_osoba_starsza = isset($_REQUEST['ilosc_osoba_starsza']) ? $_REQUEST['ilosc_osoba_starsza'] : '';
$ilosc_osoba_niepelnosprawna = isset($_REQUEST['ilosc_osoba_niepelnosprawna']) ? $_REQUEST['ilosc_osoba_niepelnosprawna'] : '';

if ($wstecz != "true") {
    $SQL = [];
    //tresc zapytan
    array_push($SQL, "UPDATE a_charakterystyka_mieszkancow SET liczba_mieszkancow = '" . $liczba_mieszkancow . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_charakterystyka_mieszkancow SET a_charakterystyka_mieszkancow = '" . $a_charakterystyka_mieszkancow . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_charakterystyka_mieszkancow SET tryb_zycia = '" . $tryb_zycia . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_charakterystyka_mieszkancow SET zainteresowania = '" . $zainteresowania . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_charakterystyka_mieszkancow SET informacje_dodatkowe = '" . $informacje_dodatkowe . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_charakterystyka_mieszkancow SET zwierzeta = '" . $zwierzeta . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_przedzial_wiekowy_mieszkancow SET noworodek = " . $ilosc_noworodek . " WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_przedzial_wiekowy_mieszkancow SET niemowle = " . $ilosc_niemowle . " WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_przedzial_wiekowy_mieszkancow SET dziecko_1_3 = " . $ilosc_dziecko_1_3 . " WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_przedzial_wiekowy_mieszkancow SET dziecko_przedszkole = " . $ilosc_dziecko_przedszkole . " WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_przedzial_wiekowy_mieszkancow SET dziecko_szkola = " . $ilosc_dziecko_szkola . " WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_przedzial_wiekowy_mieszkancow SET nastolatek = " . $ilosc_nastolatek . " WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_przedzial_wiekowy_mieszkancow SET student = " . $ilosc_student . " WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_przedzial_wiekowy_mieszkancow SET dorosly = " . $ilosc_dorosly . " WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_przedzial_wiekowy_mieszkancow SET osoba_starsza = " . $ilosc_osoba_starsza . " WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_przedzial_wiekowy_mieszkancow SET osoba_niepelnosprawna = " . $ilosc_osoba_niepelnosprawna . " WHERE ankietaID = " . $ankietaID . ";");

    //wykonanie zapytan
    for ($s = 0; $s < count($SQL); $s++) mysqli_query($conn, $SQL[$s]);
}
