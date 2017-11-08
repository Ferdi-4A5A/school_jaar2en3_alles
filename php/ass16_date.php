<?php

$theDate = date("l");
echo "Today's date: $theDate";

$newTimeStamp = mktime(02, 02, 00, date("m"), date("d"), date("Y") -20);

$theDate = date("m/d/y", $newTimeStamp); echo "<br />";
echo ( $theDate);

?>