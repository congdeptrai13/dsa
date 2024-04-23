<?php
class LSCP
{
    public function handleLSCP($arr, $n)
    {
        $res = array();
        for ($i = 0; $i < $n; $i++) {
            $arrPrimes = array();
            $arrPrimes = $this->handlePrimesArray($arr[$i]);
            $res[] = $this->findPrefixSumMax($arrPrimes, $arr[$i]);
        }

        return $res;
    }

    public function findPrefixSumMax($arrPrimes, $limit)
    {
        $result = 0;
        $i = 0;
        $prefixSum = $this->prefixSum($arrPrimes);
        for ($i = 0; $i < count($prefixSum); $i++) {
            if ($prefixSum[$i] <= $limit && $this->isPrime($prefixSum[$i])) {
                $result = $prefixSum[$i];
            }
        }
        return $result;
    }

    public function isPrime($prime)
    {
        if ($prime <= 3) {
            return true;
        }

        for ($i = 2; $i <= sqrt($prime); $i++) {
            if ($prime % $i == 0) {
                return false;
            }
        }
        return true;
    }
    public function prefixSum($arrPrimes)
    {
        $prefixSum = array();
        $n = count($arrPrimes);
        for ($i = 0; $i < $n; $i++) {
            if ($i !== 0) {
                $prefixSum[$i] = $prefixSum[$i - 1] + $arrPrimes[$i];
            } else {
                $prefixSum[$i] = $arrPrimes[$i];
            }
        }
        return $prefixSum;
    }
    public function handlePrimesArray($limit)
    {
        $arrPrime = array();
        $arrPrime[] = 2; // 2 là số nguyên tố đầu tiên
        for ($i = 3; $i < $limit; $i++) {
            $isPrime = true;
            for ($j = 2; $j <= sqrt($i); $j++) {
                if ($i % $j == 0) {
                    $isPrime = false;
                    break;
                }
            }
            if ($isPrime) {
                $arrPrime[] = $i;
            }
        }
        return $arrPrime;
    }

}

$arr = [10, 30, 50];
$n = count($arr);
$test = new LSCP();
print_r($test->handleLSCP($arr, $n));