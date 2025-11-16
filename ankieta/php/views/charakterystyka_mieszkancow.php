<h4 class="section-title">II. Charakterystyka mieszkańców
  <span class="section-data"><?php if (isset($row)) echo $row['data']; ?></span>
</h4>

<form class="formularz" id="formularz" action="index.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="ankietaID" value="<?php if (isset($row)) echo $row['id']; ?>" />
  <input type="hidden" name="etap" value="3" />

  <?php
  $disabled = '';
  include("php/forms/form_charakterystyka_mieszkancow.php");

  echo '<div class="form-btn">';
  btnWstecz($etap, $ankietaID);
  ?>
  <input type="submit" value="Dalej" name="submit" title="Dalej" />
  </div>
</form>