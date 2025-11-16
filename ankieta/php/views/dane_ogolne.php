
  <h4 class="section-title">I. Dane ogólne<span class="section-data"><?php if(isset($row)) echo $row['data'];?></span></h4>

  <form class="formularz" action="index.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ankietaID" value="<?php if(isset($row)) echo $row['id'];?>"/>
    <input type="hidden" name="etap" value="2"/>

<?php
  $disabled = '';
  include("php/forms/form_dane_ogolne.php");
?>

    <div class="form-btn">
      <input type="submit" id="submit" value="Dalej" name="submit" title="Dalej"/>
    </div>
  </form>


