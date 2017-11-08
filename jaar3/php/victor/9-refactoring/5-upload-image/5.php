<?php

if (isset($_POST['submit'])) {
    $test = move_uploaded_file($_FILES['fileToUpload']['tmp_name'], '/media/sf_www/school/jaar3/php/victor/'.$_FILES['fileToUpload']['name']);
    echo '<img src="../../'.$_FILES['fileToUpload']['name'].'" style="width:300px;height:225px;">';
}