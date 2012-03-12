# Implementing linked list in PHP #
Linked list can be implemented in several ways using PHP. Using array is
excluded from the examples. The following examples only provide class implemen-
tation and built-in SplDoublyLinkedList. Please note, these examples are
**doubly-linked-list** implementation.

1. Object Node wrapped as a property in LinkedList class.
   See `linked_list_using_class.php`.
2. Using [`SplDoublyLinkedList` class] [1].
   Available for PHP 5+.

All examples are executed directly in CLI.

    ~$ php linked_list_using_class.php
    ~$ php linked_list_using_spl.php

  [1]: http://www.php.net/manual/en/class.spldoublylinkedlist.php "SplDoublyLinkedList class"
