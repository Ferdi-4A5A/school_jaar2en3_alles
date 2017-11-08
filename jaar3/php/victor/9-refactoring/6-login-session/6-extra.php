<?php
echo '<a href="6.php">6.php</a>';
session_start();

if (isset($_POST['submit-logout'])) {
    session_unset();
    session_destroy();
    echo 'Je bent uitgelogd';
}

if ($_SESSION['logedin']) {
    echo 'Je bent ingelogd';
    echo '<form method="post" action="">';
        echo '<button type="submit" name="submit-logout">Logout</button>';
    echo '</form>';
}