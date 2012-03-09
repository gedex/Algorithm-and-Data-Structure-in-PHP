<?php
/**
 * Implementation of insertion sort algorithm in PHP. This code is
 * direct pseudo-code implementation from Cormen et al book, Introduction
 * to Algorithms.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

/**
 * Assuming $elements is array with numerical-index starting with zero
 * and its size greater than 1.
 * @see http://en.wikipedia.org/wiki/Insertion_sort
 * @param reference $elements Reference to array element.
 * @param string $fn Function used as a comparison function.
 * @returns void $elements already sorted in place.
 */
function insertion_sort(&$elements, $fn = 'comparison_function') {
  if (!is_array($elements) || !is_callable($fn)) return;

  for ($i = 1; $i < sizeof($elements); $i++) {
    $key = $elements[$i]; // This will be $a in comparison function.
                          // $key will be the right side element that will be
                          // compared against the left sorted elements. For
                          // min to max sort, $key should be higher than
                          // $elements[0] to $elements[$j]
    

    $j = $i - 1; // this will be in $b in comparison function
    while ( $j >= 0 && $fn($key, $elements[$j]) ) {
      $elements[$j + 1] = $elements[$j]; // shift right
      $j = $j - 1;
    }
    $elements[$j + 1] = $key;
  }
}

/**
 * Comparison function used to compare each element.
 * @param mixed $a
 * @param mixed $b
 * @returns bool True iff $a is less than $b.
 */
function comparison_function(&$a, &$b) {
  return $a < $b;
}


// Example usage:
$a = array(3, 5, 9, 8, 5, 7, 2, 1, 13);
var_dump($a);
insertion_sort($a); // Sort the elements
var_dump($a);
