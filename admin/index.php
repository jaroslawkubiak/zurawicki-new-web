<?php
session_start();

require_once("php/_func.php");
require_once("php/_variable.php");
require_once("../php/_conn.php");

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
    const fileVer = performance.now();
    const head = document.head;
    const cssFiles = [
      "css/style.css",
      "css/menu.css",
      "css/login.css",
      "css/tabela.css",
      "css/publikacje.css"
    ];

    cssFiles.forEach(file => {
      const link = document.createElement("link");
      link.rel = "stylesheet";
      link.href = `${file}?v=${fileVer}`;
      head.appendChild(link);
    });

    const scriptsList = ["copy-to-clipboard", "show-upload-form"];
    scriptsList.forEach((file) => {
      const link = document.createElement("script");
      link.defer = true;
      link.type = "module";
      link.src = `js/${file}.js?v=${fileVer}`;
      head.appendChild(link);
    });
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../img/logo.png" />
  <link rel="bookmark icon" href="../img/logo.png" />
</head>

<body id="body">
  <?php
  $page = $_GET['page'] ?? null;

  if (!auth_admin()) {
    include "php/login.php";
    exit;
  }

  // Admin jest zalogowany
  if ($page === 'logout') {
    logout();
    exit;
  }

  include "php/menu.php";

  echo '<div class="body-container">';
  echo '<div class="container">';

  // Komunikat po poprawnym logowaniu
  if (isset($_GET['login-success'])) {
    echo '<div class="info-login-udany">Witaj ' . htmlspecialchars($_SESSION['user_name']) . '</div>';
  }

  // Ładowanie strony
  $filepath = "php/" . $page . ".php";

  if ($page && file_exists($filepath)) {
    include_once $filepath;
  } elseif (!isset($_GET['login-success'])) {
    include_once "php/page-in-progress.php";
  }

  echo '</div>';
  echo '</div>';

  ?>
</body>

</html>