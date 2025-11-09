<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

foreach($height as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
echo "<br>";
echo "<br>";

// 3.4.1.---------------------------------------------------------------------------------------------------
$height["David"] = "180";
$height["Evelyn"] = "158";
$height["Frank"] = "172";
$height["Grace"] = "160";
$height["Helen"] = "168";

// Tampilkan seluruh data dengan foreach
foreach($height as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
echo "<br>";
echo "<br>";

// 3.4.2.---------------------------------------------------------------------------------------------------
$weight = array("Andy"=>60, "Barry"=>55, "Charlie"=>65);

foreach($weight as $name => $value) {
  echo "Key=" . $name . ", Value=" . $value;
  echo "<br>";
}


?>
