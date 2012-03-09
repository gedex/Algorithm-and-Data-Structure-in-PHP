<?php
/**
 * Implementation of bubble sort algorithm in PHP. This code is
 * direct pseudo-code implementation from Cormen et al book, Introduction
 * to Algorithms.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

function bubble_sort(&$elements, $fn = 'comparison_function') {
  for ($i = 0; $i < sizeof($elements) - 1; $i++) {
    for ($j = sizeof($elements) - 1; $j >= ($i + 1); $j--) {
      if ( $fn($elements[$j], $elements[$j-1]) ) {
        // swap the element
        $elements[$j]   ^= $elements[$j-1];
        $elements[$j-1] ^= $elements[$j];
        $elements[$j]   ^= $elements[$j-1];
      }
    }
  }
}

function comparison_function(&$a, &$b) {
  return $a < $b;
}

// Example usage:
$a = array(3, 5, 9, 8, 5, 7, 2, 1, 13);
var_dump($a);
bubble_sort($a); // Sort the elements
var_dump($a);
