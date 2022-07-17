<?php

    function isNumInArray(int $num, array $array) : bool
    {
        foreach ($array as $arrN) {
            if ($arrN == $num) {
                return true;
            }
        }

        return false;
    }

    function removeDuplicatesInArray(array $arr): array {
        for ($i=0; $i < count($arr) ; $i++) { 
            $seenValues = [];
            for ($j=0; $j < count($arr[$i]) ; $j++) { 
                $num = $arr[$i][$j];
                
                if (!isNumInArray($num, $seenValues)) {
                    array_push($seenValues, $num);
                }
                else{
                    $arr[$i][$j] = 0;
                }
            }
        }
        return $arr;
    }

    function printArray(array $arr) {
        echo json_encode($arr);
    }

    
    $arr = [
        [1,3,1,2,3,4,4,3,5],
        [2,2,2,3],
        [1,1,2,3],
        [1,2,3,3],
    ];

    echo "<p>before removal of duplicates</p>";
    printArray($arr);
    
    $newArr = removeDuplicatesInArray($arr);

    echo "<p>after removal of duplicates</p>";
    printArray($newArr);
?>