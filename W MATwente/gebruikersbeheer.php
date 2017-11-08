<?php
include 'header.php' ;
require('databaseHandlerClass.php');

$handler = new dbHandler('192.168.56.1', 'matwente', 'mainuser', 'dev01dev');

?>
<div class="container">

    <div class="col-md-3">

        <form method="post" action="" class="form-melden">

            <input type="text" name="medewerkerVoorletter" placeholder="Voorletter(s)" />

            <br />
            <br />

            <input type="text" name="medewerkerAchternaam" placeholder="Achternaam" />

            <br />
            <br />

            <select name="geslacht">
                <option value="">Geslacht</option>
                <option value="Man">Man</option>
                <option value="Nietman">Niet Man</option>
                <option value="Vrouw">Vrouw</option>
            </select>

            <br />
            <br />

            <input type="text" name="pcID" placeholder="PC ID" />

            <br />
            <br />

            <select name="medewerkerAfdeling">
                <option value="">Afdeling</option>
                <option value="Directie">Directie</option>
                <option value="CAD">CAD</option>
                <option value="Engeneering">Engeneering</option>
                <option value="Financiele Administratie">Financiele Administratie</option>
                <option value="HRM">HRM</option>
                <option value="ICT">ICT</option>
                <option value="Onderzoek">Onderzoek</option>
                <option value="Planning">Planning</option>
                <option value="Project planning">Project planning</option>
                <option value="Rapportage">Rapportage</option>
                <option value="Secretariaat">Secretariaat</option>
                <option value="Verkoop en Marketing">Verkoop en Marketing</option>
            </select>

            <br />
            <br />

            <button style="float:right" type="submit" name="submit">Registreer</button>

        </form>

    </div>

    <div class="col-md-9">

        <?php
            $limit = 40;
            //$limitMax = $limit+19;
            $sql = "SELECT `medewerkerVoorletter`, `medewerkerAchternaam`, `medewerkerGeslacht`, `medewerkerAfdeling`, `pcID`, `medewerkerAfdeling`, `medewerkerInternTelefoonNummer`, `medewerkerBinnenOfBuitenDienst`  FROM `medewerkers` LIMIT $limit, 24";
            $res = $handler->readData($sql);
            echo "<table class='table-gebruikersbeheer' border='1'>";
            foreach ($res as $row)
            {
                foreach ($row as $key => $val)
                {
                    echo "<th>$key</th>";
                }
                    echo "<th>Update</th>";
                break;
            }

            foreach ($res as $row) {
                echo "<form action='' method='POST'>";
                    echo "<tr>";
                       foreach ($row as $key => $val) {
                           echo "<td><input value='".$val."' name=".$key."></td>";
                       }
                        echo "<td><input type='submit' /></td>";
                    echo "</tr>";
                 echo "</form>";
            }

            if(isset($_POST['submit'])){
                $sql = "INSERT INTO `matwente`.`medewerkers`(`medewerkerVoorletter`, `medewerkerAchternaam`, `medewerkerGeslacht`, `pcID`, `medewerkerAfdeling`) VALUES ('" . $_POST['medewerkerVoorletter'] ."', '" . $_POST['medewerkerAchternaam'] ."', '" . $_POST['medewerkerGeslacht'] ."', '" . $_POST['pcID'] ."', '" . $_POST['medewerkerAfdeling'] ."')";
                echo $handler->CreateData($sql);
                echo " Nieuwe medewerker toegevoegd!<br>";
            }
        ?>

    </div>

</div>
