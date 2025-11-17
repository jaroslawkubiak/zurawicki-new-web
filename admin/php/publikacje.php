
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("upload.php");
}
?>

<div class="publikacje-dodaj-blur flex-center hidden" id="nowa-publikacja">
    <div class="publikacje-dodaj-wrapper">
        <form action="index.php?page=publikacje" method="POST" enctype="multipart/form-data">
            <div class="publikacje-container">
                <div class="publikacje-dodaj-img-wrapper">
                <p>Dodaj zdjęcie</p>
                <div class="img-preview" >
                    <img id="preview" src="" alt="Image">
                    <span id="file-info" class="file-info" style="display:none;"></span>  
                </div>

                <label for="image" class="choose-image" id="image-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="180" height="180" viewBox="0 0 256 256" for="image">
                    <path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,16V158.75l-26.07-26.06a16,16,0,0,0-22.63,0l-20,20-44-44a16,16,0,0,0-22.62,0L40,149.37V56ZM40,172l52-52,80,80H40Zm176,28H194.63l-36-36,20-20L216,181.38V200ZM144,100a12,12,0,1,1,12,12A12,12,0,0,1,144,100Z"
                    ></path>
                    </svg>
                </label>    
                    <input type="file" name="image" id="image" accept="image/*" style="display:none">
                </div>
                <div class="publikacje-dodaj-input-wrapper">
                    <label for="title">Nazwa wydawnictwa</label>
                    <input type="text" name="title" autocomplete="off" id="title" placeholder="Vogue Polska"/>
                </div>
                <div class="publikacje-dodaj-input-wrapper">
                    <label for="date">Data</label>
                    <input type="text" name="date" placeholder="Listopad 2025" autocomplete="off" id="date" />
                </div>
                <div class="publikacje-dodaj-input-wrapper">
                    <label for="link">Link do artykułu</label>
                    <input type="text" name="link"  autocomplete="off" id="link" placeholder="https://www.vogue.pl/a/nowy-apartament-aura-w-sercu-bydgoszczy"/>
                </div>
                <input type="submit" name="submit" value="Dodaj">
                <div class="close-btn flex-center" id="close-btn">
                    <?php
                    include "svg/close.html"; 
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>    

<div class="publikacje-page-wrapper">
    <div class="publikacje-dodaj-container">
        <div class="jkb1">
            <div class="publikacje-dodaj-btn link" id="dodaj-btn">
                <?php 
                include "svg/plus.html"; 
                ?>
                <span>Dodaj publikację</span>
            </div>            
        </div>
        <div class="publikacje-dodaj-item flex-center">
        <?php 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo '<span class="publikacja-dodana-ok">'.$result_ok.'</span>'; 
            echo '<span class="publikacja-dodana-error">'.$result_error.'</span>'; 
        }
        ?>    
        </div>
        <div class="publikacje-dodaj-item flex-center"></div>
    </div>

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
                        echo '<div class="publikacje-link link" data-copy="' . $wynik['link'] . '" title="Kopiuj link do schowka" aly="Kopiuj link do schowka">';
                            include "svg/copy.html";
                        echo '</div>';
                        echo '<div class="publikacje-link link"><a href="' . $wynik['link'] . '" target="_blank"  title="Otwórz link" aly="Otwórz link">';
                            include "svg/link.html";
                        echo '</a></div>';
                    echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
</div>