<?php
$servername="d125324.mysql.zonevs.eu";
$username="d125324_nowcaz";
$password="jalgrattad123";
$dbname="d125324sd537732";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ühenduse ebaõnnestumine: " . $conn->connect_error);
}

// Kuvab kõik autod koos andmetega
$sqlSelectautod = "SELECT id, autonr, sisenemismass, lahkumismass, vilja_asukoht FROM autod";
$resultSelectautod = $conn->query($sqlSelectautod);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tulnud autod</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php include("navigatsioon.php"); ?>
    <style>
        /* Tulnud autode lehe stiil */
        body {
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Tulnud autod</h1>

    <?php
    if ($resultSelectautod->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Autonumber</th><th>Vilja kogus</th><th>Vilja kohale viidud</th><th>Vilja asukoht</th></tr>";
        while ($row = $resultSelectautod->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["autonr"] . "</td>";
            echo "<td>" . $row["sisenemismass"] . "</td>";
            echo "<td>" . $row["lahkumismass"] . "</td>";
            echo "<td>" . $row["vilja_asukoht"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Andmeid ei leitud.";
    }
    ?>

</div>
</body>
</html>

<?php
$conn->close();
?>
