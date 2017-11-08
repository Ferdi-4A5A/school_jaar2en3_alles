
<!--//Een basisschool berekent de ouderbijdrage als volgt:-->
<!--//-->
<!--//Een basisbedrag van € 50,=. Daarnaast voor elk kind jonger dan 10 jaar € 25,= (voor maximaal 3 kinderen) en voor elk kind van 10 jaar en ouder € 37,= (voor maximaal 2 kinderen).-->
<!--// De maximale ouderbijdrage bedraagt € 150,=.-->
<!--//-->
<!--//Voor éénoudergezinnen wordt op de berekende bijdrage (nádat de controle op het maximum heeft plaatsgevonden) een reductie toegepast van 25%.-->
<!--//De te ontwikkelen software moet aan de hand van de gezinsgegevens de verschuldigde ouderbijdrage bepalen. De leeftijd van elk kind moet aan de hand van geboortedatum en een peildatum-->
<!--// worden berekend.-->
<!---->
<!---->
<!---->
<!---->
<!--// basisbedrag = 50e-->
<!--//jonger dan 10 jaar(max 3 kinderen) = 25e-->
<!--//ouder dan 10 jaar (max 2 kinderen) = 37e-->
<!--// maximale ouderbijdrage = 150e-->
<!---->
<!--//eenoudergezin = reductie 25%-->
<!---->
<!---->
<!--// gezinsgegevens invullen berekend automatisch ouderbijdrage, leeftijd elk kind met geboortedatum en peildatum berekenen-->

<!--input :-->
<!---->
<!---->
<!--aantal kinderen voor onderstaande (select)-->
<!--geboortedatum per kind (date?)-->
<!--peildatum per kind (date?)-->
<!--Eenoudergezin of niet (keuze) (select)-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

Aantal kinderen:<br>
<select>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
</select>

<form action="action_page.php">
    Birthday:
    <input type="date" name="bday">
    <input type="submit">
</form>

<br>
Eenoudergezin:<br>
<select>
    <option value="ja">Ja</option>
    <option value="nee">Nee</option>
</select>

<?php



?>


</body>
</html>