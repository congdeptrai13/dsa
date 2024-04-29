<?php
$max = 1000000;

class MaximumOccur
{
    // c1: sử dụng hash để xử lý bài toán 
    // time complexity: O(n*m)
    // space complexity: O(m)
    // auxiliary space: O(m)
    // public function handleMaximumOccur($arrL, $arrR)
    // {
    //     $hash = array();
    //     for ($i = 0; $i < count($arrL); $i++) {
    //         if (isset($hash[$arrL[$i]])) {
    //             $hash[$arrL[$i]] += 1;
    //         } else {
    //             $hash[$arrL[$i]] = 1;
    //         }

    //         if (isset($hash[$arrR[$i]])) {
    //             $hash[$arrR[$i]] += 1;
    //         } else {
    //             $hash[$arrR[$i]] = 1;
    //         }
    //     }

    //     for ($i = 0; $i < count($arrL); $i++) {
    //         for ($j = $arrL[$i]; $j <= $arrR[$i]; $j++) {
    //             if (isset($hash[$j])) {
    //                 $hash[$j] += 1;
    //             }
    //         }
    //     }

    //     echo "<pre>";
    //     print_r($hash);
    //     echo "</pre>";
    //     $max = max($hash);
    //     return array_search($max, $hash);
    // }
    public function handleMaximumOccur($L, $R, $n)
    {
        global $max;
        $arr = array_fill(0, $max, 0);
        for ($i = 0; $i < $n; $i++) {
            $arr[$L[$i]] += 1;
            $arr[$R[$i] + 1] -= 1;
        }

        $msum = $arr[0];
        $ind = 0;

        for ($i = 1; $i < $max; $i++) {
            $arr[$i] += $arr[$i - 1];
            if ($msum < $arr[$i]) {
                $msum = $arr[$i];
                $ind = $i;
            }
        }
        return $ind;
    }
}

$arrL = [1, 4, 9, 13, 21];
$arrR = [15, 8, 12, 20, 30];
$test = new MaximumOccur();
echo $test->handleMaximumOccur($arrL, $arrR, count($arrL));