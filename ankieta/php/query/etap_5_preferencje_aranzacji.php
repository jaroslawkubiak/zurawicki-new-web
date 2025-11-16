<?php
$preferowana_kolorystyka = isset($_REQUEST['preferowana_kolorystyka']) ? $_REQUEST['preferowana_kolorystyka'] : '';
$meble_sztuka = isset($_REQUEST['meble_sztuka']) ? $_REQUEST['meble_sztuka'] : '';
$przechowywanie = isset($_REQUEST['przechowywanie']) ? $_REQUEST['przechowywanie'] : '';
$inne = isset($_REQUEST['inne']) ? $_REQUEST['inne'] : '';

//styl wnętrza
$nowoczesny = isset($_REQUEST['nowoczesny']) ? $_REQUEST['nowoczesny'] : '';
$minimalistyczny = isset($_REQUEST['minimalistyczny']) ? $_REQUEST['minimalistyczny'] : '';
$industrialny = isset($_REQUEST['industrialny']) ? $_REQUEST['industrialny'] : '';
$loftowy = isset($_REQUEST['loftowy']) ? $_REQUEST['loftowy'] : '';
$klasyczny = isset($_REQUEST['klasyczny']) ? $_REQUEST['klasyczny'] : '';
$glamour = isset($_REQUEST['glamour']) ? $_REQUEST['glamour'] : '';
$art_deco = isset($_REQUEST['art_deco']) ? $_REQUEST['art_deco'] : '';
$kolonialny = isset($_REQUEST['kolonialny']) ? $_REQUEST['kolonialny'] : '';
$hamptons = isset($_REQUEST['hamptons']) ? $_REQUEST['hamptons'] : '';
$prowansalski = isset($_REQUEST['prowansalski']) ? $_REQUEST['prowansalski'] : '';
$rustykalny = isset($_REQUEST['rustykalny']) ? $_REQUEST['rustykalny'] : '';
$eklektyczny = isset($_REQUEST['eklektyczny']) ? $_REQUEST['eklektyczny'] : '';
$postmodernistyczny = isset($_REQUEST['postmodernistyczny']) ? $_REQUEST['postmodernistyczny'] : '';
$etniczny = isset($_REQUEST['etniczny']) ? $_REQUEST['etniczny'] : '';
$skandynawski = isset($_REQUEST['skandynawski']) ? $_REQUEST['skandynawski'] : '';
$japandi = isset($_REQUEST['japandi']) ? $_REQUEST['japandi'] : '';
$ekologiczny = isset($_REQUEST['ekologiczny']) ? $_REQUEST['ekologiczny'] : '';
$pop_art = isset($_REQUEST['pop_art']) ? $_REQUEST['pop_art'] : '';
$boho = isset($_REQUEST['boho']) ? $_REQUEST['boho'] : '';
$shabby_chic = isset($_REQUEST['shabby_chic']) ? $_REQUEST['shabby_chic'] : '';

if ($wstecz != "true") {
    $SQL = [];
    //tresc zapytan
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET preferowana_kolorystyka = '" . $preferowana_kolorystyka . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET meble_sztuka = '" . $meble_sztuka . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET przechowywanie = '" . $przechowywanie . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET inne = '" . $inne . "' WHERE ankietaID = " . $ankietaID . ";");

    // styl wnętrza
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET nowoczesny = '" . $nowoczesny . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET minimalistyczny = '" . $minimalistyczny . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET industrialny = '" . $industrialny . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET loftowy = '" . $loftowy . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET klasyczny = '" . $klasyczny . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET glamour = '" . $glamour . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET art_deco = '" . $art_deco . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET kolonialny = '" . $kolonialny . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET hamptons = '" . $hamptons . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET prowansalski = '" . $prowansalski . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET rustykalny = '" . $rustykalny . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET eklektyczny = '" . $eklektyczny . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET postmodernistyczny = '" . $postmodernistyczny . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET etniczny = '" . $etniczny . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET skandynawski = '" . $skandynawski . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET japandi = '" . $japandi . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET ekologiczny = '" . $ekologiczny . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET pop_art = '" . $pop_art . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET boho = '" . $boho . "' WHERE ankietaID = " . $ankietaID . ";");
    array_push($SQL, "UPDATE a_aranzacja_wnetrza SET shabby_chic = '" . $shabby_chic . "' WHERE ankietaID = " . $ankietaID . ";");

    //wykonanie zapytan
    for ($s = 0; $s < count($SQL); $s++) mysqli_query($conn, $SQL[$s]);
}
