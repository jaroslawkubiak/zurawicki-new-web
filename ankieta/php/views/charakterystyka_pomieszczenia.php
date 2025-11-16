<h4 class="section-title">III. Charakterystyka pomieszczenia
  <span class="section-data"><?php if (isset($row)) echo $row['data']; ?></span>
</h4>

<form class="formularz" action="index.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="ankietaID" value="<?php if (isset($row)) echo $row['id']; ?>" />
  <input type="hidden" name="etap" value="4" />

  <?php
  $disabled = '';
  include("php/forms/form_charakterystyka_pomieszczenia.php");


  echo '<div class="form-row-uwagi">Uwagi! Prosimy o przesłanie dokumentacji projektowej, którą otrzymali Państwo od dewelopera/architekta/spółdzielni na adres ' . $sdres_email_do_biura . '.</div>';

  echo '<div class="form-btn">';

  btnWstecz($etap, $ankietaID);
  ?>
  <input type="submit" value="Dalej" name="submit" title="Dalej" />
  </div>
</form>