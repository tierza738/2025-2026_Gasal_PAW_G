<?php

echo "TAMBAHKAN 5 DATA BARU";
$students = array(
    array("Alex", "220401","0812345678"),
    array("Bianca", "220402","0812345678"),
    array("Candice", "220403","0812345678"),
    array("Arfian", "220404","0812345678"),
    array("Safina", "220405","0812345678"),
    array("Pina", "220406","0812345678"),
    array("Pian", "220407","0812345678"),
    array("Sopiah", "220408","0812345678"),
);

for($row = 0; $row<3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo"<ul>";
    for($col=0;$col<3;$col++) {
        echo "<li>".$students[$row][$col]."</li>";
    }
    echo "</ul>";
}

echo "TAMPILKAN DALAM BENTUK TABEL";
$students = array(
    array("Name" => "Alex", "Nim"=>"220401", "Mobile"=>"0812345678"),
    array("Name" => "Bianca", "Nim"=>"220402", "Mobile"=>"0812345687"),
    array("Name" => "Candice", "Nim"=>"220403", "Mobile"=>"0812345665"),
    array("Name" => "Afriza", "Nim"=>"220404", "Mobile"=>"085385601583"),
    array("Name" => "Meyla", "Nim"=>"220405", "Mobile"=>"085732482300"),
    array("Name" => "Meymey", "Nim"=>"220406", "Mobile"=>"085732482301"),
    array("Name" => "Apis", "Nim"=>"220407", "Mobile"=>"085974563781"),
    array("Name" => "Rosita", "Nim"=>"220408", "Mobile"=>"085732482302"),
);

echo "<h3>Data Mahasiswa</h3>";
echo "<table border='1' cellspacing='0' cellpadding='6' style='border-collapse: collapse;'>";
echo "<tr>
        <th>Name</th>
        <th>Nim</th>
        <th>Mobile</th>
        </tr>";

foreach ($students as $row) {
    echo "<tr>";
    echo "<td>" . $row["Name"] . "</td>";
    echo "<td>" . $row["Nim"] . "</td>";
    echo "<td>" . $row["Mobile"] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>