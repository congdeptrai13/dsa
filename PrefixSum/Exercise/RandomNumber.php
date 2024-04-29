<?php
class RandomNumber
{
    public function handleRandomNumber($arr, $freq, $n)
    {
        $prefixSumFreq = array();
        for ($i = 0; $i < $n; $i++) {
            if ($i !== 0) {
                $prefixSumFreq[$i] = $prefixSumFreq[$i - 1] + $freq[$i];
            } else {
                $prefixSumFreq[$i] = $freq[$i];
            }
        }
        $r = (rand() % $prefixSumFreq[$n - 1]) + 1;
        $ceil = $this->handleCeil($prefixSumFreq, $r, 0, $n - 1);
        return $arr[$ceil];
    }
    public function handleCeil($arr, $r, $l, $h)
    {
        while ($l < $h) {
            $mid = $l + (($h - $l) >> 1);
            $r > $arr[$mid] ? ($l = $mid + 1) : $h = $mid;
        }
        return ($arr[$l] >= $r ? $l : -1);
    }
}

$arr = [1, 2, 3, 4];
$freq = [10, 5, 20, 100];
$test = new RandomNumber();
for ($i = 0; $i < 10; $i++) {

    echo $test->handleRandomNumber($arr, $freq, count($arr));
}
