<?php
ob_start();

$title = $_POST['title'] ?? '';
$date = $_POST['date'] ?? '';
$link = $_POST['link'] ?? '';
$uploadDir = '../img/publikacje/';

if (!empty($_POST['edit_id'])) {
    $id = $_POST['edit_id'];

    // pobierz aktualną nazwę obrazu
    $getImage = mysqli_query($conn, "SELECT image FROM publikacje WHERE id = $id");
    $currentImage = mysqli_fetch_assoc($getImage)['image'];

    // sprawdź czy użytkownik wybrał nowe zdjęcie
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];

        if (in_array($ext, $allowed)) {
            // wygeneruj nową nazwę
            $nowa_nazwa = generateFilename($title, $date) . "." . $ext;
            $targetFile = $uploadDir . $nowa_nazwa;

            move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

        } else {
            header("Location: index.php?page=publikacje&error=Nieobsługiwany+format+pliku");
            exit;        
        }
    } else {
        // nie zmieniono zdjęcia → zostaw stare
        $nowa_nazwa = $currentImage;
    }

    // zapisz zmiany
    $sql = "UPDATE publikacje SET title='$title', date='$date', link='$link', image='$nowa_nazwa' WHERE id=$id";
    mysqli_query($conn, $sql);

    header("Location: index.php?page=publikacje&success=Publikacja+została+zaktualizowana");
    exit;        
} else {
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
                
                header("Location: index.php?page=publikacje&success=Publikacja+została+dodana");
                exit;        
            } else {
                header("Location: index.php?page=publikacje&error=Błąd+podczas+przesyłania+pliku");
                exit;
            }
        } else {
            header("Location: index.php?page=publikacje&error=Nieobsługiwany+typ+pliku");
            exit;        
        }

    } else {
        header("Location: index.php?page=publikacje&error=Brak+pliku+lub+puste+pole");
        exit;        
    }
}

function generateFilename($title, $date) {
    // Mapowanie polskich nazw miesięcy na numery (bez i z polskimi znakami)
    $months = [
        'styczen' => '01', 'styczeń' => '01',
        'luty' => '02',
        'marzec' => '03',
        'kwiecien' => '04', 'kwiecień' => '04',
        'maj' => '05',
        'czerwiec' => '06',
        'lipiec' => '07',
        'sierpien' => '08', 'sierpień' => '08',
        'wrzesien' => '09', 'wrzesień' => '09',
        'pazdziernik' => '10', 'październik' => '10',
        'listopad' => '11',
        'grudzien' => '12', 'grudzień' => '12'
    ];

    // usuwanie polskich znaków
    $transliteration = [
        'ą'=>'a','ć'=>'c','ę'=>'e','ł'=>'l','ń'=>'n','ó'=>'o','ś'=>'s','ż'=>'z','ź'=>'z',
        'Ą'=>'a','Ć'=>'c','Ę'=>'e','Ł'=>'l','Ń'=>'n','Ó'=>'o','Ś'=>'s','Ż'=>'z','Ź'=>'z'
    ];

    // Normalizujemy datę
    $date_normalized = strtolower(strtr($date, $transliteration));
    $date_parts = explode(' ', $date_normalized);

    // Wykrywanie miesiąca
    $month_key = $date_parts[0] ?? '';
    $month = $months[$month_key] ?? null;

    // Wykrywanie roku
    $year = isset($date_parts[1]) && preg_match('/^\d{4}$/', $date_parts[1])
        ? $date_parts[1]
        : null;

    // Jeśli brak miesiąca lub roku → zwróć timestamp
    if (!$month || !$year) {
        return time();
    }

    // Obróbka tytułu
    $title = strtr($title, $transliteration);
    $title = strtolower($title);
    $title = preg_replace('/[^a-z0-9]+/', '-', $title);
    $title = trim($title, '-');

    return $month . '-' . $year . '-' . $title;
}
?>
