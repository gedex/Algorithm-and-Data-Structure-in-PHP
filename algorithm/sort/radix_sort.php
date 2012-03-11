<?php
/**
 * Iterative version of radix sort using queues in PHP 
 * See http://en.wikipedia.org/wiki/Radix_sort#Iterative_version_using_queues.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

/**
 * This is LSD radix sort using queues. Assuming the longest element has
 * 3 digits length.
 *
 * @param reference &$elements Reference to array elements.
 * @return void $elements already sorted in place.
 */
function radix_sort(&$elements) {
  // Array for 10 queues.
  $queues = array(
    array(), array(), array(), array(), array(), array(), array(), array(),
    array(), array()
  );

  // Queues are allocated dynamically. In first iteration longest digits
  // element also determined.
  $longest = 0;
  foreach ($elements as $el) {
    if ($el > $longest) {
      $longest = $el;
    }
    array_push($queues[$el % 10], $el);
  }

  // Queues are dequeued back into original elements.
  $i = 0;
  foreach ($queues as $key => $q) {
    while (!empty($queues[$key])) {
      $elements[$i++] = array_shift($queues[$key]);
    }
  }

  // Remaining iterations are determined based on longest digits element.
  $it = strlen($longest) - 1;
  $d = 10;
  while ($it--) {
    foreach ($elements as $el) {
      array_push($queues[floor($el/$d) % 10], $el);
    }

    $i = 0;
    foreach ($queues as $key => $q) {
      while (!empty($queues[$key])) {
        $elements[$i++] = array_shift($queues[$key]);
      }
    }
    $d *= 10;
  }
}

// Example usage:
$a = array(170, 45, 75, 90, 802, 24, 2, 66);
var_dump($a);
radix_sort($a);
var_dump($a);
