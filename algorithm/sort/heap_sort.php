<?php
/**
 * Implementation of heap sort sort algorithm in PHP. This code is
 * direct pseudo-code implementation from Cormen et al book, Introduction
 * to Algorithms.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

// Global variable to store heap size. Using global variable is not a good
// practice, the purpose here is for algorithm clarity.
$_HEAP_SIZE = 0;

/**
 * Assuming $elements is array with numerical-index starting with zero
 * and its size greater than 1.
 * 
 * @see http://en.wikipedia.org/wiki/Heapsort
 * @param reference $elements Reference to array element.
 * @param string $fn Function used as a comparison function.
 * @returns void $elements already sorted in place.
 */
function heap_sort(&$elements, $fn = 'comparison_function') {
  global $_HEAP_SIZE;

  _build_max_heap($elements, $fn);
  for ($i = sizeof($elements) - 1; $i >= 1; $i--) {
    // since we're sorting in ascending order,
    // we swap the highest-value element, that's in first index,
    // with lowest-value element, that's in last index.
    _swap_element($elements[0], $elements[$i]);
    // don't lookup again highest-value element
    // in [ i .. sizeof($elements) ]
    $_HEAP_SIZE--;
    _max_heapify($elements, 0, $fn);
  }
}

/**
 * Swap element $a and $b.
 * @param reference &$a Reference to element $a
 * @param reference &$b Reference to element $b
 * return void
 */
function _swap_element(&$a, &$b) {
  if ($a != $b) {
    $a ^= $b;
    $b ^= $a;
    $a ^= $b;
  }
}

function _build_max_heap(&$elements, $fn) {
  global $_HEAP_SIZE;

  $_HEAP_SIZE = sizeof($elements);
  $end = floor(sizeof($elements)/2);
  for ($i = $end; $i >= 0; $i--) {
    _max_heapify($elements, $i, $fn);
  }
}

/**
 * Reposition $elements[$i] into correct index based on heap property.
 * @param reference &$elements Reference to an array
 * @param int $i Index of particular element.
 * @return void
 */
function _max_heapify(&$elements, $i, $fn) {
  global $_HEAP_SIZE;

  $l = _left_child($i);
  $r = _right_child($i);
  if ($l < $_HEAP_SIZE && $fn($elements[$l], $elements[$i])) {
    $largest = $l;
  } else {
    $largest = $i;
  }
  if ($r < $_HEAP_SIZE && $fn($elements[$r], $elements[$largest])) {
    $largest = $r;
  }
  if ($largest != $i) {
    _swap_element($elements[$i], $elements[$largest]);
    _max_heapify($elements, $largest, $fn);
  }
}

/**
 * Get parent index given node index.
 * @param int $i Node index
 * @return int Parent node index
 */
function _parent_node($i) {
  return floor($i/2);
}

/**
 * Get left child index given node index.
 * @param int $i Node index.
 * @return int Left child index
 */
function _left_child($i) {
  return 2*$i;
}

/**
 * Get right child index given node index.
 * @param int $i Node index.
 * @param int Right child index
 */
function _right_child($i) {
  return 2*$i + 1;
}

// We use 'greater than' operator for max heap property
// from largest to lowest.
function comparison_function(&$a, &$b) {
  return $a > $b;
}

// Example usage:
$a = array(3, 5, 9, 8, 5, 7, 2, 1, 13);
var_dump($a);
heap_sort($a); // Sort the elements
var_dump($a);
