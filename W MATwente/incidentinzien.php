<?php
include 'header.php' ;
require('databaseHandlerClass.php');

$handler = new dbHandler('192.168.56.1', 'matwente', 'mainuser', 'dev01dev');

?>

<body>
<div class="container">

    <div class="row">

        <div class="col-md-12">

            <form method="get" action="">

                <div class="col-md-5">

                    <select>
                        <option value="volvo">Onderwerp</option>
                        <option value="saab">Doet niet meer</option>
                        <option value="mercedes">Loopt vast</option>
                        <option value="audi">Geen verbinding</option>
                    </select>

                </div>

                <div class="col-md-5">

                    <select>
                        <option value="volvo">Configuratie</option>
                        <option value="saab">Desktop</option>
                        <option value="mercedes">Laptop</option>
                        <option value="audi">Mobile</option>
                    </select>

                </div>

                <div class="col-md-2">
                    <button style="float:right;margin-top:7px;" type="submit">Submit</button>
                </div>

            </form>

        </div>

    </div>

    <div class="col-md-12 col-margin-top">
        <?php
            $sql = "SELECT `meldingVraagBetrekkeningMedewerkers`, `meldingVraagAanmeldDag`, `meldingVraagOmschrijving`, `meldingVraagOmschrijvingDetails`, `meldingVraagBinnenOfBuitenDienst` FROM `MeldingenVragen` LIMIT 0, 6";
            $res = $handler->readData($sql);

            echo "<form action='' method='POST'>";
                echo '<table class="table-incidentinzien" border="1">';
                    foreach ($res as $row)
                    {
                        echo "<th>In behandeling</th>";
                        foreach ($row as $key => $val) {
                            echo "<th>$key</th>";
                        }
                        break;
                    }

                    foreach ($res as $row) {
                        echo "<tr>";
                            echo '<td style="text-align: center;"><input type="checkbox" /></td>';
                            foreach ($row as $key => $val) {
                               echo "<td>$val</td>";
                            }
                       echo "</tr>";
                    }
                echo '</table>';
                echo '<button style="margin-top:10px;" type="submit">Edit incident</button>';

            echo "</form>";

        if(isset($_POST['submit'])){
            $sql = "INSERT INTO `matwente`.`medewerkers`(`MedewerkerID`, `PCID`, `MedewerkerGeslacht`, `MedewerkerVoorletter`, `MedewerkerAchternaam`, `MedewerkerAfdeling`, `MedewerkerInternTelefoonNummer`, `MedewerkerBinnenOfBuitenDienst`) VALUES (NULL, 52, '" . $_POST['geslacht'] ."', '" . $_POST['voorletter'] ."', '" . $_POST['achternaam'] ."', '" . $_POST['afdeling'] ."', 252, 1)";
            echo $handler->CreateData($sql);
            echo "Nieuwe gebruiker toegevoegd!<br>";
        }
        ?>
    </div>

</div>

</body>
</html>