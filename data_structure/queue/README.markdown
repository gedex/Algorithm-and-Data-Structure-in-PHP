# Implementing queue in PHP #
Queue can be implemented in several ways using PHP.

1. Using array.
   With the assumption of using numerical indices, we can get the front element
   in the queue by accessing $queue[0], use [`array_push`] [1] to enqueue
   element into queue, and [`array_shift`] [2] to dequeue element from the
   queue.
   See `queue_using_array.php`.
2. Array wrapped as a property in a class.
   See `queue_using_class.php`.
3. Using [`SplQueue` class] [3].
   Available for PHP 5+.

All examples are executed directly in CLI.

    ~$ php queue_using_array.php
    ~$ php queue_using_class.php
    ~$ php queue_using_spl.php

  [1]: http://www.php.net/manual/en/function.array-push.php  "array_push"
  [2]: http://www.php.net/manual/en/function.array-shift.php "array_shift"
  [3]: http://www.php.net/manual/en/class.splqueue.php       "SplQueue class"
