    <table class="ankieta-tabela">
        <tr>
            <th class="ankieta-naglowek">LP</th>
            <th class="ankieta-naglowek">Imię i nazwisko</th>
            <th class="ankieta-naglowek">E-mail</th>
            <th class="ankieta-naglowek">Telefon</th>
            <th class="ankieta-naglowek">Data wypełnienia</th>
            <th class="ankieta-naglowek">Data wysłania</th>
        </tr>
        <?php


        $ilosc_ankiet = 0;
        $sql = "SELECT * FROM ankieta_naglowek ORDER BY id DESC;";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0)
            while ($wynik = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                $ilosc_ankiet++;
                echo '<td class="ankieta-cell text-align-center">' . $ilosc_ankiet . '</td>';
                echo '<td class="ankieta-cell text-align-left">' . $wynik['imie_nazwisko'] . '</td>';
                echo '<td class="ankieta-cell text-align-left">' . $wynik['email'] . '</td>';
                echo '<td class="ankieta-cell text-align-center">' . $wynik['telefon'] . '</td>';
                echo '<td class="ankieta-cell text-align-center">' . $wynik['data'] . '</td>';
                echo '<td class="ankieta-cell text-align-center">' . $wynik['data'] . '</td>';
                echo '</tr>';
            }
        ?>
    </table>