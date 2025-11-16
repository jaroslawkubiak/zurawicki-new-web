<?php
//jezeli lokalnie
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1')
{
    $mysql_server = "localhost";
    $mysql_admin = "root";
    $mysql_pass = "";
    $mysql_db = "zurawick_strona";
}
else //jezeli na serwerze
{
    $mysql_server = "localhost";
    $mysql_pass = "Jakzur3342";
    $mysql_admin = "zurawick_design";
    $mysql_db = "zurawick_design";
}

$conn = mysqli_connect($mysql_server, $mysql_admin, $mysql_pass, $mysql_db)
or die('<br /><br /><font color="crimson" size="7"><center><b>Brak połączenia z serwerem MySQL.<br><br>Prosimy spróbować póniej.</b></center></font>');
?>