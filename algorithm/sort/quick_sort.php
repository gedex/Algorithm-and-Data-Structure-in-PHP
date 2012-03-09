<?php
/**
 * Implementation of quick sort sort algorithm in PHP. This code is
 * direct pseudo-code implementation from Cormen et al book, Introduction
 * to Algorithms.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

/**
 * Assuming $elements is array with numerical-index starting with zero, that's
 * $p, with upper bound index sizeof($elements) - 1, that's $r.
 * @param reference $elements Reference to array element.
 * @param int $p Starting index.
 * @param int $r Pivot index where each element $p to $r - 1 will be compared
 *               against.
 * @return void
 */
function quick_sort(&$elements, $p, $r, $fn = 'comparison_function') {
  if ($p < $r) {
    $q = _partition($elements, $p, $r, $fn);
    quick_sort($elements, $p, $q - 1, $fn);
    quick_sort($elements, $q + 1, $r, $fn);
  }
}

function _partition(&$elements, $p, $r, $fn) {
  $x = $elements[$r];
  $i = $p - 1;
  for ($j = $p; $j <= $r - 1; $j++) {
    if ( $fn($elements[$j], $x) ) {
      $i = $i + 1;
      _swap_element($elements[$i], $elements[$j]);
    }
  }
  _swap_element($elements[$i + 1], $elements[$r]);

  return $i + 1;
}

function _swap_element(&$a, &$b) {
  if ($a != $b) {
    $a ^= $b;
    $b ^= $a;
    $a ^= $b;
  }
}

function comparison_function(&$a, &$b) {
  return $a <= $b;
}

// Example usage:
$a = array(3, 5, 9, 8, 5, 7, 2, 1, 13);
var_dump($a);
quick_sort($a, 0, sizeof($a) - 1); // Sort the elements
var_dump($a);
