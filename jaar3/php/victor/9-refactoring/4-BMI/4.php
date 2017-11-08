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

        if (isset($_GET['color'])) {
            setcookie("4-background-color", $_GET['color'], time() + 9999999999);
        }

    ?>
