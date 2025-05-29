<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Żurawicki Design - Studio Projektowania Wnętrz</title>
  <link rel="icon" type="image/png" href="img/favicon.png" />
  <script>
    const fileVer = Date.now();
    const head = document.getElementsByTagName("head")[0];

    const cssList = ["style", "menu", "publikacje", "footer", "spinner", "o-nas"];
    cssList.forEach((file) => {
      let link = document.createElement("link");
      link.rel = "stylesheet";
      link.type = "text/css";
      link.href = `css/${file}.css?v=${fileVer}`;
      head.appendChild(link);
    });

    const scriptsList = ["script"];
    scriptsList.forEach((file) => {
      const link = document.createElement("script");
      link.defer = true;
      link.type = "module";
      link.src = `js/${file}.js?v=${fileVer}`;
      head.appendChild(link);
    });
  </script>
</head>

<?php
include('html/spinner.html');
include('html/menu.html');

echo '<body id="body">';
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';

if (!$page) {
  include('html/home.html');
} else {
  include('html/' . $page . '.html');
}


include('html/footer.html');
?>

</body>
</html>