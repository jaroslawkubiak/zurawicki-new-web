<?php
session_start();
include("php/_var.php");
include("php/_conn.php");
include("php/_func.php");

$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
$submit = isset($_REQUEST['submit']) ? $_REQUEST['submit'] : '';
$etap = isset($_REQUEST['etap']) ? $_REQUEST['etap'] : '';
$ankietaID = isset($_REQUEST['ankietaID']) ? $_REQUEST['ankietaID'] : '';
$wstecz = isset($_REQUEST['wstecz']) ? $_REQUEST['wstecz'] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="Author" content="Jarosław Kubiak" />
  <meta name="Language" content="pl" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <meta name="description" content="Żurawicki design - projektowanie wnętrz." />
  <title>Żurawicki Design - Ankieta</title>
  <!-- add css adn script file with version extension, to always load new files, preventing caching old files in browsers -->
  <script>
    const fileVer = Date.now();
    const head = document.getElementsByTagName("head")[0];

    let scriptLink = document.createElement("script");
    scriptLink.defer = true;
    scriptLink.type = "module";
    scriptLink.src = `script.js?v=${fileVer}`;
    head.appendChild(scriptLink);

    let csslink2 = document.createElement("link");
    csslink2.rel = "stylesheet";
    csslink2.type = "text/css";
    csslink2.href = `css/style.css?v=${fileVer}`;
    head.appendChild(csslink2);

    let csslink1 = document.createElement("link");
    csslink1.rel = "stylesheet";
    csslink1.type = "text/css";
    csslink1.href = `css/inputs.css?v=${fileVer}`;
    head.appendChild(csslink1);
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../img/logo.png" />
  <link rel="bookmark icon" href="../img/logo.png" />
</head>

<body>
  <div class="container">
    <?php

    if (!$submit) {
      if (isset($page) && ($page == 'ankieta')) include("php/ankieta.php");
      else {
        // if not submitted
        include('php/views/start.php');
      }
    } else {
      if ($submit == 'Zacznij') {
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
        $sql = "SELECT * FROM a_naglowek WHERE email = '" . $email . "';";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

        //nowa ankieta - dodaję wpis do DB
        if (!$row) {
          $new_hash = generateHash();
          $sql = "INSERT INTO a_naglowek (`hash`, `email`, `data`, `time`) VALUES ('$new_hash', '$email', '$dzis', '$time');";
          $result = mysqli_query($conn, $sql);
          $ankietaID = mysqli_insert_id($conn);

          $SQL = [];
          //treść zapytań
          array_push($SQL, "INSERT INTO a_projektowane_pomieszczenia (`ankietaID`) VALUES ('$ankietaID');");
          array_push($SQL, "INSERT INTO a_charakterystyka_mieszkancow (`ankietaID`) VALUES ('$ankietaID');");
          array_push($SQL, "INSERT INTO a_przedzial_wiekowy_mieszkancow (`ankietaID`) VALUES ('$ankietaID');");
          array_push($SQL, "INSERT INTO a_charakterystyka_pomieszczenia (`ankietaID`) VALUES ('$ankietaID');");
          array_push($SQL, "INSERT INTO a_aranzacja_wnetrza (`ankietaID`) VALUES ('$ankietaID');");
          array_push($SQL, "INSERT INTO a_lazienka (`ankietaID`) VALUES ('$ankietaID');");
          array_push($SQL, "INSERT INTO a_kuchnia (`ankietaID`) VALUES ('$ankietaID');");
          //wykonanie zapytań
          for ($s = 0; $s < count($SQL); $s++) mysqli_query($conn, $SQL[$s]);
        }
      }

      if (isset($_REQUEST['email'])) {
        //searching for data in DB 
        $sql = "SELECT id FROM a_naglowek WHERE email = '" . $email . "';";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        if ($row) $ankietaID = $row['id'];
      }

      if (isset($ankietaID)) {
        //searching for data in DB 
        include("php/query/get_all_data.php");
      }
      echo '<div class="form-wrapper">';
      echo '<div class="progress-bar-outer" title="Pasek postępu"><div class="progress-bar-wrapper">';
      echo '<div class="progress-bar-inner"></div>';
      echo '</div></div>';

      switch ($etap) {
        case '1':
          include('php/views/dane_ogolne.php');
          break;
        case '2':
          include('php/query/etap_2_dane_ogolne.php');
          include('php/views/a_charakterystyka_mieszkancow.php');
          break;
        case '3':
          include('php/query/etap_3_charakterystyka_mieszkancow.php');
          include('php/views/a_charakterystyka_pomieszczenia.php');
          break;
        case '4':
          include('php/query/etap_4_charakterystyka_pomieszczenia.php');
          include('php/views/preferencje_aranzacji.php');
          break;
        case '5':
          include('php/query/etap_5_preferencje_aranzacji.php');
          include('php/views/lazienka.php');
          break;
        case '6':
          include('php/query/etap_6_lazienka.php');
          include('php/views/kuchnia.php');
          break;
        case '7':
          include('php/query/etap_7_kuchnia.php');
          include('php/views/dane_koncowe.php');
          break;
        case '8':
          include('php/query/etap_8_dane_koncowe.php');
          include('php/info_koncowe.php');
          break;
      }
      echo '</div>';
    }
    ?>
  </div>

</body>

</html>