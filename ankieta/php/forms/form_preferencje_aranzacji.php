<?php
drawTextarea(18, 'preferowana_kolorystyka', 'PREFEROWANA KOLORYSTYKA WNĘTRZA', 'Podaj kolory, które lubisz oraz te za którymi nie przepadasz lub których nie znosisz. Czy wolisz mocne
  czy subtelne barwy, kontrasty czy łagodne zestawienia, ciepłe czy zimne kolory?', $row6['preferowana_kolorystyka'], 'height-xl', $readonly);
?>

<div class="form-row">
  <span class="form-num-field">19</span>
  <label for="stylWnetrza" class="form-text-label">STYL WNĘTRZA
    <span class="form-additional-info">Zaznacz jakie style we wnętrzach preferujesz, max. 3 odpowiedzi</span></label>
  <div class="form-list-wrapper form--grid-2-cols">
    <ul id="stylWnetrza" class="form-list grid-2-cols">
      <?php
      // styl wnętrza - lista checkboxów
      $styl_name = [];
      array_push($styl_name, 'nowoczesny', 'minimalistyczny', 'industrialny', 'loftowy', 'klasyczny', 'glamour', 'art_deco', 'kolonialny', 'hamptons', 'prowansalski', 'rustykalny', 'eklektyczny', 'postmodernistyczny', 'etniczny', 'skandynawski', 'japandi', 'ekologiczny', 'pop_art', 'boho', 'shabby_chic');
      $styl_label = [];
      array_push($styl_label, 'Nowoczesny', 'Minimalistyczny', 'Industrialny', 'Loftowy', 'Klasyczny', 'Glamour', 'Art Deco', 'Kolonialny', 'Hamptons', 'Prowansalski', 'Rustykalny', 'Eklektyczny', 'Postmodernistyczny', 'Etniczny', 'Skandynawski', 'Japandi', 'Ekologiczny', 'Pop art', 'Boho', 'Shabby chic');
      $styl_checked = [];
      array_push($styl_checked, $row6['nowoczesny'], $row6['minimalistyczny'], $row6['industrialny'], $row6['loftowy'], $row6['klasyczny'], $row6['glamour'], $row6['art_deco'], $row6['kolonialny'], $row6['hamptons'], $row6['prowansalski'], $row6['rustykalny'], $row6['eklektyczny'], $row6['postmodernistyczny'], $row6['etniczny'], $row6['skandynawski'], $row6['japandi'], $row6['ekologiczny'], $row6['pop_art'], $row6['boho'], $row6['shabby_chic']);

      for ($i = 0; $i < count($styl_name); $i++) {
        drawCheckbox('styl', $i, $styl_checked[$i], $styl_name[$i], $styl_label[$i], $disabled);
      }
      echo '</ul>';
      echo '</div>';

      echo '<div class="form--grid-2-cols">';
      echo '<div class="form-row"  style="border: none;">';
      echo '<label for="inne" class="form-text-label form--grid-2-cols">Inne</label>';
      echo '<textarea id="inne" name="inne" ' . $readonly . ' class="form--grid-2-cols textarea"/>';
      echo $row6['inne'];
      echo '</textarea>';
      echo '</div>';
      echo '</div> ';
      echo '</div>';

      drawTextarea(20, 'meble_sztuka', 'MEBLE, SZTUKA, DEKORACJE, ELEMENTY WYKOŃCZENIA I ZABUDOWY Z POPRZEDNIEGO
  WNĘTRZA', 'Podaj jeśli posiadasz meble, sztukę, dekoracje, pamiątki, elementy wykończenia i zabudowy, które
  chcesz przenieść z poprzedniego wnętrza.', $row6['meble_sztuka'], 'height-md', $readonly);

      drawTextarea(21, 'przechowywanie', 'PRZECHOWYWANIE', 'Jakiego rodzaju rzeczy masz najwiecej do przechowywania? np.: ubrania, książki, naczynia, dekoracje
  i inne w obrębie pokoi, salonu, garderoby.', $row6['przechowywanie'], 'height-md', $readonly);

      ?>