<?php
class MaxModulo
{
    // c1: native approach 
    // time complexity: O(n^2)
    // space complexity: O(n)
    // auxiliary space: O(1)
    // public function handleMaxModulo($arr, $m)
    // {
    //     $res = 0;
    //     for ($i = 0; $i < count($arr); $i++) {
    //         $sum = 0;
    //         for ($j = $i; $j < count($arr); $j++) {
    //             $sum += $arr[$j];
    //             if ($sum % $m > $res) {
    //                 $res = $sum % $m;
    //             }
    //         }
    //     }
    //     return $res;
    // }

    // c2: efficient approach
    // time complexity: O(n^2)
    // space complexity: O(n)
    // auxiliary space: O(n)
    public function handleMaxModulo($arr, $m)
    {
        $sum = 0;
        $res = 0;
        $set = array();
        $set[] = 0;
        for ($i = 0; $i < count($arr); $i++) {
            $sum = ($sum + $arr[$i]) % $m;
            if ($sum > $res) {
                $res = $sum;
            }
            $it = max($set);

            if ($it !== 0 && $it >= $sum + 1) {
                $res = max($res, $sum - $it + $m);
            }
            $set[] = $sum;
        }

        return $res;

    }
}


// driver's code 
$arr = [3, 3, 9, 9, 5];
$m = 7;

$test = new MaxModulo();
echo $test->handleMaxModulo($arr, $m);


