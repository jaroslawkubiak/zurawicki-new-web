<?php
$imie_nazwisko = isset($_REQUEST['imie_nazwisko']) ? $_REQUEST['imie_nazwisko'] : '';
$telefon = isset($_REQUEST['telefon']) ? $_REQUEST['telefon'] : '';
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$etap_inwestycji = isset($_REQUEST['etap_inwestycji']) ? $_REQUEST['etap_inwestycji'] : '';
$rodzaj_budynku = isset($_REQUEST['rodzaj_budynku']) ? $_REQUEST['rodzaj_budynku'] : '';

$ilosc_kuchnia = isset($_REQUEST['ilosc_kuchnia']) ? $_REQUEST['ilosc_kuchnia'] : '';
$ilosc_salon = isset($_REQUEST['ilosc_salon']) ? $_REQUEST['ilosc_salon'] : '';
$ilosc_lazienka = isset($_REQUEST['ilosc_lazienka']) ? $_REQUEST['ilosc_lazienka'] : '';
$ilosc_toaleta = isset($_REQUEST['ilosc_toaleta']) ? $_REQUEST['ilosc_toaleta'] : '';
$ilosc_sypialnia = isset($_REQUEST['ilosc_sypialnia']) ? $_REQUEST['ilosc_sypialnia'] : '';
$ilosc_garderoba = isset($_REQUEST['ilosc_garderoba']) ? $_REQUEST['ilosc_garderoba'] : '';
$ilosc_pokoj_dzieciecy = isset($_REQUEST['ilosc_pokoj_dzieciecy']) ? $_REQUEST['ilosc_pokoj_dzieciecy'] : '';
$ilosc_hol = isset($_REQUEST['ilosc_hol']) ? $_REQUEST['ilosc_hol'] : '';
$inne = isset($_REQUEST['inne']) ? $_REQUEST['inne'] : '';
$inne_opis = isset($_REQUEST['inne_opis']) ? $_REQUEST['inne_opis'] : '';

if ($wstecz != "true") {
    $SQL = [];
    //tresc zapytan
    array_push($SQL, "UPDATE a_naglowek SET imie_nazwisko = '" . $imie_nazwisko . "' WHERE id = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_naglowek SET telefon = '" . $telefon . "' WHERE id = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_naglowek SET email = '" . $email . "' WHERE id = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_naglowek SET rodzaj_budynku = '" . $rodzaj_budynku . "' WHERE id = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_naglowek SET etap_inwestycji = '" . $etap_inwestycji . "' WHERE id = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_projektowane_pomieszczenia SET kuchnia = '" . $ilosc_kuchnia . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_projektowane_pomieszczenia SET salon = '" . $ilosc_salon . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_projektowane_pomieszczenia SET lazienka = '" . $ilosc_lazienka . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_projektowane_pomieszczenia SET toaleta = '" . $ilosc_toaleta . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_projektowane_pomieszczenia SET sypialnia = '" . $ilosc_sypialnia . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_projektowane_pomieszczenia SET garderoba = '" . $ilosc_garderoba . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_projektowane_pomieszczenia SET pokoj_dzieciecy = '" . $ilosc_pokoj_dzieciecy . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_projektowane_pomieszczenia SET hol = '" . $ilosc_hol . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_projektowane_pomieszczenia SET inne = '" . $inne . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_projektowane_pomieszczenia SET inne_opis = '" . $inne_opis . "' WHERE ankietaID = " . $ankietaID . ";");
    
    //wykonanie zapytan
    for ($s = 0; $s < count($SQL); $s++) mysqli_query($conn, $SQL[$s]);
}
