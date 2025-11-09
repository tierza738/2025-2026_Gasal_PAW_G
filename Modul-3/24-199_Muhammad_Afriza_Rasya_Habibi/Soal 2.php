<?php
$fruits = array("Avocado", "Bluberry", "Cherry");
$arrlength = count($fruits);

for($x = 0; $x < $arrlength; $x++) {
echo $fruits[$x];
echo "<br>";
}

echo "<br>";

for ($x = 0; $x < 5; $x++) {
$fruits[] = "Buah" . ($x + 1);
}

$arrlength = count($fruits);
for ($x = 0; $x < $arrlength; $x++) {
echo $fruits[$x] . "<br>";
}

echo "<br>Panjang array fruits saat ini : " . $arrlength .
"<br>";

echo "<br>";

$veggies = array("Carrot", "Broccoli", "Peanuts");

$arrlength = count($veggies);

for ($x = 0; $x < $arrlength; $x++) {
echo $veggies[$x] . "<br>";
}
?>