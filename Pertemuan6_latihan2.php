<html>
<body>

<?php
$x = array("one","two","three");

foreach ($x as $value) {
    echo $value . "<br />";
}

// array kedua
$b["sayur"] = "wortel";
$b["daging"] = "ayam";
$b["utama"] = "nasi";

$jumlah = sizeof($b);

print "Jumlah array b = $jumlah <br>";
// variabel $jumlah akan bernilai 3
?>

</body>
</html>