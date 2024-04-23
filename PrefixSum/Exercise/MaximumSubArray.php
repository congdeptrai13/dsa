<?php
class MaximumSubArray
{

    // c1: Perform Binary Search over the range 1 to n and find the highest subarray size such that all the subarrays of that size have the sum of elements less than or equals to k.
    // đánh giá giải  thuật 
    // time complexity: O(n*log(n)) (n + n*log(n))
    // space complexity: (O(n)) (n + n + 6)
    // auxiliary space: O(n) (n + 4)
    // public function MaximumSubArraySum($arr, $n, $k)
    // {
    //     $prefixSum = array();
    //     $prefixSum[0] = 0;
    //     for ($i = 0; $i < $n; $i++) {
    //         $prefixSum[$i + 1] = $arr[$i] + $prefixSum[$i];
    //     }

    //     return $this->binarySearch($prefixSum, $n, $k);
    // }

    // public function binarySearch($prefixSum, $n, $k)
    // {
    //     $ans = -1;
    //     $left = 0;
    //     $right = $n;
    //     while ($left <= $right) {
    //         $mid = ($right - $left) / 2;
    //         for ($i = $mid; $i <= $n; $i++) {
    //             if ($prefixSum[$i] - $prefixSum[$i - $mid] > $k) {
    //                 break;
    //             }
    //         }
    //         if ($i === $n + 1) {
    //             $left = $mid + 1;
    //             $ans = $mid;
    //         } else {
    //             $right = $mid - 1;
    //         }
    //     }
    //     return $ans;
    // }

    // c2: This method uses the Sliding Window Technique to solve the given problem. 
    // time complexity: O(n) (n + n)
    // space complexity: O(n)
    // auxiliary space: O(1)
    public function MaximumSubArraySum($arr, $n, $k)
    {
        $ans = $n;
        $sum = 0;
        $left = 0;
        $right = $n;
        $not_possible = false;
        for ($i = 0; $i < $n; $i++) {
            $sum += $arr[$i];
            while ($sum > $k) {
                $sum -= $arr[$left];
                $left++;
                $ans = $ans > $i - $left + 1 ? $i - $left + 1 : $ans;
                if ($sum === 0) {
                    $not_possible = true;
                    break;
                }
            }
            if ($not_possible) {
                $ans = -1;
                return $ans;
            }
        }
        return $ans;
    }
}
$arr = [1, 2, 10, 4];
$n = count($arr);
$k = 8;
$test = new MaximumSubArray();
echo $test->MaximumSubArraySum($arr, $n, $k);
// phpinfo();