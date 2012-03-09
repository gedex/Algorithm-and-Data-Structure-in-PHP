<?php
/**
 * Implementation of merge sort algorithm in PHP. This code is
 * direct pseudo-code implementation from Cormen et al book, Introduction
 * to Algorithms.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

 // Upper bound on each merge operation
define('SENTINEL', 999999999999999999);

/**
 * Merge two partitions, left and right, into single sorted parition.
 * @param reference $elements Reference to array element.
 * @param int $p Lower bound index of $elements.
 * @param int $q Middle index of $elements.
 * @param int $r Upper bound index of $elements.
 * @param string $fn Function used as a comparison function.
 */
function _merge(&$elements, $p, $q, $r, $fn = 'comparison_function') {
  $n1 = $q - $p + 1;
  $n2 = $r - $q;

  $L = array(); // left partition of $elements
  for ($i = 0; $i < $n1; $i++) {
    $L[$i] = $elements[$p + $i - 1];
  }
  $L[$n1] = SENTINEL;

  $R = array(); // right partition of $elements
  for ($i = 0; $i < $n2; $i++) {
    $R[$i] = $elements[$q + $i];
  }
  $R[$n2] = SENTINEL;

  $i = 0; $j = 0;
  for ($k = $p; $k <= $r; $k++) {
    if ( call_user_func($fn, $L[$i], $R[$j]) ) {
      $elements[$k-1] = $L[$i];
      $i++;
    } else {
      $elements[$k-1] = $R[$j];
      $j++;
    }
  }
}

/**
 * This is the main function to be called if you need to sort array using
 * merget sort algorithm. This function recursively divide the $elements into
 * two portions, half and right, until one partition contains single element.
 * Then it bubble up from bottom to top by merging smaller partition
 * that already sorted into bigger partition. Initial call to this function
 * should be merge_sort($elements, 1, sizeof($elements)).
 * @param reference $elements Reference to array element.
 * @param int $p Lower bound index of $elements.
 * @param int $r Upper bound index of $elements.
 * @param string $fn Function used as a comparison function.
 * @returns void
 */
function merge_sort(&$elements, $p, $r, $fn = 'comparison_function') {
  if ($p < $r) {
    $q = floor(($p + $r) / 2);
    merge_sort($elements, $p, $q);     // left partition
    merge_sort($elements, $q + 1, $r); // right partition
    _merge($elements, $p, $q, $r, $fn); // sort the given elements partition
  }
}

function comparison_function(&$a, &$b) {
  return $a <= $b;
}

// Example usage:
$a = array(3, 5, 9, 8, 5, 7, 2, 1, 13);
var_dump($a);
merge_sort($a, 1, sizeof($a)); // Sort the elements
var_dump($a);
