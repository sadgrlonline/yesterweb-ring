<?php
        $strJsonFileContents = file_get_contents("../webring.json");
        $array = json_decode($strJsonFileContents, true);
        $path = $_GET['d'];
        if ($path == "rand"){
            $chosenOne = array_rand($array, 1);
            header("Location: " . $array[$chosenOne]["url"], true, 302);
            die();
        }else{
            for ($i = 0; $i < count($array); $i++) {
                if ($array[$i]['url'] == $_GET['url']) {
                    if ($path == "prev") {
                        $j = $i - 1;
                        if ($j == -1) {
                            $j = count($array)-1;
                        }
                        header("Location: " . $array[$j]["url"], true, 302);
                        die();
                    } else if ($path == "next") {
                        $j = $i + 1;
                        if ($j == count($array)) {
                            $j = 0;
                        }
                        header("Location: " . $array[$j]["url"], true, 302);
                        die();
                    }
                }
            }
        }
?>