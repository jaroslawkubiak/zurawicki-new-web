<table class="ankieta-tabela">
    <tr>
        <th class="ankieta-naglowek">LP</th>
        <th class="ankieta-naglowek">Imię i nazwisko</th>
        <th class="ankieta-naglowek">E-mail</th>
        <th class="ankieta-naglowek">Telefon</th>
        <th class="ankieta-naglowek">Data wypełnienia</th>
        <th class="ankieta-naglowek">Link</th>
    </tr>
    <?php

    $ilosc_ankiet = 0;
    $sql = "SELECT * FROM a_naglowek ORDER BY id DESC;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        while ($wynik = mysqli_fetch_assoc($result)) {
            echo '<tr class="row">';
            $ilosc_ankiet++;
            echo '<td class="ankieta-naglowek text-align-center">' . $ilosc_ankiet . '</td>';
            echo '<td class="ankieta-cell text-align-left">' . $wynik['imie_nazwisko'] . '</td>';
            echo '<td class="ankieta-cell text-align-left">' . $wynik['email'] . '</td>';
            echo '<td class="ankieta-cell text-align-center">' . $wynik['telefon'] . '</td>';
            echo '<td class="ankieta-cell text-align-center">' . $wynik['data'] . '</td>';

            if ($adres_ip == '127.0.0.1') $linkSerwer = 'http://127.0.0.1/nowa-strona-zurawicki/ankieta/';
            else $linkSerwer = 'http://zurawickidesign.pl/ankieta/';
            $link = $linkSerwer . 'index.php?page=ankieta&hash=' . $wynik['hash'];

            echo '<td class="link ankieta-cell text-align-center"><a href="' . $link . '" target="_blank">';
            include "svg/link.html";
            echo '</a></td>';
            echo '</tr>';
        }
    ?>
</table>