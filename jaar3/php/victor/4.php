<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI / Background color</title>
</head>

<body bgcolor="<?php echo ($_GET['color']) ? $_GET['color'] : $_COOKIE['4-background-color']; ?>">

    <form method="post" action="">
        Lengte(m): <input type="text" name="length"><br/>
        Gewicht(kg): <input type="text" name="weight"><br/>
        <button type="submit" name="btn-bmi">Submit</button>
    </form>

    <?php

        session_start();
//        session_unset();
//        session_destroy();

        // BMI
        if (isset($_POST['btn-bmi'])) {
            weight($_POST['length'], $_POST['weight']);
        }

        function weight($length, $weight) {
            if (empty($_SESSION['BMI'])) {
                $_SESSION['BMI'] = array();
            }
            $result = number_format($weight / ($length * $length), 2);
            echo "BMI: " . $result;
            array_push($_SESSION['BMI'], $result);
        };

        // BMI session table
        if (empty($_SESSION['BMI'])) {
            $_SESSION['BMI'] = array();
        } elseif (!empty($_SESSION['BMI'])) {
            echo '<table border="1">';
                echo '<tr>';
                    echo '<th>';
                        echo 'BMI';
                    echo '</th>';
                echo '</tr>';
                foreach ($_SESSION['BMI'] as $row) {
                    echo '<tr>';
                        echo '<td>';
                            echo $row;
                        echo '</td>';
                    echo '</tr>';
                }
            echo '</table>';
        }

        // Background color
        echo '<form method="get" action="">';
            echo '<select name="color">';
                echo '<option value="yellow">Geel</option>';
                echo '<option value="green">Groen</option>';
                echo '<option value="red">Rood</option>';
                echo '<option value="blue">Blauw</option>';
            echo '</select>';
            echo '<button type="submit">Pick color</button>';
        echo '</form>';

        if (isset($_GET['color'])) {
            setcookie("4-background-color", $_GET['color'], time() + 9999999999);
        }

    ?>

</body>
</html>