<?php
$servername="d125324.mysql.zonevs.eu";
$username="d125324_nowcaz";
$password="jalgrattad123";
$dbname="d125324sd537732";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ühenduse ebaõnnestumine: " . $conn->connect_error);
}

$autoid = $lahkumismass = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $autoid = $_POST["autoid"];
    $lahkumismass = $_POST["lahkumismass"];

    $sql = "UPDATE autod SET lahkumismass = $lahkumismass WHERE id = $autoid";

    if ($conn->query($sql) === TRUE) {
        $message = "Auto on edukalt lisatud!";
    } else {
        $message = "Viga: " . $sql . "<br>" . $conn->error;
    }
}

// Saad valida auto väljumismassi määramiseks
$sqlSelectautod = "SELECT id, autonr FROM autod";
$resultSelectautod = $conn->query($sqlSelectautod);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Väljumismassi määramine</title>
    <link rel="stylesheet" type="text/css" href="valjumismass_style.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <?php include("navigatsioon.php"); ?>
</head>
<body>

<div class="container">
    <h1>Väljumismassi määramine</h1>

    <?php if (isset($message)) : ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="autoid">Vali auto:</label>
        <select name="autoid">
            <?php while ($row = $resultSelectautod->fetch_assoc()) : ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["autonr"]; ?></option>
            <?php endwhile; ?>
        </select><br>

        <label for="lahkumismass">Väljumismass:</label>
        <input type="number" name="lahkumismass" required><br>

        <input type="submit" value="Määra väljumismass">
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>


