<?php
    $lazienka_inne = isset($_REQUEST['lazienka_inne']) ? $_REQUEST['lazienka_inne'] : '';
    $lazienka_inne_1 = isset($_REQUEST['lazienka_inne_1']) ? $_REQUEST['lazienka_inne_1'] : '';
    $lazienka_inne_2 = isset($_REQUEST['lazienka_inne_2']) ? $_REQUEST['lazienka_inne_2'] : '';
    $lazienka_inne_3 = isset($_REQUEST['lazienka_inne_3']) ? $_REQUEST['lazienka_inne_3'] : '';
  
    // łazienka
    $wanna_w_zabudowie = isset($_REQUEST['wanna_w_zabudowie']) ? $_REQUEST['wanna_w_zabudowie'] : '';
    $wanna_wolnostojaca = isset($_REQUEST['wanna_wolnostojaca']) ? $_REQUEST['wanna_wolnostojaca'] : '';
    $wanna_z_funkcja_prysznica = isset($_REQUEST['wanna_z_funkcja_prysznica']) ? $_REQUEST['wanna_z_funkcja_prysznica'] : '';
    $wanna_z_hydromasazem = isset($_REQUEST['wanna_z_hydromasazem']) ? $_REQUEST['wanna_z_hydromasazem'] : '';
    $kabina_prysznicowa = isset($_REQUEST['kabina_prysznicowa']) ? $_REQUEST['kabina_prysznicowa'] : '';
    $kabina_walk_in = isset($_REQUEST['kabina_walk_in']) ? $_REQUEST['kabina_walk_in'] : '';
    $brodzik = isset($_REQUEST['brodzik']) ? $_REQUEST['brodzik'] : '';
    $odwodnienie_liniowe = isset($_REQUEST['odwodnienie_liniowe']) ? $_REQUEST['odwodnienie_liniowe'] : '';
    $sluchawka = isset($_REQUEST['sluchawka']) ? $_REQUEST['sluchawka'] : '';
    $deszczownica = isset($_REQUEST['deszczownica']) ? $_REQUEST['deszczownica'] : '';
    $umywalka_nablatowa = isset($_REQUEST['umywalka_nablatowa']) ? $_REQUEST['umywalka_nablatowa'] : '';
    $umywalka_podblatowa = isset($_REQUEST['umywalka_podblatowa']) ? $_REQUEST['umywalka_podblatowa'] : '';
    $umywalka_meblowa = isset($_REQUEST['umywalka_meblowa']) ? $_REQUEST['umywalka_meblowa'] : '';
    $bateria_podtynkowa = isset($_REQUEST['bateria_podtynkowa']) ? $_REQUEST['bateria_podtynkowa'] : '';
    $bateria_stojaca = isset($_REQUEST['bateria_stojaca']) ? $_REQUEST['bateria_stojaca'] : '';
    $miska_stojaca = isset($_REQUEST['miska_stojaca']) ? $_REQUEST['miska_stojaca'] : '';
    $miska_podwieszana = isset($_REQUEST['miska_podwieszana']) ? $_REQUEST['miska_podwieszana'] : '';
    $toaleta_myjaca = isset($_REQUEST['toaleta_myjaca']) ? $_REQUEST['toaleta_myjaca'] : '';
    $bidet = isset($_REQUEST['bidet']) ? $_REQUEST['bidet'] : '';
    $pisuar = isset($_REQUEST['pisuar']) ? $_REQUEST['pisuar'] : '';
    $pralka = isset($_REQUEST['pralka']) ? $_REQUEST['pralka'] : '';
    $suszarka = isset($_REQUEST['suszarka']) ? $_REQUEST['suszarka'] : '';
    $pralko_suszarka = isset($_REQUEST['pralko_suszarka']) ? $_REQUEST['pralko_suszarka'] : '';
    $lustro = isset($_REQUEST['lustro']) ? $_REQUEST['lustro'] : '';
    $lustro_mata_grzewcza = isset($_REQUEST['lustro_mata_grzewcza']) ? $_REQUEST['lustro_mata_grzewcza'] : '';
    $lustro_z_podswietleniem = isset($_REQUEST['lustro_z_podswietleniem']) ? $_REQUEST['lustro_z_podswietleniem'] : '';
    $grzejnik_drabinkowy = isset($_REQUEST['grzejnik_drabinkowy']) ? $_REQUEST['grzejnik_drabinkowy'] : '';
    $grzejnik_drabinkowy_grzalka = isset($_REQUEST['grzejnik_drabinkowy_grzalka']) ? $_REQUEST['grzejnik_drabinkowy_grzalka'] : '';
    $grzejnik_drabinkowy_elektryczny = isset($_REQUEST['grzejnik_drabinkowy_elektryczny']) ? $_REQUEST['grzejnik_drabinkowy_elektryczny'] : '';
    $ogrzewanie_podlogowe = isset($_REQUEST['ogrzewanie_podlogowe']) ? $_REQUEST['ogrzewanie_podlogowe'] : '';
    
    
if($wstecz != "true") {
    $SQL = [];
    array_push($SQL, "UPDATE a_lazienka SET wanna_w_zabudowie = '".$wanna_w_zabudowie."' WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET wanna_wolnostojaca = '".$wanna_wolnostojaca."' WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET wanna_z_funkcja_prysznica = '".$wanna_z_funkcja_prysznica."' WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET wanna_z_hydromasazem = '".$wanna_z_hydromasazem."' WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET kabina_prysznicowa = '".$kabina_prysznicowa."' WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET kabina_walk_in = '".$kabina_walk_in."' WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET brodzik = '".$brodzik."' WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET odwodnienie_liniowe = '".$odwodnienie_liniowe."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET umywalka_nablatowa = '".$umywalka_nablatowa."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET umywalka_podblatowa = '".$umywalka_podblatowa."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET umywalka_meblowa = '".$umywalka_meblowa."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET bateria_podtynkowa = '".$bateria_podtynkowa."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET bateria_stojaca = '".$bateria_stojaca."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET miska_stojaca = '".$miska_stojaca."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET miska_podwieszana = '".$miska_podwieszana."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET toaleta_myjaca = '".$toaleta_myjaca."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET bidet = '".$bidet."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET pisuar = '".$pisuar."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET pralka = '".$pralka."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET suszarka = '".$suszarka."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET pralko_suszarka = '".$pralko_suszarka."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET lustro = '".$lustro."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET lustro_mata_grzewcza = '".$lustro_mata_grzewcza."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET lustro_z_podswietleniem = '".$lustro_z_podswietleniem."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET grzejnik_drabinkowy = '".$grzejnik_drabinkowy."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET grzejnik_drabinkowy_grzalka = '".$grzejnik_drabinkowy_grzalka."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET grzejnik_drabinkowy_elektryczny = '".$grzejnik_drabinkowy_elektryczny."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET ogrzewanie_podlogowe = '".$ogrzewanie_podlogowe."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET sluchawka = '".$sluchawka."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET deszczownica = '".$deszczownica."'  WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET inne = '".$lazienka_inne."' WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET inne_1 = '".$lazienka_inne_1."' WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET inne_2 = '".$lazienka_inne_2."' WHERE ankietaID = ".$ankietaID.";");
    array_push($SQL, "UPDATE a_lazienka SET inne_3 = '".$lazienka_inne_3."' WHERE ankietaID = ".$ankietaID.";");
    
    //wykonanie zapytan
    for($s=0; $s<count($SQL); $s++) mysqli_query($conn, $SQL[$s]);
}
?>