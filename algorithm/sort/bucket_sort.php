<?php
/**
 * Implementation of bucket sort sort algorithm in PHP. This code is
 * direct pseudo-code implementation from Cormen et al book, Introduction
 * to Algorithms.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

// Using insertion_sort to sort elements in each bucket.
require_once "insertion_sort.php";

/**
 * Assuming elements distribution is uniform and in the range 1 - 100 (see line
 * #34 to adjust the range property).
 *
 * @param reference &$elements Reference to array elements.
 * @return void $elements already sorted in place.
 */
function bucket_sort(&$elements) {
  $n = sizeof($elements);
  $buckets = array();

  // Initialize the buckets.
  for ($i = 0; $i < $n; $i++) {
    $buckets[$i] = array();
  }

  // Put each element into matched bucket.
  foreach ($elements as $el) {
    array_push($buckets[ceil($el/10)], $el);
  }

  // Sort elements in each bucket using insertion sort.
  $j = 0;
  for ($i = 0; $i < $n; $i++) {
    // sort only non-empty bucket
    if (!empty($buckets[$i])) {
      insertion_sort($buckets[$i]);

      // Move sorted elements in the bucket into original array.
      foreach ($buckets[$i] as $el) {
        $elements[$j++] = $el;
      }
    }
  }
}

// Example usage:
// There will be two vardumps called. The first two come from
// insertion_sort.php.
$a = array(31, 40, 9, 1, 18, 3, 20, 14, 6, 10, 8, 13, 22, 23, 29, 30, 55);
var_dump($a);
bucket_sort($a); // Sort the elements
var_dump($a);
