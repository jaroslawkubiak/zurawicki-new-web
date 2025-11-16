<?php
/*
######################### zapytanie SELECT ######################
$sql = "SELECT * FROM logowania_uzytkownikow2 WHERE godzina_wylogowania = 0;";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) 
	while ($wynik = mysqli_fetch_assoc($result)) 
		{
		$idi=$wynik['id'];
		$godzina_logowania=$wynik['godzina_logowania'];
		}

######################### zapytanie SELECT  TYLKO O JEDEN WIERSZ ######################
$sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT godzina_wylogowania, godzina_logowania FROM logowania_klientow WHERE klient_id = ".$klient_id[$x]." ORDER BY id DESC LIMIT 1;"));
$godzina_wylogowania = $sql['godzina_wylogowania'];

$sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT opis FROM rozne WHERE typ = 'wysokosc_okna_cennika';"));
$wysokosc_okna_cennika = $sql['opis'];



######################### zapytanie INSERT  i UPDATE   ######################
$sql = "INSERT INTO logowania_uzytkownikow2 (`session_id`, `user_id`, `godzina_logowania`) VALUES ('$sess_id', '$user_id', '$godzina_logowania');";
$result = mysqli_query($conn, $sql);

$result = mysqli_query($conn, "UPDATE klienci SET kraj = '".$kraj."' WHERE id = ".$id.";");



######################### Sprawdzenie poprawności wykonania zapytania JEST DO TEGO FUNKCJA ######################
//do funkcji musi trafic samo zapytanie np: SELECT * FROM fv_naglowek WHERE id = ".$fv_id.";
show_mysqli_query($conn, $sql);

######################### wyciaga id ostatniego zapytania ######################
$artykul_id = mysqli_insert_id($conn);



################################# zamienia dowolne podane znaki
zamien_dowolne_znaki($string, $szukaj, $zamien_na)
$nabywca_nip = zamien_dowolne_znaki($nabywca_nip, '-', '');



############################   wyswietle info o bledzie przy wysylce emaili z pdfami
show_mail_send_error_info($mail->ErrorInfo);
	to umieszczać w treści
	$error_info = $mail->ErrorInfo;
	show_mail_send_error_info($error_info);


############################## konwertujemy  wartosc na float
$wygiecie_ramy_pvc_ilosc_szt = floatval($wygiecie_ramy_pvc_ilosc_szt);	

#################################   używać zamiast eregi
$test = 'ZT/51/09/2020';
if (preg_match("/ZT/", $test))  echo "A match was found.";
else echo "A match was not found.";



TAKI UKŁAD DZIAŁA ALE TYLKO ONLINE!!!!!!!!!!!!!!!!!!!!!!!!

mysql_query("SET AUTOCOMMIT=0");
mysql_query("START TRANSACTION");
$pytanie121 = mysql_query("UPDATE uzytkownicy SET telefon = '".$time."' WHERE id = 3");
$pytanie122 = mysql_query("UPDATE uzytkownicey SET telefon = '".$time."' WHERE id = 2");
if($pytanie121 && $pytanie122) 
	{
	echo 'robie commit';
	mysql_query("COMMIT"); 
	}
else 
	{
	echo 'robie rolback';
	mysql_query("ROLLBACK");
	}

    */
$adres_ip = $_SERVER['REMOTE_ADDR'];
$sdres_email_do_biura = 'kontakt@zurawickidesign.pl';

$readonly = ' ';
$disabled = ' ';

$time = time();
$aktualny_dzien = date('j', $time);    //j  Day of the month without leading zeros
$AKTUALNY_DZIEN = date('d', $time);    //d  Day of the month, 2 digits with leading zeros  	01 to 31
$aktualny_miesiac = date('n', $time);  //n 	Numeric representation of a month, without leading zeros
$AKTUALNY_MIESIAC = date('m', $time);  //m  Numeric representation of a month, with leading zeros  	01 through 12
$aktualny_rok = date('y', $time); 
$AKTUALNY_ROK = date('Y', $time);      //Y  A full numeric representation of a year, 4 digits  	Examples: 1999 or 2003
$AKTUALNA_GODZINA = date('H', $time);  //H  Godzina, w formacie 24-godzinnym, z zerami wiodacymi 	00 through 23
$AKTUALNA_MINUTA = date('i', $time);   //i 	Minuty z zerami wiodacymi 	00 do 59
$AKTUALNA_SEKUNDA = date('s', $time);  //s 	Sekundy, z zerami wiodacymi 	00 az do 59
$dzis = date('d-m-Y', $time);

$TABELA_MIESIECY[1] = 'Styczeń';
$TABELA_MIESIECY[2] = 'Luty';
$TABELA_MIESIECY[3] = 'Marzec';
$TABELA_MIESIECY[4] = 'Kwiecień';
$TABELA_MIESIECY[5] = 'Maj';
$TABELA_MIESIECY[6] = 'Czerwiec';
$TABELA_MIESIECY[7] = 'Lipiec';
$TABELA_MIESIECY[8] = 'Sierpień';
$TABELA_MIESIECY[9] = 'Wrzesień';
$TABELA_MIESIECY[10] = 'Październik';
$TABELA_MIESIECY[11] = 'Listopad';
$TABELA_MIESIECY[12] = 'Grudzień';
