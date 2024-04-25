<?php

class LongestSpan
{
    // c1: find longest span with 2 loop(Simple Solution) 
    // time complexity: O(n^2)
    // space complexity: O(n) (2n + 5)
    // auxiliary space: O(1)
    // public function handleLongestSpan($arr1, $arr2)
    // {
    //     $res = 0;
    //     for ($i = 0; $i < count($arr1); $i++) {
    //         $sum1 = 0;
    //         $sum2 = 0;
    //         for ($j = $i; $j < count($arr2); $j++) {
    //             $sum1 += $arr1[$j];
    //             $sum2 += $arr2[$j];
    //             if ($sum1 === $sum2 && ($j === 0 || $j - $i + 1 > $res)) {
    //                 $res = $j - $i + 1;
    //             }
    //         }
    //     }
    //     return $res;

    // }

    // c2: Using Auxiliary Array
    // time complexity: O(n)
    // space complexity: O(n)
    // auxiliary space: O(1)
    // public function handleLongestSpan($arr1, $arr2)
    // {
    //     $auxiliaryArr = [];
    //     $res = 0;
    //     $preSum1 = 0;
    //     $preSum2 = 0;
    //     for ($i = 0; $i < count($arr1); $i++) {
    //         $preSum1 += $arr1[$i];
    //         $preSum2 += $arr2[$i];
    //         $curr_sum = $preSum1 - $preSum2;
    //         if ($curr_sum === 0) {
    //             $res = $i + 1;
    //         } elseif (!isset($auxiliaryArr[$curr_sum])) {
    //             $auxiliaryArr[$curr_sum] = $i;
    //         } else {
    //             $len = $i - $auxiliaryArr[$curr_sum];
    //             $res = max($res, $len);
    //         }
    //     }
    //     return $res;
    // }

    // c3: sử dụng hashing 
    // time complexity: O(n)
    // space complexity: O(n)
    // auxiliary space: O(n)
    public function handleLongestSpan($arr1, $arr2)
    {
        $hashingTable = array();
        $arr = array();
        for ($i = 0; $i < count($arr1); $i++) {
            $arr[] = $arr1[$i] - $arr2[$i];
        }

        $sum = 0;
        $res = 0;
        for ($i = 0; $i < count($arr1); $i++) {
            $sum += $arr[$i];
            if ($sum === 0) {
                $res = $i + 1;
            }

            if (isset($hashingTable[$sum])) {
                $res = max($res, $i - $hashingTable[$sum]);
            } else {
                $hashingTable[$sum] = $i;
            }
        }
        return $res;
    }

}

// drive's code 
$arr1 = [0, 1, 0, 0, 0, 0];
$arr2 = [1, 0, 1, 0, 0, 1];
$test = new LongestSpan();
echo $test->handleLongestSpan($arr1, $arr2);
