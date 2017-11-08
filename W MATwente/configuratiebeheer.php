<?php

include 'header.php' ;
require('databaseHandlerClass.php');
$handler = new dbHandler('192.168.56.1', 'matwente', 'mainuser', 'dev01dev');

?>
<body>
<div class="container">

    <div class="col-md-3">

        <form method="post" action="" class="form-melden">

            <select name="configuratieModel">
                <option value="">Model</option>
                <option value="DESKTOP">Desktop</option>
                <option value="LAPTOP">Laptop</option>
            </select>

            <br />
            <br />

            <input type="text" name="configuratieCPU" placeholder="CPU" />

            <br />
            <br />

            <input type="text" name="configuratieMemory" placeholder="Memory" />

            <br />
            <br />

            <input type="text" name="configuratieHarddisk" placeholder="Hard disk" />

            <br />
            <br />

            <input type="text" name="configuratieOS" placeholder="Operating System" />

            <br />
            <br />

            <input type="text" name="configuratieVideocard" placeholder="Videocard" />

            <br />
            <br />

            <button type="submit" name="submit">Registreer</button>

        </form>

    </div>

    <div class="col-md-9">
        <?php
            $sql = "SELECT `configuratieModel`, `configuratieCPU`, `configuratieMemory`, `configuratieHarddisk`, `configuratieOS`, `configuratieVideocard` FROM `Configuraties` LIMIT 0, 24";
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
                $sql = "INSERT INTO `matwente`.`Configuraties`(`configuratieModel`, `configuratieCPU`, `configuratieMemory`, `configuratieHarddisk`, `configuratieOS`, `configuratieVideocard`) VALUES ('" . $_POST['configuratieModel'] ."', '" . $_POST['configuratieCPU'] ."', '" . $_POST['configuratieMemory'] ."', '" . $_POST['configuratieHarddisk'] ."', '" . $_POST['configuratieOS'] ."', '" . $_POST['configuratieVideocard'] ."')";
                echo $handler->CreateData($sql);
            echo "Nieuwe configuratie toegevoegd!<br>";
            }

        ?>

    </div>

</div>

</body>
</html>