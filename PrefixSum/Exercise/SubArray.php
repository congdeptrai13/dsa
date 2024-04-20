<?php
class SubArray
{

    // c1: Subarray with 0 sum using Nested loop 
    // time complexity: O(n^2) (n*n)
    // space complexity: O(n) (n + 1 + 1)
    // auxiliary space: O(1) (1 + 1 + 1)
    // public function Subarray($arr, $n)
    // {
    //     for ($i = 0; $i < $n; $i++) {
    //         $sum = 0;
    //         for ($j = $i; $j < $n; $j++) {
    //             $sum += $arr[$j];
    //             if ($sum === 0) {
    //                 return $i . " " . $j;
    //             }
    //         }
    //     }
    //     return -1;
    // }

    // c2: Subarray with 0 sum using Hashing
    // time complexity: O(n)
    // space complexity: O(n) (n + n + 1 + 1 = 2n + 2)
    // auxiliary space: O(n) (n + 1 + 1 = n + 2)
    public function Subarray($arr, $n)
    {
        $sum = 0;
        $hash = array();
        for ($i = 0; $i < $n; $i++) {
            $sum += $arr[$i];
            isset($hash[$sum]) ? $hash[$sum] += 1 : $hash[$sum] = 1;
            if ($hash[$sum] !== 1) {
                return $i;
            }
        }
        return -1;
    }
    

}

//driver's code
$arr = [4, 2, -3, 1, 6];
$n = count($arr);
$test = new SubArray();
echo $test->Subarray($arr, $n);

