<?php

    $tree = array
    (
        [
            "value" => "Home",
            "parent" => NULL,
        ],
        [
            "value" => "About Us",
            "parent" => "Home",
        ],
        [
            "value" => "Contact Us",
            "parent" => "Home",
        ],
        [
            "value" => "Services",
            "parent" => "Home",
        ],
        [
            "value" => "Location (map)",
            "parent" => "Contact Us",
        ],
        [
            "value" => "Web Design",
            "parent" => "Services",
        ],
        [
            "value" => "Print Design",
            "parent" => "Services",
        ],
        [
            "value" => "Portfolio",
            "parent" => "Services",
        ],
    );

//    $test = [
//        [["value" => "Home","parent" => NULL]],
//        [["value" => "About Us","parent" => "Home"],
//        ["value" => "Contact Us","parent" => "Home"],
//        ["value" => "Services","parent" => "Home"]],
//        [["value" => "Location (map)","parent" => "Contact Us"]],
//        [["value" => "Web Design","parent" => "Services"],
//        ["value" => "Print Design","parent" => "Services"],
//        ["value" => "Portfolio","parent" => "Services"]]
//    ];

        // is gewoon niet dynamisch te doen dit?!
        //Erdoorheen loopen en <ul> stacken is sowieso vrijwel onmogelijk, naast elkaar wel

//$foo = [
//    0 => [1,2],
//    1 => [3],
//    2 => [4],
//    4 => [5],
//];
//
//function track($array, $index = 0) {
//    $out = '<ul>';
//    if (isset($array[$index]) && is_array($array[$index])) {
//        foreach($array[$index] as $track) {
//            $out .= '<li>'.$track;
//            $out .= track($array, $track);
//            $out .= '</li>';
//        }
//    }
//    $out .= '</ul>';
//    return $out;
//}
















//function test($tree) {
//    echo '<ul>';
////        foreach ($tree as $row) {
////            echo '<ul>';
//                echo '<li>';
////                    echo $row['value'];
//                echo '</li>';
////            echo '</ul>';
//        }
//    echo '</ul>';
//}




















        echo '<ul>';
            for ($i=0; $i<count($tree); $i++) {
                if ($tree[$i]['parent'] != $tree[$i-1]['parent']) {
                    $testasdf[] = $tree[$i]['parent'];
//                    var_dump($testasdf);

//                        foreach ($tree as $row) {
////                            if (in_array($row['']))
//                        }

                    foreach ($tree as $row) {
                        echo '<ul>';
                            echo '<li>';
                                echo $row['value'];
                            echo '</li>';
                        echo '</ul>';
                    }



                } elseif ($tree[$i]['parent'] == $tree[$i-1]['parent']) {
                    echo '<li>';
                        echo $tree[$i]['value'];
                    echo '</li>';
                }

            }
        echo '</ul>';

    function getSiblings($tree, $title) {
        foreach ($tree as $row) {
            if ($row['value'] == $title) {
                $parent = $row['parent'];
                break;
            }
        }

        $siblings = array();
        foreach ($tree as $row) {
            if ($row['parent'] == $parent && $row['value'] != $title) {
                $siblings[] = $row['value'];
            }
        }
        return $siblings;
    }