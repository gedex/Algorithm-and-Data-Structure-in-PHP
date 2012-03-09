<?php
/**
 * Implementation of counting sort algorithm in PHP. This code is
 * direct pseudo-code implementation from Cormen et al book, Introduction
 * to Algorithms.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

/**
 * Assuming each value in the range 0 to $k, and $k = O(n) to be able to sort
 * linearly.
 *
 * @param reference &$elements
 * @param int $k Upper bound value where $k = O(n)
 * @return void
 */
function counting_sort(&$elements, $k) {
  // Place holder for sorted elements
  $sorted_elements = $elements;

  // Temporary array
  $temp_elements = array();
  for ($i = 0; $i <= $k; $i++) {
    $temp_elements[$i] = 0;
  }
  for ($i = 0; $i < sizeof($elements); $i++) {
    $temp_elements[$elements[$i]]++;
  }

  // After above loop, $temp_elements[$i] now contains number of elements
  // equal to $i. For example :
  //                 index: 0  1  2  3  4  5
  // $elements =      array(1, 1, 0, 0, 3, 1), after the loop :
  //
  //                 index: 0  1  2  3
  // $temp_elements = array(2, 3, 0, 1)
  
  for ($i = 1; $i <= $k; $i++) {
    $temp_elements[$i] += $temp_elements[$i - 1];
  }
  // After above loop, $temp_elements[$i] now contains number of elements
  // less than or equal to $i. For example:
  //                 index: 0  1  2  3
  // $temp_elements = array(2, 3, 0, 1), after the loop :
  //                 index: 0  1  2  3
  // $temp_elements = array(2, 5, 5, 6)

  for ($i = sizeof($elements) - 1; $i >= 0; $i--) {
    $sorted_elements[$temp_elements[$elements[$i]] - 1] = $elements[$i];
    $temp_elements[$elements[$i]]--;
  }
  $elements = $sorted_elements;
}

// Example usage:
$a = array(3, 5, 9, 8, 5, 7, 2, 1, 13, 2, 2, 4, 3, 1, 6);
var_dump($a);
counting_sort($a, 13); // Sort the elements, k = 13
var_dump($a);
