<?php
if(isset($_POST["submit"]))
{
    $user_name = $_POST['login'];
    $user_password = $_POST['haslo'];

    if(pusty_login_i_haslo($user_name, $user_password) !== false) {
        przekieruj("index.php?page=login&error=1");
        exit();
    }
    else zaloguj_admina($conn, $user_name, $user_password);
} else {
    $_POST['login'] = '';
    $_POST['haslo'] = '';
}

echo '<section class="zaloguj-wrapper">';
    echo '<h2>Zaloguj się</h2>';

    if(isset($_GET["error"]))
        {
        if($_GET["error"] == 1) pokaz_info('Proszę wpisać dane.', 'tak');
        if($_GET["error"] == 2) pokaz_info('Proszę spróbować ponownie.', 'tak');
        if($_GET["error"] == 3) pokaz_info('<p class="info-login-error">Dane są niepoprawne!</p>', 'tak');
        }

    echo '<form action="index.php" method="post" class="login-form">';
        echo '<label for="login">Login</label>';
        echo '<input type="text" id="login" autocomplete="on" name="login" tabindex="1" required value="'.$_POST['login'].'">';

        echo '<label for="haslo">Hasło</label>';
        echo '<input type="password" id="haslo" autocomplete="on" name="haslo" tabindex="2" required value="'.$_POST['haslo'].'">';

        echo '<input type="submit" value="Zaloguj" name="submit">';
    echo '</form>';
echo '</section>';
?>