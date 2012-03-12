<?php
/**
 * Queue implementation using array.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

$queue = array();

// The front element in the queue is the first index
if (empty($queue)) {
  array_push($queue, 0);
  array_push($queue, 3);
  array_push($queue, 7);
  array_push($queue, 13);
}

if (!empty($queue)) {
  echo "The front element in the queue is : " . $queue[0] . "\n";
  echo "The front element being dequeued : " . array_shift($queue) . "\n\n";

  echo "The front element in the queue is now : " . $queue[0] . "\n";  
  echo "The front element being dequeued : " . array_shift($queue) . "\n\n";

  echo "The front element in the queue is now : " . $queue[0] . "\n";
}
