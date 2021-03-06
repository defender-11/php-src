--TEST--
mb_ereg() and invalid arguments
--SKIPIF--
<?php if (!function_exists("mb_ereg")) print "skip"; ?>
--FILE--
<?php

$a = array(
    array(1,2,3),
    array("", "", ""),
    array(array(), 1, ""),
    array(1, array(), ""),
    array(1, "", array()),
    );

foreach ($a as $args) {
    try {
        var_dump(mb_ereg($args[0], $args[1], $args[2]));
    } catch (TypeError $e) {
        echo $e->getMessage(), "\n";
    }
    var_dump($args);
}
?>
--EXPECTF--
bool(false)
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  array(0) {
  }
}

Warning: mb_ereg(): Empty pattern in %s on line %d
bool(false)
array(3) {
  [0]=>
  string(0) ""
  [1]=>
  string(0) ""
  [2]=>
  array(0) {
  }
}
mb_ereg(): Argument #1 ($pattern) must be of type string, array given
array(3) {
  [0]=>
  array(0) {
  }
  [1]=>
  int(1)
  [2]=>
  string(0) ""
}
mb_ereg(): Argument #2 ($string) must be of type string, array given
array(3) {
  [0]=>
  int(1)
  [1]=>
  array(0) {
  }
  [2]=>
  string(0) ""
}
bool(false)
array(3) {
  [0]=>
  int(1)
  [1]=>
  string(0) ""
  [2]=>
  array(0) {
  }
}
