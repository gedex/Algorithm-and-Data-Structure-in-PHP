<?php
/**
 * Stack implementation using SplStack class.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

$stack = new SplStack();
$stack->push("Element");
$stack->push(23);
$stack->push(array(3, 4, 6));

while (!$stack->isEmpty()) {
  var_dump($stack->top());
  $stack->pop();
}

if ($stack->isEmpty()) {
  // Element can be any type
  $stack->push(new SplStack());
}

// Throws RuntimeException if the stack is empty
var_dump($stack->top());
