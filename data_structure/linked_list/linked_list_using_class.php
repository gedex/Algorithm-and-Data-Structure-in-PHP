<?php
/**
 * Doubly-linked-list implementation using class.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * license.
 */

/**
 * Class wrapper for node in the linked list.
 */
class Node {
  private $_val;
  private $_prev;
  private $_next;

  public function __construct($el) {
    $this->_val = $el;
  }

  public function val() {
    return $this->_val;
  }

  public function next() {
    return $this->_next;
  }

  public function setNext(Node $el) {
    $this->_next = $el;
  }

  public function prev() {
    return $this->_prev;
  }

  public function setPrev(Node $el) {
    $this->_prev = $el;
  }

  public function __toString() {
    return $this->val() === NULL ? 'NULL' : $this->val();
  }
}

class LinkedList {
  /**
   * Head with Node-type object.
   */
  private $_head;

  /**
   * Dummy Node-type object before the head and after the tail
   */
  private $_sentinel;

  /**
   * All object initialized with NULL as its head.
   *
   * @return void
   */
  public function __construct() {
    // Sentinel is dummy object before head and after tail.
    $sentinel = new Node(NULL);
    $sentinel->setNext($sentinel);
    $sentinel->setPrev($sentinel);

    $this->_sentinel = $sentinel;
    $this->_head = $this->_sentinel;
  }

  /**
   * Get dummy object value. It can be anything instead of NULL.
   */
  public function sentinelVal() {
    return $this->_sentinel->val();
  }

  /**
   * Insert $el into the list and make it as a head.
   *
   * @param mixed $val
   * @return void
   */
  public function insert($val) {
    // Make sure element being inserted is type of Node.
    if (!is_object($val) || getclass($val) !== "Node") {
      $node = new Node($val);
    } else {
      $node = $val;
    }

    $this->_head->setPrev($node);

    $node->setNext($this->_head);
    $node->setPrev($this->_sentinel);
    $this->_head = $node;
  }

  /**
   * Delete element $el in linked list, if exists.
   *
   * @param mixed $val Element with value $val to be deleted.
   * @return void
   */
  public function delete($val) {
    $node = $this->search($val);

    // Sentinel can't be deleted.
    if ($node->val() === $this->sentinelVal()) return;

    if ($node->prev()->val() !== $this->sentinelVal()) {
      $node->prev()->setNext($node->next());
    } else {
      $this->_head = $node->next();
    }

    if ($node->next() !== $this->sentinelVal()) {
      $node->next()->setPrev($node->prev());
    }
  }

  /**
   * Search element in the singly-linked-list.
   *
   * @param mixed $val Element with value $val to be searched.
   * @return Node $el
   */
  public function search($val) {
    $el = $this->_head;
    while ($el->val() !== $this->sentinelVal() && $el->val() !== $val) {
      $el = $el->next();
    }

    return $el;
  }
}

$LL = new LinkedList();
$LL->insert("Akeda");
$LL->insert("Dwi");
$LL->insert("Stevey");
$LL->insert("Paul");

// Function to test given keyword.
function test_searching($keyword = '') {
  global $LL;

  $node = $LL->search($keyword);
  if ($node->val() !== $LL->sentinelVal()) {
    echo "Node with value '$keyword' is found\n";
    echo "The previous node of '$keyword' is : " . $node->prev() . "\n";
    echo "The next node of '$keyword' is : " . $node->next() . "\n";
  } else {
    echo "Node with value '$keyword' is NOT found\n";
  }
  echo "\n";
}

// Test searching of node in linked list
test_searching("Akeda");
test_searching("Someone else");
test_searching("Dwi");
test_searching("Paul");

// Delete Stevey
$LL->delete("Stevey");

// The next and prev references were updated after delete operation.
echo "After 'Stevey' is deleted: \n\n";
test_searching("Dwi");
test_searching("Paul");
