<section class="formularz">
    <?php
    // $disabled = ' disabled style="cursor: default;"';
    $readonly = ' readonly';
    $disabled = ' disabled';
    //get all data
    include("php/query/get_all_data.php");

    echo '<h4 class="section-title">I. Dane ogólne<span class="section-data">' . $row['data'] . '</span></h4>';
    include("php/forms/form_dane_ogolne.php");

    echo '<h4 class="section-title">II. Charakterystyka mieszkańców</h4>';
    include("php/forms/form_charakterystyka_mieszkancow.php");

    echo '<h4 class="section-title">III. Charakterystyka pomieszczenia</h4>';
    include("php/forms/form_charakterystyka_pomieszczenia.php");

    echo '<h4 class="section-title">IV. Preferencje aranżacji wnętrza</h4>';
    include("php/forms/form_preferencje_aranzacji.php");
    include("php/forms/form_lazienka.php");
    include("php/forms/form_kuchnia.php");

    echo '<h4 class="section-title">V. Budżet</h4>';
    include("php/forms/form_dane_koncowe.php");

    ?>
</section>