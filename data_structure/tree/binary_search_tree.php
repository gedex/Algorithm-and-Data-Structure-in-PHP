<?php

class Node {
  private $_val;

  /**
   * Parent's node.
   * @access private
   * @type Node
   */
  private $_parent;

  /**
   * Left-child's node.
   * @access private
   * @type Node
   */
  private $_left;

  /**
   * Right-child's node.
   * @access private
   * @type Node
   */
  private $_right;

  public function __construct($el) {
    $this->_val = $el;
  }

  /**
   * Get node's value.
   * @access public
   * @return Node
   */
  public function val() {
    return $this->_val;
  }

  /**
   * Get left-child's node.
   * @access public
   * @return Node
   */
  public function left() {
    return $this->_left;
  }

  /**
   * Set left-child's node.
   * @access public
   * @return void
   */
  public function setLeft(Node $node) {
    $this->_left = $node;
  }

  /**
   * Get right-child's node.
   * @access public
   * @return Node
   */
  public function right() {
    return $this->_right;
  }

  /**
   * Set right-child's node.
   * @access public
   * @return void
   */
  public function setRight(Node $node) {
    $this->_right = $node;
  }

  /**
   * Get parent's node.
   * @access public
   * @return Node
   */
  public function parent() {
    return $this->_parent;
  }

  /**
   * Set parent's node.
   * @access public
   * @return public
   */
  public function setParent(Node $node) {
    $this->_parent = $node;
  }

  public function __toString() {
    return $this->val() === NULL ? 'NULL' : $this->val() . '';
  }
}

class BinarySearchTree {
  private $_root;
  private $_sentinel;

  public function __construct() {
    $this->_sentinel = new Node(NULL);

    $this->_root = $this->_sentinel;
    $this->_root->setParent($this->_sentinel);
    $this->_root->setLeft($this->_sentinel);
    $this->_root->setRight($this->_sentinel);
  }

  public function insert($val) {
    if (!is_object($val) || getclass($val) !== 'Node') {
      $newNode = new Node($val);
    } else {
      $newNode = $val;
    }
    $newNode->setLeft($this->_sentinel);
    $newNode->setRight($this->_sentinel);

    $node = $this->_root;
    $parent = $this->_sentinel;
    while ($node !== $this->_sentinel) {    
      $parent = $node;
      if ($newNode->val() < $node->val()) {
        $node = $node->left();
      } else {
        $node = $node->right();
      }
    }

    if ($parent === $this->_sentinel) {
      $newNode->setParent($this->_sentinel);
      $this->_root = $newNode;
    } else {
      if ($newNode->val() < $parent->val()) {
        $parent->setLeft($newNode);
      } else {
        $parent->setRight($newNode);
      }
      $newNode->setParent($parent);
    }
  }

  public function search($val) {
    $node = $this->_root;

    while ($node !== $this->_sentinel && $node->val() !== $val) {
      if ($val < $node->val()) {
        $node = $node->left();
      } else {
        $node = $node->right();
      }
    }
    return $node;
  }
}

$BST = new BinarySearchTree;
$BST->insert(15);
$BST->insert(6);
$BST->insert(18);
$BST->insert(3);
$BST->insert(7);
$BST->insert(17);
$BST->insert(20);
$BST->insert(2);
$BST->insert(4);
$BST->insert(13);
$BST->insert(9);

function test_searching($num) {
  global $BST;

  $node = $BST->search($num);
  if ($node->val() !== NULL) {
    echo "Node with value $num is found\n";
    echo "Parent's node = " . $node->parent() . "\n";
    echo "Left-child's node = " . $node->left() . "\n";
    echo "Right-child's node = " . $node->right() . "\n";
  } else {
    echo "Node with value $num is NOT found\n";
  }
  echo "\n";
}

test_searching(7);
test_searching(15);
test_searching(3);
test_searching(2);
