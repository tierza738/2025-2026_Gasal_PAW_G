<?php
$students = array(
  array("Alex","220401","0812345678"),
  array("Bianca","220402","0812345687"),
  array("Candice","220403","0812345665")
);

for ($row = 0; $row < 3; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>" . $students[$row][$col] . "</li>";
  }
  echo "</ul>";
}
echo "<br>";
echo "<br>";
// 3.5.1.---------------------------------------------------------------------------------------------------

$students[] = array("David","220404","0812345699");
$students[] = array("Evelyn","220405","0812345611");
$students[] = array("Frank","220406","0812345622");
$students[] = array("Grace","220407","0812345633");
$students[] = array("Helen","220408","0812345644");

// Tampilkan dengan perulangan
for ($row = 0; $row < count($students); $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>" . $students[$row][$col] . "</li>";
  }
  echo "</ul>";
}
echo "<br>";
echo "<br>";
// 3.5.2.---------------------------------------------------------------------------------------------------

$students = array(
  array("Alex","220401","0812345678"),
  array("Bianca","220402","0812345687"),
  array("Candice","220403","0812345665"),
  array("David","220404","0812345699"),
  array("Evelyn","220405","0812345611"),
  array("Frank","220406","0812345622"),
  array("Grace","220407","0812345633"),
  array("Helen","220408","0812345644")
);

// Tampilkan dalam bentuk tabel HTML
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Name</th><th>NIM</th><th>Telepon</th></tr>";

for ($row = 0; $row < count($students); $row++) {
  echo "<tr>";
  for ($col = 0; $col < 3; $col++) {
    echo "<td>" . $students[$row][$col] . "</td>";
  }
  echo "</tr>";
}

echo "</table>";
?>
