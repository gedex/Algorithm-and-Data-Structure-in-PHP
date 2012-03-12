<?php
/**
 * Stack implementation using array wrapped in a class.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * license.
 */

class Stack {
  private $_data;

  public function __construct() {
    $this->_data = array();
  }

  /**
   * Check whether the stack empty or not.
   *
   * @return bool True if the stack is empty.
   */
  public function is_empty() {
    return empty($this->_data);
  }

  public function top() {
    if (!$this->is_empty()) {
      return $this->_data[sizeof($this->_data) - 1];
    } else {
      return null;
    }
  }

  /**
   * Push $el into the stack.
   *
   * @param mixed $el Element to be pushed.
   * @return void.
   */
  public function push($el) {
    array_push($this->_data, $el);
  }

  /**
   * Pop the top element of the stack.
   *
   * @return mixed $element.
   */
  public function pop() {
    if ($this->top() !== null) {
      return array_pop($this->_data);
    }
    return null;
  }
}

// Example usage:
$stack = new Stack();
$stack->push("Element");
$stack->push(23);
$stack->push(array(3, 4, 6));

while (!$stack->is_empty()) {
  var_dump($stack->top());
  $stack->pop();
}

// Outputs NULL
var_dump($stack->top());
