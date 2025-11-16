<?php
        // lista elementów z dodatkowymi opcjami
        $kuchnia_dodatkowe_checkbox = ['piekarnik_standardowy', 'piekarnik_z_funkcja_mikrofali'];
        $kuchnia_dodatkowe_text = ['kuchenka_gazowa', 'kuchenka_indukcyjna', 'zlewozmywak_nablatowy', 'zlewozmywak_podblatowy','zlewozmywak_jednokomorowy','zlewozmywak_dwukomorowy','zlewozmywak_z_ociekaczem'];
        $kuchnia_dodatkowe_text_label = ['Szerokość/ilość palników', 'Szerokość/ilość palników', 'Preferowany materiał', 'Preferowany materiał', 'Preferowany materiał', 'Preferowany materiał', 'Preferowany materiał'];

        //łazienka - lista checkboxów
        $kuchnia_name = [];
        array_push($kuchnia_name, 'kuchenka_gazowa', 'kuchenka_indukcyjna', 'okap_kuchenny_w_zabudowie','okap_kuchenny_zintegrowany_z_plyta','okap_kuchenny_podblatowy','okap_kuchenny_wiszacy','piekarnik_standardowy','piekarnik_z_funkcja_mikrofali','mikrofalowka_wolnostojaca');
        array_push($kuchnia_name, 'mikrofalowka_w_zabudowie','ekspres_do_kawy_wolnostojacy','ekspres_do_kawy_w_zabudowie','lodowka_w_zabudowie','lodowka_wolnostojaca','lodowka_wolnostojaca_side','lodowka_z_kostkarka','lodowka_do_wina', '', 'zmywarka_45cm_wolnostojaca','zmywarka_45cm_w_zabudowie','zmywarka_60cm_wolnostojaca','zmywarka_60cm_w_zabudowie','zlewozmywak_nablatowy','zlewozmywak_podblatowy','zlewozmywak_jednokomorowy','zlewozmywak_dwukomorowy','zlewozmywak_z_ociekaczem','','bateria_zlewozmywakowa');
        array_push($kuchnia_name, 'bateria_zlewozmywakowa_z_wyciagana_wylewka','bateria_zlewozmywakowa_z_filtrem','bateria_zlewozmywakowa_z_funkcja_wody_mineralnej','bateria_zlewozmywakowa_z_funkcja_wrzatku','osobny_filtr_wody','czajnik_elektryczny','robot_kuchenny','thermomix','krajalnica','toster','sokowirowka');

        $kuchnia_label = [];
        array_push($kuchnia_label, 'Kuchenka gazowa','Kuchenka indukcyjna','Okap kuchenny w zabudowie','Okap kuchenny zintegrowany z płytą','Okap kuchenny podblatowy','Okap kuchenny wiszący','Piekarnik standardowy','Piekarnik z funkcją mikrofali','Mikrofalówka wolnostojąca','Mikrofalówka w zabudowie','Ekspres do kawy wolnostojący','Ekspres do kawy w zabudowie','Lodówka w zabudowie','Lodówka wolnostojąca','Lodówka wolnostojąca Side by Side','Lodówka z kostkarką');
        array_push($kuchnia_label, 'Lodówka do wina', '','Zmywarka 45cm wolnostojąca','Zmywarka 45cm w zabudowie','Zmywarka 60cm wolnostojąca','Zmywarka 60cm w zabudowie','Zlewozmywak nablatowy','Zlewozmywak podblatowy','Zlewozmywak jednokomorowy','Zlewozmywak dwukomorowy','Zlewozmywak z ociekaczem','','Bateria zlewozmywakowa','Bateria zlewozmywakowa z wyciąganą wylewką');
        array_push($kuchnia_label, 'Bateria zlewozmywakowa z filtrem','Bateria zlewozmywakowa z funkcją wody mineralnej','Bateria zlewozmywakowa z funkcją wrzątku','Osobny filtr wody','Czajnik elektryczny','Robot kuchenny','Thermomix','Krajalnica','Toster','Sokowirówka');

        $kuchnia_checked = [];
        array_push($kuchnia_checked, $row8['kuchenka_gazowa'], $row8['kuchenka_indukcyjna'], $row8['okap_kuchenny_w_zabudowie'], $row8['okap_kuchenny_zintegrowany_z_plyta'], $row8['okap_kuchenny_podblatowy'], $row8['okap_kuchenny_wiszacy'], $row8['piekarnik_standardowy'], $row8['piekarnik_z_funkcja_mikrofali'], $row8['mikrofalowka_wolnostojaca']);
        array_push($kuchnia_checked, $row8['mikrofalowka_w_zabudowie'], $row8['ekspres_do_kawy_wolnostojacy'], $row8['ekspres_do_kawy_w_zabudowie'], $row8['lodowka_w_zabudowie'], $row8['lodowka_wolnostojaca'], $row8['lodowka_wolnostojaca_side'], '', $row8['lodowka_z_kostkarka'], $row8['lodowka_do_wina'], $row8['zmywarka_45cm_wolnostojaca'], $row8['zmywarka_45cm_w_zabudowie'], $row8['zmywarka_60cm_wolnostojaca'], $row8['zmywarka_60cm_w_zabudowie'], $row8['zlewozmywak_nablatowy'], $row8['zlewozmywak_podblatowy'], $row8['zlewozmywak_jednokomorowy'], $row8['zlewozmywak_dwukomorowy'], $row8['zlewozmywak_z_ociekaczem'], '',$row8['bateria_zlewozmywakowa']);
        array_push($kuchnia_checked, $row8['bateria_zlewozmywakowa_z_wyciagana_wylewka'], $row8['bateria_zlewozmywakowa_z_filtrem'], $row8['bateria_zlewozmywakowa_z_funkcja_wody_mineralnej'], $row8['bateria_zlewozmywakowa_z_funkcja_wrzatku'], $row8['osobny_filtr_wody'], $row8['czajnik_elektryczny'], $row8['robot_kuchenny'], $row8['thermomix'], $row8['krajalnica'], $row8['toster'], $row8['sokowirowka']);
?>


<div class="form-row">
    <span class="form-num-field">23</span>
    <label for="stylKuchnia" class="form-text-label">KUCHNIA
      <span class="form-additional-info">Zaznacz właściwe elementy oraz sprzęty, które mają być uwzględnione w projekcie</span></label>
    <div class="form-list-wrapper form--grid-2-cols">
      <ul id="stylKuchnia" class="form-list grid-2-cols">
        <?php 
        for($i = 0; $i < count($kuchnia_name); $i++) {
          for($dodatek_checkbox=0; $dodatek_checkbox < count($kuchnia_dodatkowe_checkbox); $dodatek_checkbox++) {
            $renderuj_dodatek_checkbox = false;
            if($kuchnia_dodatkowe_checkbox[$dodatek_checkbox] == $kuchnia_name[$i]) {
              $renderuj_dodatek_checkbox = true;
              break;
            }
          }
          for($dodatek_text=0; $dodatek_text < count($kuchnia_dodatkowe_text); $dodatek_text++) {
            $renderuj_dodatek_text = false;
            if($kuchnia_dodatkowe_text[$dodatek_text] == $kuchnia_name[$i]) {
              $renderuj_dodatek_text = $kuchnia_dodatkowe_text_label[$dodatek_text];
              break;
            }
          }
          drawCheckboxKuchnia($i, $kuchnia_checked[$i], $kuchnia_name[$i], $kuchnia_label[$i], $renderuj_dodatek_checkbox, $renderuj_dodatek_text, $row8, $disabled);
        }
      echo '</ul>';
    echo '</div>';

    echo '<div class="form--grid-2-cols">';
    // dodatkowe pytania do kuchnia
    
    drawSubTextarea('kuchnia_inne_1', 'Inne:', $row8['inne_1'], $readonly);
    drawSubTextarea('kuchnia_inne_2', 'Czy istnieje potrzeba wydzielenia przestrzeni gospodarczej: na ręczniki, detergenty, mopa,
    wiadro itp.?', $row8['inne_2'], $readonly);
    drawSubTextarea('kuchnia_inne_3', 'Jaki drobny sprzęt AGD ma znajdować się na blacie kuchennym? <br />np.:czajnik elektryczny, toster,
    robot kuchenny, Thermomix. Będzie miało to wpływ na ilość potrzebnych gniazdek elektrycznych.', $row8['inne_3'], $readonly);
    drawSubTextarea('kuchnia_inne_4', 'Czy preferują Państwo konkternych producentów armatury, ceramiki, mebli? Czy meble mają być
    wykonane „na wymiar”?', $row8['inne_4'], $readonly);
    drawSubTextarea('kuchnia_inne_5', 'Kto z domowników najczęściej gotuje? Prosimy podać jego wzrost. Będzie miało to wpływ na
    wysokość blatu w kuchni.', $row8['inne_5'], $readonly);
    drawSubTextarea('kuchnia_inne_6', 'Czy jest przewidziana spiżarnia czy całe przechowywanie zaplanowane jest w kuchni?', $row8['inne_6'], $readonly);
    drawSubTextarea('kuchnia_inne_7', 'Co w największej ilości będzie przechowywane w kuchni? np.: talerze, garnki, patelnie, małe
    sprzęty AGD, zapasy, itp. Będzie to miało wpływ za ilość szafek do przechowywania sprzętów i produktów.', $row8['inne_7'], $readonly);
    drawSubTextarea('kuchnia_inne_8', 'Czy dużo Państwo gotują?', $row8['inne_8'], $readonly);
    
    echo '</div> ';
  echo '</div>';
?>