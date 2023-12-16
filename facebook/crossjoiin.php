<h5></h5>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crossjoin Result</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: lightpink;
        }
    </style>
</head>
<body>
<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "Shalom78g!";
$dbname = "insta";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform inner join query
$sql = "SELECT * from user CROSS JOIN comment";
$result = $conn->query($sql);

// Display the result
if ($result->num_rows > 0) {
    echo "<table>";
    // Display table header
    echo "<tr>";
    $fieldinfo = $result->fetch_fields();
    foreach ($fieldinfo as $field) {
        echo "<th>{$field->name}</th>";
    }
    echo "</tr>";

    // Display table rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No data found.</p>";
}

// Close the database connection
$conn->close();
?>
</body>
</html>