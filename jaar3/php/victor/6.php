<?php

echo '<a href="6-extra.php">6-extra.php</a>';
session_start();

if (isset($_POST['submit-login']) && $_POST['username'] == 'open' && $_POST['password'] == 'sesame') {
    $_SESSION['logedin'] = true;
}

if (isset($_POST['submit-logout'])) {
    session_unset();
    session_destroy();
    echo 'Je bent uitgelogd';
}

if (!$_SESSION['logedin']) {
    echo '<form method="post" action="">';
        echo '<input type="text" name="username" /> <br />';
        echo '<input type="password" name="password" /> <br />';
        echo '<button type="submit" name="submit-login">Login</button>';
    echo '</form>';
    if (isset($_POST['submit-login'])) {
        echo 'Verkeerde login gegevens!';
    }
} elseif ($_SESSION['logedin']) {
    echo 'Je bent ingelogd';
    echo '<form method="post" action="">';
        echo '<button type="submit" name="submit-logout">Logout</button>';
    echo '</form>';
}

