<?php
    $dane_ogolne_label = ['IMIĘ I NAZWISKO INWESTORA', 'ADRES E-MAIL', 'TELEFON', 'RODZAJ BUDYNKU MIESZKALNEGO', 'ETAP INWESTYCJI'];
    $dane_ogolne_name = ['imie_nazwisko', 'email', 'telefon', 'rodzaj_budynku', 'etap_inwestycji'];
    $dane_ogolne_span = ['', '', '', 'np. dom jednorodzinny/mieszkanie/apartament', 'np. stan surowy/stan deweloperski/remont'];

    $licz= 0 ;
    for($i = 0; $i < count($dane_ogolne_label); $i++) {
    $licz = $i+1;

    drawInput($licz, $dane_ogolne_name[$i], $dane_ogolne_label[$i], $dane_ogolne_span[$i], $row[$dane_ogolne_name[$i]], $readonly);

    }
    ?>

    <div class="form-row">
      <span class="form-num-field">6</span>
      <label for="projektowanePomieszczenia" class="form-text-label"
        >PROJEKTOWANE POMIESZCZENIA
        <span class="form-additional-info">wybierz z poniższej listy</span></label
      >
      <div class="form-list-wrapper form--grid-2-cols">
        <ul id="projektowanePomieszczenia" class="form-list">
          <?php
          //projektowane pomieszczenia - lista checkboxów i selectów
          $pp_name = ['kuchnia', 'salon', 'lazienka', 'toaleta', 'sypialnia', 'garderoba', 'pokoj_dzieciecy', 'hol'];
          $pp_label = ['Kuchnia', 'Salon', 'Łazienka', 'Toaleta', 'Sypialnia', 'Garderoba', 'Pokoj dzieciecy', 'Hol'];
          $pp_ilosc = [$row2['kuchnia'], $row2['salon'], $row2['lazienka'], $row2['toaleta'], $row2['sypialnia'], $row2['garderoba'], $row2['pokoj_dzieciecy'], $row2['hol']];

          for($i = 0; $i < count($pp_name); $i++) {
            drawCheckboxSelect($i, $pp_ilosc[$i], $pp_name[$i], $pp_label[$i], 'width-xl', $disabled);
          }

          $inne_checked = '';
          if($row2['inne'] == 'on') $inne_checked = ' checked';
          echo '
          <li class="list-row">
            <div class="list-check-wrapper">
              <input id="pyt-6_opcja-'.count($pp_name).'" type="checkbox" '.$inne_checked.' '.$disabled.' name="inne" title="Inne"/>
              <label class="form-list-label" for="pyt-6_opcja-'.count($pp_name).'" title="Inne">Inne</label>
            </div>
            <label for="pyt-6_opcja-'.count($pp_name).'_ilosc" class="hidden" title="Inne">opis</label>
            <input id="pyt-6_opcja-'.count($pp_name).'_ilosc" type="text" value="'.$row2['inne_opis'].'" '.$disabled.' name="inne_opis" class="input-text-inne-opis" title="Inne"/>
          </li>';
          ?>
        </ul>
      </div>
    </div>