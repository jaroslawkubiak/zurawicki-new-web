<?php
session_start();

require_once("_func.php");
require_once("_variable.php");
require_once("../ankieta/php/_conn.php");

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
$page = isset($_SESSION['page']) ? $_SESSION['page'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="Author" content="Jarosław Kubiak" />
  <meta name="Language" content="pl" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Żurawicki design - projektowanie wnętrz." />
  <title>Żurawicki Design - Admin</title>
  <!-- add css adn script file with version extension, to always load new files, preventing caching old files in browsers -->
  <script>
    const fileVer = Date.now();
    const head = document.getElementsByTagName("head")[0];

    let csslink2 = document.createElement("link");
    csslink2.rel = "stylesheet";
    csslink2.type = "text/css";
    csslink2.href = `css/style.css?v=${fileVer}`;
    head.appendChild(csslink2);
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../img/logo.png" />
  <link rel="bookmark icon" href="../img/logo.png" />
</head>

<body>
  <?php
  if (isset($_GET['page'])) $page = $_GET['page'];

  if (auth_admin()) {
    //jezeli admin się wylogował
    if ($page == 'logout') logout();
    else {
      //wyświetlam zawartość stron
      include("menu.php");

      echo '<div class="container">';
      //po poprawnym zalogowaniu pokazujemy info powitalne
      if (isset($_GET['login-success'])) {
        echo '<div class="info-login-udany">Witaj ' . $_SESSION['user_name'] . '</div>';
      }

      if (isset($page)) if (file_exists($page . ".php")) {
        include_once($page . ".php");
      } elseif ($_GET['login-success'] != 1) include_once("null.php");
      echo '</div>';
    }
  } else include("login.php");

  ?>
</body>

</html>