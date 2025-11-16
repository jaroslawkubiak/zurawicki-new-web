<div class="tabela-wrapper">
    <table class="ankieta-tabela">
        <thead>
            <tr>
                <th>LP</th>
                <th>Imię i nazwisko</th>
                <th>E-mail</th>
                <th>Telefon</th>
                <th>Data wypełnienia</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $ilosc_ankiet = 0;
            $sql = "SELECT * FROM a_naglowek ORDER BY id DESC;";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0)
                while ($wynik = mysqli_fetch_assoc($result)) {
                    echo '<tr class="row">';
                    $ilosc_ankiet++;
                    echo '<td class="lp text-center">' . $ilosc_ankiet . '</td>';
                    echo '<td class="text-left">' . $wynik['imie_nazwisko'] . '</td>';
                    echo '<td class="text-left">' . $wynik['email'] . '</td>';
                    echo '<td class="text-left">' . $wynik['telefon'] . '</td>';
                    echo '<td class="text-left">' . $wynik['data'] . '</td>';

                    if ($adres_ip == '127.0.0.1') $linkSerwer = 'http://127.0.0.1/nowa-strona-zurawicki/ankieta/';
                    else $linkSerwer = 'http://zurawickidesign.pl/ankieta/';
                    $link = $linkSerwer . 'index.php?page=ankieta&hash=' . $wynik['hash'];

                    echo '<td class="link text-center"><a href="' . $link . '" target="_blank">';
                    include "svg/link.html";
                    echo '</a></td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>