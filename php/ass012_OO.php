<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'class.fileHandler.php';

$handler = new fileHandler("fileOne2333", ".txt");
var_dump($handler);
//$output = $handler->fileName;

//echo $handler->createFile();
//echo $handler->updateFile();
//echo $handler->deleteFile();
//echo $handler->fileSize();

?>

<form action="" method="post">
    <textarea name="comment" rows="5" cols="40"><?php echo $handler->readFile();?></textarea><br>
<!--    <input type="submit" value="Opslaan" onclick="--><?php //$handler->updateFile();?><!--">-->
</form>