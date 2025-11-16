<?php
// ################## pokazuje blad zapytania 
function show_mysqli_query($conn, $query) {
    //do funkcji musi trafic samo zapytanie
    $result = mysqli_query($conn, $query);

    if(!$result) echo'<div><font color="red">' .mysqli_error($conn). ' : </font><font color="blue">'.$query.'</font></div>';
    else echo'<div><font color="blue">OK : </font><font color="blue">'.$query.'</font></div>';
}

//wylogowuje usera
function logout() {
    session_unset();
    session_destroy();
    echo '<div class="info-logout">Wylogowano poprawnie.</div>';
    echo '<div class="info-logout"><a href="index.php">Zaloguj ponownie</a></div>';

  }
  
//sprawdza czy admin jest zalogowany
function auth_admin() {
if(isset($_SESSION['user_id'])) return true;
else return false;
}

//loguje admina
function zaloguj_admina($conn, $user_name, $user_password) {
    // znak zapytania to place holder dla zmiennych
    $sql = "SELECT id, login, haslo, imie FROM admins WHERE login = ? AND haslo = ?;";
    //przygotowujemy prepare statement
    $stmt = mysqli_stmt_init($conn);
  
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        przekieruj("index.php?page=login&error=2");
        exit();
    }
  
    //łączymy zapytanie sql z danymi podanymi przez usera
    mysqli_stmt_bind_param($stmt, "ss", $user_name, $user_password);
  
    //wykonuje zapytanie
    mysqli_stmt_execute($stmt);
  
    //łapiemy dane
    $result_data = mysqli_stmt_get_result($stmt);
  
    if($row = mysqli_fetch_assoc($result_data))
    {
      //jak dane istnieją to możemy tego użyć do zalogowania usera
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_name'] = $row['imie'];
     
      przekieruj("index.php?login-success=1");
      exit();
    }
    else 
    {
      przekieruj("index.php?page=login&error=3");
      exit();
    }
  }

  //przekierowuje na podany adres
function przekieruj($adres) {
    echo '<script language="JavaScript" type="text/javascript">';
      echo 'location.href="'.$adres.'"';
    echo '</script>';
  }

//sprawdzamy czy wpisalismy login i hasło
function pusty_login_i_haslo($user_name, $user_password) {
  
    if(empty($user_name) || empty($user_password)) $result = true;
    else $result = false;
  
    return $result;
  }
  
//pokazuje info o błędach przy rejestracji i logowaniu
function pokaz_info($info, $blad){
    // $blad = tak, pokazuje na czerwono, nie - pokazuje zwykły podkreślony tekst, flush - duzy zwykły tekst
    if($blad == 'tak') echo '<div class="error_wrapper"><div class="error">'.$info.'</div></div>';
    elseif($blad == 'flush')  echo '<div class="error_wrapper"><div class="error_flush">'.$info.'</div></div>';
    else echo '<div class="error_wrapper"><div class="error_brak">'.$info.'</div></div>';
  }
  


?>