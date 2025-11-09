<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrLength = count($fruits);

for($x = 0; $x < $arrLength; $x++) {
  echo $fruits[$x];
  echo "<br>";
}
echo "<br>";
echo "<br>";

// 3.2.1.---------------------------------------------------------------------------------------------------
$buahbaru = array("Apple", "Banana", "Mango", "Papaya", "Orange");


for ($i = 0; $i < count($buahbaru); $i++) {
    $fruits[] = $buahbaru[$i]; 
}

$arrLength = count($fruits);
for ($x = 0; $x < $arrLength; $x++) {
    echo $fruits[$x] ."<br>";
}
$arrLength = count($fruits);
echo "Panjang array fruits saat ini adalah: $arrLength";
echo "<br>";
echo "<br>";

// 3.2.2.---------------------------------------------------------------------------------------------------
$veggies = array("Carrot", "Spinach", "Broccoli");


$arrLength = count($veggies);


for($x = 0; $x < $arrLength; $x++) {
    echo $veggies[$x];
    echo "<br>";
}

?>
