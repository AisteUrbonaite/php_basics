<?php
require_once 'MagicMethods.php';

// __constructor
$class = new MagicMethods(4, 'labas');
echo "<br>-------------</br>";

// __toString
echo $class . PHP_EOL;
echo "<br>-------------</br>";

// __debugInfo
echo '<pre>' . var_dump($class) . '<pre/>';
echo "<br>-------------</br>";

// __call
$class->calltestmethod(1, 2, 3);
echo "<br>-------------</br>";

// __callStatic
MagicMethods::calltestmethod(1, 2, 3);
echo "<br>-------------</br>";

// __setState
eval('$bvar = ' . var_export($class, true) . ';');
echo '<pre>' . var_dump($bvar) . '</pre>';
echo "<br>-------------</br>";

// __set
$class->pavadinimas = "labas";
echo "<br>-------------</br>";

// __get
print_r($class->pavadinimas);
echo "<br>-------------</br>";

//__isset
echo ' Ar yra kintamasis = ' . (isset($class->pavadinimas) ? 'taip' : 'ne') . '</br>';
echo "<br>-------------</br>";

//unset
unset($class->pavadinimas);
echo ' Ar yra kintamasis = ' . (isset($class->pavadinimas) ? 'taip' : 'ne') . '</br>';
echo "<br>-------------</br>";

//__invoke
$class(-15);
echo '<pre>';
var_dump(is_callable($class));
echo '</pre>';
echo "<br>-------------</br>";

//__sleep
$sleep = serialize($class); //__sleep
echo $sleep;
echo "<br>-------------</br>";

//__wakeup
$wake = unserialize($sleep);
echo "<br>-------------</br>";


//__clone
$obj = new MyCloneable();
$obj->object1 = new MagicMethods(1, 'labas');
$obj->object2 = new MagicMethods(1, 'labas');


$obj2 = clone $obj;

print("Original Object:\n");
echo '<pre>';
print_r($obj);
echo '</pre>';

print("Cloned Object:\n");
echo '<pre>';
print_r($obj2);
echo '</pre>';
echo "<br>-------------</br>";
// __destruct
$answer = null;