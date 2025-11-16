<?php
  //łazienka - lista checkboxów
  $lazienka_name = [];
  array_push($lazienka_name, 'wanna_w_zabudowie', 'wanna_wolnostojaca', 'wanna_z_funkcja_prysznica', 'wanna_z_hydromasazem', 'kabina_prysznicowa', 'kabina_walk_in', 'brodzik', 'odwodnienie_liniowe', 'sluchawka', 'deszczownica', 'umywalka_nablatowa', 'umywalka_podblatowa', 'umywalka_meblowa', 'bateria_podtynkowa', 'bateria_stojaca', 'miska_stojaca', 'miska_podwieszana', 'toaleta_myjaca', 'bidet', 'pisuar', 'pralka', 'suszarka', 'pralko_suszarka', 'lustro', 'lustro_mata_grzewcza', 'lustro_z_podswietleniem', 'grzejnik_drabinkowy', 'grzejnik_drabinkowy_grzalka', 'grzejnik_drabinkowy_elektryczny', 'ogrzewanie_podlogowe');
  $lazienka_label = [];
  array_push($lazienka_label, 'Wanna w zabudowie', 'Wanna wolnostojąca', 'Wanna z funkcją prysznica', 'Wanna z hydromasażem', 'Kabina prysznicowa', 'Kabina prysznicowa typu walk-in', 'Brodzik', 'Odwodnienie liniowe', 'Słuchawka prysznicowa', 'Deszczownica', 'Umywalka nablatowa', 'Umywalka podblatowa', 'Umywalka meblowa', 'Bateria podtynkowa', 'Bateria stojacą', 'Miska wc stojacą', 'Miska wc podwieszana', 'Toaleta myjąca', 'Bidet', 'Pisuar', 'Pralka', 'Suszarka', 'Pralko-suszarka', 'Lustro', 'Lustro z matą grzewczą', 'Lustro z podświetleniem', 'Grzejnik drabinkowy', 'Grzejnik drabinkowy z grzałką', 'Grzejnik drabinkowy elektryczny', 'Ogrzewanie podłogowe');
  $lazienka_checked = [];
  array_push($lazienka_checked, $row7['wanna_w_zabudowie'], $row7['wanna_wolnostojaca'], $row7['wanna_z_funkcja_prysznica'], $row7['wanna_z_hydromasazem'], $row7['kabina_prysznicowa'],  $row7['kabina_walk_in'], $row7['brodzik'], $row7['odwodnienie_liniowe'], $row7['sluchawka'], $row7['deszczownica'], $row7['umywalka_nablatowa'], $row7['umywalka_podblatowa'], $row7['umywalka_meblowa'], $row7['bateria_podtynkowa'], $row7['bateria_stojaca'], $row7['miska_stojaca'], $row7['miska_podwieszana'], $row7['toaleta_myjaca'], $row7['bidet'], $row7['pisuar'], $row7['pralka'], $row7['suszarka'], $row7['pralko_suszarka'], $row7['lustro'], $row7['lustro_mata_grzewcza'], $row7['lustro_z_podswietleniem'], $row7['grzejnik_drabinkowy'], $row7['grzejnik_drabinkowy_grzalka'], $row7['grzejnik_drabinkowy_elektryczny'], $row7['ogrzewanie_podlogowe']);
?>


<div class="form-row">
  <span class="form-num-field">22</span>
  <label for="stylLazienka" class="form-text-label">ŁAZIENKA
    <span class="form-additional-info">Zaznacz właściwe elementy oraz sprzęty, które mają być uwzględnione w projekcie</span></label>
  <div class="form-list-wrapper form--grid-2-cols">
    <ul id="stylLazienka" class="form-list grid-2-cols">
    <?php
      for($i = 0; $i < count($lazienka_name); $i++) {
        drawCheckbox('lazienka', $i, $lazienka_checked[$i], $lazienka_name[$i], $lazienka_label[$i], $disabled); //, $renderuj_dodatek, $row7
      }
    echo '</ul>';
  echo '</div>';

  echo '<div class="form--grid-2-cols">';
  // dodatkowe pytania do łazienki
  drawSubTextarea('lazienka_inne', 'Inne', $row7['inne'], $readonly);
  
  drawSubTextarea('lazienka_inne_1', 'Czy istnieje potrzeba wydzielenia przestrzeni gospodarczej: na ręczniki, detergenty, mopa, wiadro itp.?', $row7['inne_1'], $readonly);
  
  drawSubTextarea('lazienka_inne_2', 'Z jakiego drobnego sprzętu AGD będą korzystać mieszkańcy w łazience? np.: suszarka, golarka,
  szczoteczka elektryczna, prostownica, lokówka; będzie miało to wpływ na ilość potrzebnych gniazdek elektrycznych.', $row7['inne_2'], $readonly);

  drawSubTextarea('lazienka_inne_3', 'Czy preferują Państwo konkternych producentów armatury, ceramiki, mebli? Czy meble mają być wykonane „na wymiar”?', $row7['inne_3'], $readonly);
  echo '</div> ';
echo '</div>';
?>