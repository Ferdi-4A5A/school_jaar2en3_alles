<?php
include 'header.php' ;
require('databaseHandlerClass.php');

$handler = new dbHandler('192.168.56.1', 'matwente', 'mainuser', 'dev01dev');

?>

<body>
<div class="container">

    <div class="col-md-12">
        <?php
            $sql = "SELECT `meldingVraagBetrekkeningMedewerkers`, `meldingVraagAanmeldDag`, `meldingVraagOmschrijving`, `meldingVraagOmschrijvingDetails`, `meldingVraagBinnenOfBuitenDienst` FROM `MeldingenVragen` LIMIT 0, 6";
            $res = $handler->readData($sql);

            echo '<div class="col-md-12" style="text-align:center;margin-bottom:10px;font-size: 20px;font-weight: bold;">';
                echo 'In behandeling door u';
            echo '</div>';

            echo "<form action='' method='POST'>";

                echo '<table class="table-incidentinzien" border="1">';

                    foreach ($res as $row) {
                        echo "<th>In behandeling</th>";
                        foreach ($row as $key => $val) {
                            echo "<th>$key</th>";
                        }
                        break;
                    }

                    foreach ($res as $row) {
                        echo "<tr>";
                            echo '<td style="text-align:center;"><input type="checkbox" /></td>';
                            foreach ($row as $key => $val) {
                               echo "<td>$val</td>";
                            }
                       echo "</tr>";
                    }

                echo '</table>';

                echo '<button style="margin-top:10px;" type="submit">Submit</button>';

            echo "</form>";

            echo '<div class="col-md-12 col-margin-top" style="text-align:center;margin-bottom:10px;font-size: 20px;font-weight: bold;">';
                echo 'Afgehandeld door u';
            echo '</div>';

            echo "<form action='' method='POST'>";

                echo '<table class="table-incidentinzien" border="1">';

                    foreach ($res as $row) {
                        echo "<th>In behandeling</th>";
                        foreach ($row as $key => $val) {
                            echo "<th>$key</th>";
                        }
                        break;
                    }

                    foreach ($res as $row) {
                        echo "<tr>";
                            echo '<td style="text-align:center;"><input type="checkbox" /></td>';
                            foreach ($row as $key => $val) {
                               echo "<td>$val</td>";
                            }
                       echo "</tr>";
                    }

                echo '</table>';

                echo '<button style="margin-top:10px;" type="submit">Submit</button>';

            echo "</form>";

        if(isset($_POST['submit'])) {
            $sql = "INSERT INTO `matwente`.`medewerkers`(`MedewerkerID`, `PCID`, `MedewerkerGeslacht`, `MedewerkerVoorletter`, `MedewerkerAchternaam`, `MedewerkerAfdeling`, `MedewerkerInternTelefoonNummer`, `MedewerkerBinnenOfBuitenDienst`) VALUES (NULL, 52, '" . $_POST['geslacht'] ."', '" . $_POST['voorletter'] ."', '" . $_POST['achternaam'] ."', '" . $_POST['afdeling'] ."', 252, 1)";
            echo $handler->CreateData($sql);
            echo "Nieuwe gebruiker toegevoegd!<br>";
        }
        ?>
    </div>

</div>

</body>
</html>