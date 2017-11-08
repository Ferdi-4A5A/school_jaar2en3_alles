<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

$teamName = "The Penguins";
$teamState = "Connecticut";
$numWins = 12;
$numLosses = 2;

print "The name of the team is " . $teamName;
print "<br>" . "The team is from " . $teamState;
print "<br>" . $teamName . " have won " . $numWins . " games and have lost " . $numLosses . " games";

function printMessage($name) {
    print "<br>" . "Hello " . $name . "<br>";
}

printMessage("Sjaak");

function substract($num1, $num2) {
    print $num1 - $num2;
}
substract(10, 5);

?>


</body>
</html>