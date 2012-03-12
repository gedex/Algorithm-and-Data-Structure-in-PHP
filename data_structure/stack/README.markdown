# Implementing stack in PHP #
Stack can be implemented in several ways using PHP.

1. Using array.
   Use [`array_push`] [1] and [`array_pop`] [2]
   See `stack_using_array.php`.
2. Array wrapped as a property in a class.
   See `stack_using_class.php`.
3. Using [`SplStack` class] [3].
   Available for PHP 5+.

All examples are executed directly in CLI.

    ~$ php stack_using_array.php
    ~$ php stack_using_class.php
    ~$ php stack_using_spl.php

  [1]: http://www.php.net/manual/en/function.array-push.php "array_push"
  [2]: http://www.php.net/manual/en/function.array-pop.php  "array_pop"
  [3]: http://www.php.net/manual/en/class.splstack.php      "SplStack class"
