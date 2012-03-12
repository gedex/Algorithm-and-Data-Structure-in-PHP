<?php
/**
 * Doubly-linked-list implementation using SPL.
 *
 * Copyright (c) 2012 Akeda Bagus (admin@gedex.web.id).
 *
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * license.
 */

/**
 * Extending SplDoublyLinkedList class by providing insert, delete, and search
 * operations.
 */
class LinkedList extends SplDoublyLinkedList {
  public function __construct() {
    $this->push(NULL);
  }

  public function insert($el) {
    $this->unshift($el);
  }

  public function delete($val) {
    $node = $this->search($val);

    if ($node === NULL) return;
    unset($this[$this->key()]);
  }

  public function search($val) {
    foreach ($this as $key => $node) {
      if ($node === $val) return $node;
    }
    return $node;
  }

  public function getPrev() {
    return ($this->key() - 1) >= 0 ? $this[$this->key() - 1] : 'NULL';
  }

  public function getNext() {
    return $this[$this->key() + 1] !== NULL ? $this[$this->key() + 1] : 'NULL';
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

  if ($LL->search($keyword) !== NULL) {
    echo "Node with value '$keyword' is found\n";
    echo "The previous node of '$keyword' is : " . $LL->getPrev() . "\n";
    echo "The next node of '$keyword' is : " . $LL->getNext() . "\n";
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
