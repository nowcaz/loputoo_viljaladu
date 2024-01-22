<?php
$servername = "d125324.mysql.zonevs.eu";
$username = "d125324_nowcaz";
$password = "jalgrattad123";
$dbname = "d125324sd537732";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ühenduse ebaõnnestumine: " . $conn->connect_error);
}

$autonr = $sisenemismass = $vilja_asukoht = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $autonr = $_POST["autonr"];
    $sisenemismass = $_POST["sisenemismass"];
    $vilja_asukoht = $_POST["vilja_asukoht"];

    $sql = "INSERT INTO Autod (autonr, sisenemismass, vilja_asukoht) VALUES ('$autonr', $sisenemismass, '$vilja_asukoht')";

    if ($conn->query($sql) === TRUE) {
        $message = "Auto edukalt lisatud!";
    } else {
        $message = "Viga: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autode haldus</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php include("navigatsioon.php"); ?>
    <style>
        /* Auto lisamise leht */

        body {
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
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

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            margin: 8px 0;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p.message {
            color: green;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Auto andmed</h1>

    <?php if (isset($message)) {
        echo "<p class='message'>$message</p>";
    } ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Autonumber: <input type="text" name="autonr" required><br>
        Vilja kogus kilogrammides: <input type="number" name="sisenemismass" required><br>
        Sisesta riik ja linn kuhu vaja vili viia: <input type="text" name="vilja_asukoht" required><br>
        <input type="submit" value="Lisa auto">
    </form>

</div>
</body>
</html>
