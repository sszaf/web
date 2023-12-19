<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DB";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_error($conn));
}

// Obsługa filtrowania
$whereClause = "";
if (isset($_GET['filter'])) {
    $filterValue = mysqli_real_escape_string($conn, $_GET['filter']);
    $whereClause = "WHERE surname LIKE '%$filterValue%'";
}

$sql = "SELECT * FROM Users $whereClause";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error retrieving data: " . mysqli_error($conn));
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>User Data</title>
</head>
<body>
    <h1>User Data</h1>

    <!-- Formularz do filtrowania -->
    <form action="db_table.php" method="get">
        <label for="filter">Filter by Surname:</label>
        <input type="text" name="filter" id="filter">
        <button type="submit">Apply Filter</button>
    </form>

    <!-- Tabela z danymi użytkowników -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Birth Month</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['username']}</td>";
            echo "<td>{$row['password']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['surname']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['phone']}</td>";
            echo "<td>{$row['birth_month']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
