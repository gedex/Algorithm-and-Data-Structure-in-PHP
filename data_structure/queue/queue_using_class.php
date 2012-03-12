<?php
/**
 * Queue implementation using array wrapped in a class.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

class Queue {
  private $_queue;

  public function __construct() {
    $this->_queue = array();
  }

  /**
   * Check whether the queue empty or not.
   *
   * @return bool True if the queue is empty.
   */
  public function is_empty() {
    return empty($this->_queue);
  }

  /**
   * Returns the front element in the queue.
   *
   * @return mixed The front element in the queue if exists, otherwise NULL.
   */
  public function front() {
    if (!$this->is_empty()) {
      return $this->_queue[0];
    } else {
      return null;
    }
  }

  /**
   * Enqueue $el into the queue.
   *
   * @param mixed $el Element to be enqueued.
   * @return void.
   */
  public function enqueue($el) {
    array_push($this->_queue, $el);
  }

  /**
   * Dequeue the front element from the queue.
   *
   * @return mixed $element.
   */
  public function dequeue() {
    if ($this->front() !== null) {
      return array_shift($this->_queue);
    }
    return null;
  }
}

// Example usage:
$queue = new Queue();
$queue->enqueue("Element");
$queue->enqueue(23);
$queue->enqueue(array(3, 4, 6));

while (!$queue->is_empty()) {
  echo "The front element is now : \n";
  var_dump($queue->front());
  echo "\n";
  $queue->dequeue();
}

// Outputs NULL
var_dump($queue->front());
