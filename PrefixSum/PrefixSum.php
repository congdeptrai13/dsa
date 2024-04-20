<?php
class PrefixSum
{
    // Add 0 -> n 
    public function fillPrefixSum($arr, $n)
    {
        $prefixSum = array();
        $prefixSum[0] = $arr[0];
        for ($i = 1; $i < $n; $i++) {
            $prefixSum[$i] = $prefixSum[$i - 1] + $arr[$i];
        }
        return $prefixSum;
    }

    // Sum of an array between indexes L and R using Prefix Sum:
    public function AddLToRPrefixSum($arr, $n, $left, $right)
    {
        $prefixSum = $this->fillPrefixSum($arr, $n);
        return $left >= 1 ? $prefixSum[$right] - $prefixSum[$left - 1] : $prefixSum[$right];
    }

    public function maxInPrefixSum($arr)
    {
        $max = $arr[0];
        foreach ($arr as $key => $val) {
            if ($val > $max) {
                $max = $val;
            }
        }
        return $max;
    }


    public function SolveAddOperationsPrefixSum($arr, $n, $m)
    {
        for ($i = 0; $i < $m; $i++) {
            echo "nhập a:";
            $a = trim(fgets(STDIN));
            echo "nhập b:";
            $b = trim(fgets(STDIN));
            $arr[$a - 1] += 100;
            $arr[$b] -= 100;
        }

        $prefixSum = $this->fillPrefixSum($arr, $n);
        echo "Highest element:" . $this->maxInPrefixSum($arr) . "<br/>";
        return $prefixSum;
    }


}


$arr = [0, 0, 0, 0, 0];
$n = count($arr);
$test = new PrefixSum;
// // print_r($test->fillPrefixSum($arr, $n));
// print_r($test->AddLToRPrefixSum($arr, $n, 1, 2));
print_r($test->SolveAddOperationsPrefixSum($arr, $n, 3));



