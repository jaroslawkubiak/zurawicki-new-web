<?php
    $result_ok = '';
    $result_error = '';
    $title = $_POST['title'] ?? '';
    $date = $_POST['date'] ?? '';
    $link = $_POST['link'] ?? '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0 && $title && $date && $link) {
        $uploadDir = '../img/publikacje/';
        $filename = basename($_FILES['image']['name']);
        $nowa_nazwa = generateFilename($title, $date);

        $targetFile = $uploadDir . $nowa_nazwa;
        
        $fileType = explode('.', strtolower($filename));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array($fileType[1], $allowedTypes)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $sql = "INSERT INTO publikacje (`title`, `date`, `link`, `image`) 
                VALUES ('$title', '$date', '$link', '$nowa_nazwa');";
                $result = mysqli_query($conn, $sql);
                
                $result_ok = "Publikacja została dodana.";
            } else {
                $result_error = "Błąd podczas przesyłania pliku.";
            }
        } else {
            $result_error = "Nieobsługiwany typ pliku. Dozwolone: jpg, png, gif.";
        }

    } else {
        $result_error = "Nie wybrano pliku lub wystąpił błąd.";
    }

function generateFilename($title, $date) {
    // Mapowanie polskich nazw miesięcy na numery
    $months = [
        'styczeń' => '01', 'luty' => '02', 'marzec' => '03', 'kwiecień' => '04',
        'maj' => '05', 'czerwiec' => '06', 'lipiec' => '07', 'sierpień' => '08',
        'wrzesień' => '09', 'październik' => '10', 'listopad' => '11', 'grudzień' => '12'
    ];

    // Zamiana polskich znaków w title
    $transliteration = [
        'ą'=>'a','ć'=>'c','ę'=>'e','ł'=>'l','ń'=>'n','ó'=>'o','ś'=>'s','ż'=>'z','ź'=>'z',
        'Ą'=>'a','Ć'=>'c','Ę'=>'e','Ł'=>'l','Ń'=>'n','Ó'=>'o','Ś'=>'s','Ż'=>'z','Ź'=>'z'
    ];

    // Wydobycie miesiąca i roku z daty
    $date_parts = explode(' ', strtolower($date));
    $month = isset($months[$date_parts[0]]) ? $months[$date_parts[0]] : '00';
    $year = isset($date_parts[1]) ? $date_parts[1] : '0000';

    // Obróbka tytułu
    $title = strtr($title, $transliteration); // zamiana polskich znaków
    $title = strtolower($title); // wszystko na małe litery
    $title = preg_replace('/[^a-z0-9]+/', '-', $title); // zamiana spacji i znaków specjalnych na "-"
    $title = trim($title, '-'); // usunięcie "-" na początku i końcu

    // Połączenie wszystkiego w nazwę pliku
    return $month . '-' . $year . '-' . $title;
}    
?>
