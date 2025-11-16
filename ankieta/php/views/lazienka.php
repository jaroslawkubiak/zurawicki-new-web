<h4 class="section-title">IV. Preferencje aranżacji wnętrza - Łazienka
  <span class="section-data"><?php if(isset($row)) echo $row['data'];?></span></h4>

<form class="formularz" action="index.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="ankietaID" value="<?php if(isset($row)) echo $row['id'];?>"/>
  <input type="hidden" name="etap" value="6"/>

<?php
  $disabled = '';
  include("php/forms/form_lazienka.php");

  echo '<div class="form-btn">';
    btnWstecz($etap, $ankietaID);
  ?>

    <input type="submit" value="Dalej" name="submit" title="Dalej"/>
  </div>
</form>
