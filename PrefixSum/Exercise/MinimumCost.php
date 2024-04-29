<?php
class MinimumCost
{

    // c1:
    // time complexity: O(n*log n)
    // space complexity: O(n)
    // auxiliary space: O(1)
    // public function handleMinimumCost($arr, $n, $k)
    // {
    //     sort($arr);
    //     $coin_needed = ceil($n / ($k + 1));

    //     $ans = 0;
    //     for ($i = 0; $i < $coin_needed; $i++) {
    //         $ans += $arr[$i];
    //     }
    //     return $ans;
    // }

    // c2:
    // time complexity: O(n*log n)
    // space complexity: O(n)
    // auxiliary space: O(1)
    public function handleMinimumCost($arr, $n, $k)
    {
        $coin_needed = ceil($n / ($k + 1));
        $coin = $this->handlePrefixSum($arr, $n);
        return $coin[$coin_needed - 1];
    }
    public function handlePrefixSum($arr, $n)
    {
        sort($arr);
        for ($i = 1; $i < $n; $i++) {
            $arr[$i] += $arr[$i - 1];
        }
        return $arr;
    }
}

$arr = [100, 20, 50, 10, 2, 5];
$n = count($arr);
$k = 3;
$test = new MinimumCost();
echo $test->handleMinimumCost($arr, $n, $k);