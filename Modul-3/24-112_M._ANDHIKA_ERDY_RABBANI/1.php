<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";
echo "<br>";

var_dump($fruits);
echo "<br>";
echo "<br>";

// 3.1.1.----------------------------------------------------------------------------------------------------------------------
$fruits[] = "Apple";
$fruits[] = "Banana";
$fruits[] = "Mangga";
$fruits[] = "Pepaya";
$fruits[] = "Orange";

var_dump($fruits);
echo "<br>";

echo "nilai dengan indeks tertinggi : ".end($fruits);
echo "<br>";

echo "indeks tertinggi : " . max(array_keys($fruits));
echo "<br>";
echo "<br>";


// 3.1.2.----------------------------------------------------------------------------------------------------------------------
unset($fruits[5]); // hapus yang berada di indx ke 5 = Mangga
var_dump($fruits);
echo "<br>";

echo "nilai dengan indeks tertinggi : ".end($fruits);
echo "<br>";

echo "indeks tertinggi : " . max(array_keys($fruits));
echo "<br>";
echo "<br>";

// 3.1.3.----------------------------------------------------------------------------------------------------------------------

$veggies = array("Carrot", "Spinach", "Broccoli");

echo "Data dalam array veggies <br> ";
foreach ($veggies as $value) {
  echo $value . "<br>";
}


?>
