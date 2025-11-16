<input type="hidden" name="etap" value="9" />
<?php
//jeżeli NIE lokalnie
if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
  //new phpmailer v6.16
  require 'mailer/src/Exception.php';
  require 'mailer/src/PHPMailer.php';
  require 'mailer/src/SMTP.php';

  $headers = '<html><head><meta charset="UTF-8"/>';
  $headers .= '<title>Żurawicki Design - Ankieta</title>';
  $headers .= '<meta name="Author" content="Jarosław Kubiak" />';
  $headers .= '<meta name="viewport" content="width=device-width, initial-scale=1.0" />';
  $headers .= '<meta name="Language" content="pl" />';
  $headers .= '<meta name="description" content="Żurawicki design - projektowanie wnętrz."/>';
  $headers .= '<style>
    body {
      font-size: 20px;
      color: #000;
    }
    p {
      font-size: 20px;
      color: #000;
    }
    a {
      all: unset;
      color: #000;
      text-decoration: none;
      font-size: 20px;
      cursor: pointer;
      font-weight: 700;
    }
    a:link {      
      all: unset;
      color: #000;
      text-decoration: none;
      font-size: 20px;
      cursor: pointer;
      font-weight: 700;
    }
    a:visited {
      all: unset;
      color: #000;
      text-decoration: none;
      font-size: 20px;
      cursor: pointer;
      font-weight: 700;
    }
    a:hover {
      all: unset;
      color: #000;
      text-decoration: none;
      font-size: 20px;
      cursor: pointer;
      font-weight: 700;
    }
    a:active {
      all: unset;
      color: #000;
      text-decoration: none;
      font-size: 20px;
      cursor: pointer;
      font-weight: 700;
    }
  </style>';
  $headers .= '</head>';

  $email_nadawcy = $sdres_email_do_biura;
  $email_odbiorcy = $sdres_email_do_biura;
  $email_pracowni = $sdres_email_do_biura;
  $tytul_emaila = 'Ankieta - ' . $row['imie_nazwisko'];

  $tresc_maila = $headers;
  $tresc_maila .= '<body><p align="left"><strong>';
  $tresc_maila .= $row['imie_nazwisko'] . ' </strong>przesłał wypełnioną ankietę.<br /><br />';
  $tresc_maila .= generujLinkAnkiety($conn, $ankietaID, $_SERVER['REMOTE_ADDR']);
  $tresc_maila .= '</p></body>';
  $tresc_maila .= '</html>';

  ////////////////////////////////////////////////////////////////////////////////
  //  wysyłam email z potwierdzeniem ankiety do biura Żurawicki Design
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->CharSet = "UTF-8";
  $mail->FromName = 'Żurawicki Design';
  $mail->From = $email_nadawcy;
  $mail->AddAddress($email_odbiorcy);
  $mail->AddReplyTo($email_pracowni, "Żurawicki Design");
  $mail->Subject = $tytul_emaila;
  $mail->Body =  html_entity_decode($tresc_maila);
  $mail->IsHTML(true);
  $mail->setLanguage('pl');

  if ($mail->Send()) {
    $status = 'OK';
  } else {
    $status = 'BŁĄD';
  }
  $rejestruj = [];
  $rejestruj['ankietaID'] = $row['id'];
  $rejestruj['email'] = $email_odbiorcy;
  $rejestruj['status'] = $status;
  $rejestruj['dzis'] = $dzis;
  $rejestruj['time'] = $time;
  registerEmails($conn, $rejestruj);

  ////////////////////////////////////////////////////////////////////////////////
  // wysyłam email do klienta o edycji ankiety
  $email_odbiorcy = $row['email'];
  $tytul_email_do_klienta = 'Ankieta preferencji klienta';

  $tresc_emaila_do_klienta = $headers;
  $tresc_emaila_do_klienta .= '<body><p align="left">';
  $tresc_emaila_do_klienta .= 'Witamy, <br /><br />Dziękujemy za wypełnienie ankiety.<br /><br />';
  $tresc_emaila_do_klienta .= 'W każdej chwili możesz wrócić do edycji ankiety <a href="http://zurawickidesign.pl/ankieta">tutaj</a> i przesłać ją ponownie do pracowni.<br /><br /><br />';
  $tresc_emaila_do_klienta .= 'Pozdrawiamy<br />';
  $tresc_emaila_do_klienta .= 'Zespół Żurawicki Design';
  $tresc_emaila_do_klienta .= '</p></body>';
  $tresc_emaila_do_klienta .= '</html>';

  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->CharSet = "UTF-8";
  $mail->FromName = 'Żurawicki Design';
  $mail->From = $email_nadawcy;
  $mail->AddAddress($email_odbiorcy);
  $mail->AddReplyTo($email_pracowni, "Żurawicki Design");
  $mail->Subject = $tytul_email_do_klienta;
  $mail->Body =  html_entity_decode($tresc_emaila_do_klienta);
  $mail->IsHTML(true);
  $mail->setLanguage('pl');

  if ($mail->Send()) {
    $status = 'OK';
  } else {
    $status = 'BŁĄD';
  }
  $rejestruj = [];
  $rejestruj['ankietaID'] = $row['id'];
  $rejestruj['email'] = $email_odbiorcy;
  $rejestruj['status'] = $status;
  $rejestruj['dzis'] = $dzis;
  $rejestruj['time'] = $time;
  registerEmails($conn, $rejestruj);
}

echo '<div class="final-info">';
echo '<p>Dziękujemy za wypełnienie ankiety.<br /><br /><br /><br />';
echo 'Została ona przesłana do pracowni Żurawicki Design.<br />';
echo 'Trafiła również na Twój adres email.</p>';
echo '</div>';
?>