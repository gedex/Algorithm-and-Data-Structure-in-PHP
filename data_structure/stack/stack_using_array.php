<?php
/**
 * Stack implementation using array.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

$stack = array();

// The top element is the last element in array.
if (empty($stack)) {
  array_push($stack, 0);
  array_push($stack, 3);
  array_push($stack, 7);
  array_push($stack, 13);
}

var_dump($stack);

if (!empty($stack)) {
  array_pop($stack);
}
var_dump($stack);

if (!empty($stack)) {
  $top = array_pop($stack);
  echo "The top element being dequeued is $top\n";
}
