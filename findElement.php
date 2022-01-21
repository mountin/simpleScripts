<?php
// Given an array of integers A of size N and an integer B.

// array A is rotated at some pivot unknown to you beforehand.

// (i.e., 0 1 2 4 5 6 7  might become 4 5 6 7 0 1 2 ).

// You are given a target value B to search. If found in the array, return its index, otherwise return -1.

// You may assume no duplicate exists in the array.

// NOTE:- Array A was sorted in non-decreasing order before rotation.
// Input Format

// The first argument given is the integer array A.
// The second argument given is the integer B.
// Output Format

// Return index of B in array A, otherwise return -1
// Constraints

// 1 <= N <= 1000000
// 1 <= A[i] <= 10^9
// all elements in A are disitinct.
// For Example

// Input 1:
//     A = [4, 5, 6, 7, 0, 1, 2, 3]
//     B = 4
// Output 1:
//     0



function find3($array, $f){
    $l = -1;                      // l, r — левая и правая границы
    $r = count($array);
    while($l < $r - 1) {

        $m = ($l + $r) / 2;            // m — середина области поиска
        if ($array[$m] < $f)
            $l = $m;
        else
            $r = $m;                  // Сужение границ
    }
    return round($r);
}


$find = 5;
$line = [99,47,3,2,8,9,68,5,4,3,2];

sort($line);

echo find3($line, $find);






function recursion($c, $point = 0){
    $mid_point = ceil(count($c) / 2);

    $mid_value = ($c[$mid_point]);

    list($left, $right) = array_chunk($c, $mid_point);

    $search = ($point <=> $mid_value);

    if($search){
        return recursion($left, $point);
    }elseif($search == -1)
        return recursion($right, $point);
    if($search == 0)
        return $point;

}

//function abc($a ,$b){
//    $a = asort($a);
//}


