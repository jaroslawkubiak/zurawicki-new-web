<table class="ankieta-tabela">
    <tr>
        <th class="ankieta-naglowek">LP</th>
        <th class="ankieta-naglowek">Wydawnictwo</th>
        <th class="ankieta-naglowek">Data</th>
        <th class="ankieta-naglowek">Link tekstowy</th>
        <th class="ankieta-naglowek">Kopiuj</th>
        <th class="ankieta-naglowek">Link</th>
        <th class="ankieta-naglowek">Obraz</th>
    </tr>
    <?php
    $i = 0;
    $sql = "SELECT * FROM publikacje ORDER BY id DESC;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        while ($wynik = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            $i++;
            echo '<td class="ankieta-naglowek text-align-center">' . $i . '</td>';
            echo '<td class="ankieta-cell text-align-left">' . $wynik['title'] . '</td>';
            echo '<td class="ankieta-cell text-align-left">' . $wynik['date'] . '</td>';
            echo '<td class="ankieta-cell text-align-left">' . $wynik['link'] . '</td>';
            echo '<td class="ankieta-cell text-align-center svg copy" data-copy="' . $wynik['link'] . '">';
            include "svg/copy.html";
            echo '</td>';

            echo '<td class="link ankieta-cell text-align-left"><a href="' . $wynik['link'] . '" target="_blank">';
            include "svg/link.html";
            echo '</a></td>';

            echo '<td class="ankieta-cell text-align-center"><img src="../img/publikacje/' . $wynik['image'] . '" alt="Screen publikacji" class="img-publikacja"/></td>';
            echo '</tr>';
        }
    ?>
</table>