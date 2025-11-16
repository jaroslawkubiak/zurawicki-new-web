
<h4 class="section-title">V. Budżet<span class="section-data"><?php if(isset($row)) echo $row['data'];?></span></h4>

<form class="formularz" action="index.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="ankietaID" value="<?php if(isset($row)) echo $row['id'];?>"/>
  <input type="hidden" name="etap" value="8"/>
  <?php
    $disabled = '';
  include("php/forms/form_dane_koncowe.php");

  echo '<div class="form-btn">';
    btnWstecz($etap, $ankietaID);
  ?>
  <input type="submit" value="Wyślij" name="submit" title="Wyślij"/>
  </div>
</form>


