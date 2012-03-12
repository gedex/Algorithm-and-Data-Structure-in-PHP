<?php
/**
 * Queue implementation using SplQueue class.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * license.
 */

$queue = new SplQueue();
$queue->enqueue("Element");
$queue->enqueue(23);
$queue->enqueue(array(3, 4, 6));

while (!$queue->isEmpty()) {
  var_dump($queue->dequeue());
}

if ($queue->isEmpty()) {
  // Element can be any type
  $queue->enqueue(new SplStack());
}

// Throws RuntimeException if the queue is empty
var_dump($queue->top());
