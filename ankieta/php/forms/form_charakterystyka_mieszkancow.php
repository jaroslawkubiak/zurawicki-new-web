<?php
drawInput(7, 'liczba_mieszkancow', 'LICZBA MIESZKAŃCÓW', '', $row3['liczba_mieszkancow'], $readonly);
drawTextarea(8, 'a_charakterystyka_mieszkancow', 'CHARAKTERYSTYKA MIESZKAŃCÓW', 'Ważne informacje do zaplanowania komfortowej przestrzeni i wykorzystania pełnego potencjału wnętrza <br />np. małżeństwo z dwójką dzieci, singiel/singielka, para, osoba z niepełnosprawnością, osoba starsza.', $row3['a_charakterystyka_mieszkancow'], 'height-sm', $readonly);
?>

<div class="form-row">
  <span class="form-num-field">9</span>
  <label for="przedzialWiekowy" class="form-text-label">PRZEDZIAŁ WIEKOWY MIESZKAŃCÓW
    <span class="form-additional-info">wybierz z poniższej listy</span></label>
  <div class="form-list-wrapper form--grid-2-cols">
    <ul id="przedzialWiekowy" class="form-list">
      <?php
      //przedział wiekowy mieszkańców - lista checkboxów i selectów
      $pp_name = ['noworodek', 'niemowle', 'dziecko_1_3', 'dziecko_przedszkole', 'dziecko_szkola', 'nastolatek', 'student', 'dorosly', 'osoba_starsza', 'osoba_niepelnosprawna'];
      $pp_label = ['Noworodek', 'Niemowle', 'Dziecko od 1 do 3 lat', 'Dziecko w wieku przedszkolnym', 'Dziecko w wieku szkolnym', 'Nastolatek', 'Student', 'Osoba dorosła', 'Osoba starsza', 'Osoba z niepełnosprawnością'];
      $pp_ilosc = [$row4['noworodek'], $row4['niemowle'], $row4['dziecko_1_3'], $row4['dziecko_przedszkole'], $row4['dziecko_szkola'], $row4['nastolatek'], $row4['student'], $row4['dorosly'], $row4['osoba_starsza'], $row4['osoba_niepelnosprawna']];

      for ($i = 0; $i < count($pp_name); $i++) {
        drawCheckboxSelect($i, $pp_ilosc[$i], $pp_name[$i], $pp_label[$i], 'width-xl', $disabled);
      }
      ?>
    </ul>
  </div>
</div>


<?php
drawTextarea(10, 'tryb_zycia', 'TRYB ŻYCIA ORAZ PRZYZWYCZAJENIA MIESZKAŃCÓW', '
  W skrócie scharakteryzuj tryb życia oraz przyzwyczajenia/nawyki mieszkańców; np.: czy dużo
  pracują, czy dużo przebywają w domu, czy dużo gotują, jak odpoczywają w domu, co robią w domu
  w wolnym czasie, czy się uczą? <br />Czy mają przyzwyczajenia lub nawyki, które mają wpływ na projekt
  wnętrza? Czy któryś z domowników pracuje w domu (domowe biuro/warsztat itp.)? To ważna
  informacja do wydzielenia oraz organizacji miejsca pracy. Czy któryś z mieszkańców jest
  leworęczny?', $row3['tryb_zycia'], 'height-xl', $readonly);

drawTextarea(11, 'zainteresowania', 'ZAINTERESOWANIA MIESZKAŃCÓW', 'Jakie zainteresowania/hobby ma użytkownik/użytkownicy pomieszczeń?', $row3['zainteresowania'], 'height-sm', $readonly);

drawInput(12, 'informacje_dodatkowe', 'INFORMACJE DODATKOWE', 'np. alergie na roztocza, rośliny itp., inne', $row3['informacje_dodatkowe'], $readonly);

drawInput(13, 'zwierzeta', 'ZWIERZĘTA', 'Podaj czy domownikami będą również zwierzęta, jeżeli tak to jakie oraz w jakiej ilości.', $row3['zwierzeta'], $readonly);

?>