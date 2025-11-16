<?php
  drawTextarea(24, 'budzet', 'Budżet', 'Jaki jest budżet na wyposażenie wnętrza?', $row['budzet'],'height-md', $readonly);
    echo '<div class="form-row-uwagi">Uwaga! Budżet dotyczy wyposażenia wnętrza bez wyceny wykonawcy oraz materiałów (typu kleje,
    fugi, będące po stronie wykonawcy). Budżet zawiera koszt pracy stolarza, jednak wycena pracy
    stolarskiej jest określana dopiero, po wykonaniu projektu i wyborze materiałów.</div>';


  drawInput(25, 'wykonawcy', 'Wykonawcy', 'Czy posiadają Państwo swoich wykonawców?', $row['wykonawcy'], $readonly);
  drawTextarea(26, 'uwagi', 'Uwagi', 'Sugestie, pytania, uwagi:', $row['uwagi'], 'height-2xl', $readonly);
