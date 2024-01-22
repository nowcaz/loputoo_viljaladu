<?php
// Sinu andmebaasiühendus
$servername = "d125324.mysql.zonevs.eu";
$username = "d125324_nowcaz";
$password = "jalgrattad123";
$dbname = "d125324sd537732";

$conn = new mysqli($servername, $username, $password, $dbname);

// Veendu, et ühendus õnnestus
if ($conn->connect_error) {
    die("Ühenduse ebaõnnestumine: " . $conn->connect_error);
}

// Andmete hankimine vormist
$autonr = $_POST['autonr'];
$sisenemismass = $_POST['sisenemismass'];

// SQL lause auto lisamiseks
$sql = "INSERT INTO Autod (autonr, sisenemismass) VALUES ('$autonr', $sisenemismass)";

if ($conn->query($sql) === TRUE) {
    echo "Auto edukalt lisatud!";
} else {
    echo "Viga: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
