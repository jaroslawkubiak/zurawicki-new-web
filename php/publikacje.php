<?php
include("_conn.php");

$sql = "SELECT * FROM publikacje ORDER BY id DESC;";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo '<section id="publikacje">';
if (count($rows) > 0) {
  for ($i = 0; $i < count($rows); $i++) {
    echo '<div class="publikacja-wrapper">';
    echo '<p class="publikacja-title">' . htmlspecialchars($rows[$i]['title']) . '</p>';
    echo '<p class="publikacja-date">' . htmlspecialchars($rows[$i]['date']) . '</p>';
    echo '<a href="' . htmlspecialchars($rows[$i]['link']) . '" target="_blank">';
    echo '<img class="publikacja-img" src="img/publikacje/' . htmlspecialchars($rows[$i]['image']) . '" alt="Publikacja ' . htmlspecialchars($rows[$i]['title']) . '"/>';
    echo '</a>';
    echo '</div>';
  }
}
echo '</section>';
