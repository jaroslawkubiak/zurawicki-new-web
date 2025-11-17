<div class="tabela-wrapper">
<div class="publikacje-wrapper">
    <?php
    $sql = "SELECT * FROM publikacje ORDER BY id DESC;";
    $result = mysqli_query($conn, $sql);
    $ilosc_wierszy = mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0)
        while ($wynik = mysqli_fetch_assoc($result)) {
            echo '<div class="publikacje-container">';
                echo '<div class="publikacje-lp flex-center">' . $ilosc_wierszy-- . '</div>';
                echo '<div class="publikacje-img">';
                    echo '<img src="../img/publikacje/' . $wynik['image'] . '" alt="Screen publikacji" class="publikacje-img-size" />';
                echo '</div>';
                echo '<div class="publikacje-title">' . $wynik['title'] . '</div>';
                echo '<div class="publikacje-data">' . $wynik['date'] . '</div>';
                echo '<div class="publikacje-actions">';
                    echo '<div class="publikacje-link-tekst">' . $wynik['link'] . '</div>';
                    echo '<div class="publikacje-link link" data-copy="' . $wynik['link'] . '">';
                        include "svg/copy.html";
                    echo '</div>';
                    echo '<div class="publikacje-link link"><a href="' . $wynik['link'] . '" target="_blank">';
                        include "svg/link.html";
                    echo '</a></div>';
                echo '</div>';
            echo '</div>';
        }
    ?>
</div>
</div>