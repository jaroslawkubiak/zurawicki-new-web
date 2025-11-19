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
?>
<div class="login-container">
<form action="index.php" method="post">
    <div class="login-wrapper">
        <img src="../img/logo-black.png" alt="logo" class="login-img"/>
        <div class="login-field">
            <label for="login">Login</label>
            <?php
            echo '<input id="login" type="text" class="login-input-field" autocomplete="on" name="login" required tabindex="1" value="'.$_POST['login'].'" />';
            ?>
        </div>
        <div class="login-field">
            <label for="password">Password</label>
            <?php
            echo '<input type="password" id="haslo" class="login-input-field" autocomplete="on" name="haslo" required tabindex="2" value="'.$_POST['haslo'].'">';
            ?>
        </div>

        <p class="login-error-wrapper">
            <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == 1) echo 'Proszę wpisać dane.';
                if($_GET["error"] == 2) echo 'Proszę spróbować ponownie.';
                if($_GET["error"] == 3) echo 'Dane są niepoprawne!';
            }
            ?>
        </p>
        <button class="login-submit-wrapper" type="submit" name="submit">Login
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 256 256">
            <path d="M141.66,133.66l-40,40a8,8,0,0,1-11.32-11.32L116.69,136H24a8,8,0,0,1,0-16h92.69L90.34,93.66a8,8,0,0,1,11.32-11.32l40,40A8,8,0,0,1,141.66,133.66ZM200,32H136a8,8,0,0,0,0,16h56V208H136a8,8,0,0,0,0,16h64a8,8,0,0,0,8-8V40A8,8,0,0,0,200,32Z">
                </path>
            </svg>
        </button>
    </div>
</form>
</div>
