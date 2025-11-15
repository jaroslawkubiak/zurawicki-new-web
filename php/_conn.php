<?php
//jezeli lokalnie
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    $mysql_server = "localhost";
    $mysql_admin = "root";
    $mysql_pass = "";
    $mysql_db = "zurawicki_strona";
} else //jezeli na serwerze
{
    $mysql_server = "localhost";
    $mysql_pass = "bPKkr3Jqwy5bqR7843ut";
    $mysql_admin = "zurawick_strona";
    $mysql_db = "zurawick_strona";
}

$conn = mysqli_connect($mysql_server, $mysql_admin, $mysql_pass, $mysql_db)
    or die('<br /><br /><font color="crimson" size="7"><center><b>Brak połączenia z serwerem MySQL.<br><br>Prosimy spróbować póniej.</b></center></font>');
