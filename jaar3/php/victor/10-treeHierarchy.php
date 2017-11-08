<?php

    $tree = array
    (
        [
            "value" => 6,
            "parent" => NULL,
        ],
        [
            "value" => 2,
            "parent" => 6,
        ],
        [
            "value" => 1,
            "parent" => 2,
        ],
        [
            "value" => 4,
            "parent" => 2,
        ],
        [
            "value" => 3,
            "parent" => 4,
        ],
        [
            "value" => 5,
            "parent" => 4,
        ],
        [
            "value" => 8,
            "parent" => 6,
        ],
        [
            "value" => 7,
            "parent" => 8,
        ],
        [
            "value" => 9,
            "parent" => 8,
        ],
    );

//    var_dump(getParent($tree, 6));

    function getParent($tree, $number) {
        foreach ($tree as $entry) {
            if ($entry['value'] == $number) {
                $test = $entry['parent'];
            }
        }
        foreach ($tree as $entry) {
            if ($entry['value'] == $test) {
                return $entry;
            }
        }
    }

//    var_dump(getChildren($tree, 6));

    function getChildren($tree, $number) {
        foreach($tree as $entry) {
            if ($entry['parent'] == $number) {
                $arrayNew[] = $entry;
            }
        }
        if ($arrayNew) {
            return $arrayNew;
        } else {
            return $arrayNew = array();
        }
    }



    // voor de gehele array, als er een parent van de value van de eerste loop bestaat, loop door de hele array en -> echo <ul>$tree[indexUitArray]['value']</ul> al die values, is eerste nivo
    // doe hetzelfde bij de volgende en voeg die weer toe aan de eerste ul, maar hoe :p


    var_dump($tree);

    echo '<ul>';
        for ($i=0; $i<3; $i++) {
//            foreach ($tree as $value) {
            // hoe de fuck moet je UL gaan stacken??
            if ($tree[$i]['parent'] != $tree[$i-1]['parent']) {
                echo '<ul>';
                    echo '<li>';
                        echo $tree[$i]['value'];
                    echo '</li>';
                if ($tree[$i]['parent'] == $tree[$i+1]['parent']) {
                    echo '<li>';
                        echo $tree[$i+1]['value'];
                    echo '</li>';
                }
                echo '</ul>';
            } elseif ($tree[$i]['parent'] == $tree[$i-1]['parent']) {
                echo '<li>';
                    echo $tree[$i]['value'];
                echo '</li>';
            }
//            }
        }
    echo '</ul>';



//    $arrayBonus = [1,[2,[3]]];

//var_dump($tree[0]);
//var_dump(getChildren($tree, 6));

//    echo '<ul>';
//        for ($i=0; $i<count($tree); $i++) {
////            var_dump($tree[$i]['value']);
//            var_dump($tree[$i]['parent']);
////            var_dump('--------');
////            echo '<li>';
////                echo $tree[$i]['value'];
////            echo '</li>';
//        }
//    echo '</ul>';

//    echo '<ul>';
//        foreach($arrayBonus as $value => $key) {
//            echo '<li>';
//                echo '1';
//            echo '</li>';
//
//            echo '<ul>';
//                echo '<li>';
//                    echo '4';
//                echo '</li>';
//            echo '</ul>';
//        }
//    echo '</ul>';

//    echo '<ul>';
//        foreach($tree as $value => $key) {
//            echo '<li>';
//                echo $value;
//            echo '</li>';
//
//            echo '<ul>';
//                echo '<li>';
//                    echo '4';
//                echo '</li>';
//            echo '</ul>';
//        }
//    echo '</ul>';