<?php
class Equilibriumindex
{
    // c1: Naive approach: Nested loop
    // sử dụng 2 vòng lặp 
    //vòng lặp bên ngoài n lần O(n)
    //vòng lặp trong cũng chạy n lần => O(n)
    // time complexity: O(n^2)
    // đánh giá độ phức tạp không gian:
    // c là hằng input đầu vào
    // trong vòng for ta sử dụng 2 biến sum1 và sum2 => 1*c + 1*c
    // 1 mảng arr => N *c 
    // => tổng: N * c + 1*c + 1*c
    // mà đối với nhiều input => hằng c không đáng kể => N + 1 + 1
    // space :complexity O(n)
    // đánh giá độ phức tạo không gian phụ trợ (Auxiliary Space)
    // trong hàm ta khởi tạo thêm 2 biến sum1, sum2 => 1*c + 1*c
    // => auxiliary space: O(1)
    // public function equilibrium($arr, $n)
    // {
    //     for ($i = 0; $i < $n; $i++) {
    //         $sum1 = 0;
    //         $sum2 = 0;
    //         for ($j = 0; $j < $n; $j++) {
    //             if ($j < $i) {
    //                 $sum1 += $arr[$j];
    //             } elseif ($j > $i) {
    //                 $sum2 += $arr[$j];
    //             }
    //         }
    //         if ($sum1 === $sum2) {
    //             return $i;
    //         }
    //     }
    //     return -1;
    // }

    // c2: Equilibrium index of an Array using Array-Sum:
    // đánh giá thuật toán:
    // trong code có 2 vòng lặp và đều lặp qua n phần thử => n + n (ở trường hợp xấu nhất vì vòng lặp thứ 2 có i không chạy tới n )
    //time complexity: O(2n) => O(n)
    // trong vòng lặp có 1 biến arr và 3 biến hằng => n*c + 1*c + 1*c + 1*c
    // space complexity: O(n)
    // trong hàm có 3 biến => 1*c + 1*c + 1*c
    // auxiliary space: O(1)
    // public function equilibrium($arr, $n)
    // {
    //     $leftSum = 0;
    //     $sum = 0;
    //     foreach ($arr as $val) {
    //         $sum += $val;
    //     }

    //     for ($i = 0; $i < $n; $i++) {
    //         $sum -= $arr[$i];
    //         if ($sum === $leftSum) {
    //             return $i;
    //         }
    //         $leftSum += $arr[$i];
    //     }
    //     return -1;
    // }

    // c3: Equilibrium index of an array using Prefix-Sum
    // trong giải thuật có 3 vòng lặp => n + n + n => 3n
    // time complexity: O(n)
    // trong giải thuật có 2 mảng và 1 biến => n + n + n + 1 => 3n + 1
    // space complexity: O(n)
    // trong giải thuật sử dụng 1 biến => 1
    // auxiliary space: O(1)
    // public function equilibrium($arr, $n)
    // {
    //     $prefixSumFromFront = array();
    //     for ($i = 0; $i < $n; $i++) {
    //         if ($i >= 1) {
    //             $prefixSumFromFront[] = $arr[$i] + $prefixSumFromFront[$i - 1];
    //         } else {
    //             $prefixSumFromFront[] = $arr[$i];
    //         }
    //     }
    //     $prefixSumFromBack = array();
    //     for ($i = $n - 1; $i >= 0; $i--) {
    //         if ($i <= $n - 2) {
    //             $prefixSumFromBack[$i] = $arr[$i] + $prefixSumFromBack[$i + 1];
    //         } else {
    //             $prefixSumFromBack[$i] = $arr[$i];
    //         }
    //     }

    //     for ($i = 0; $i < $n; $i++) {
    //         if ($prefixSumFromBack[$i] === $prefixSumFromFront[$i]) {
    //             return $i;
    //         }
    //     }
    //     return -1;
    // }

    // c4: Equilibrium index of an array using two pointers
    // time complexity: O(n) (n + n)
    // space complexity: O(n) (n + 5)
    // auxiliary space: O(1) (1 + 1 + 1 + 1)
    public function equilibrium($arr, $n)
    {
        $sumLeft = 0;
        $sumRight = 0;
        foreach ($arr as $val) {
            $sumRight += $val;
        }
        $left = 0;
        $right = $n;
        while ($left < $right) {
            $sumRight -= $arr[$left];
            if ($sumRight === $sumLeft) {
                return $left;
            }
            $sumLeft += $arr[$left];
            $left++;
        }
        return -1;
    }
}


$arr = [-7, 1, 5, 2, -4, 3, 0];
$n = count($arr);
$test = new Equilibriumindex();
echo $test->equilibrium($arr, $n);
