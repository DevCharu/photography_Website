
<!DOCTYPE html>
<html>
<head>
    <title>Display Records</title>
    <link rel="stylesheet" type="text/css" href="view.css">
</head>
<body>
    <h1>Inquiries Information</h1>

    <?php
    // Database connection details
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "malcolm_db";

    // Create connection
    $con = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if (!$con) {
        die("Connection error: " . mysqli_connect_error());
    }

    // Fetch records from the database
    $sql = "SELECT * FROM form";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Enquiry ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Delete</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['location'] . "</td>
                    <td>" . $row['date'] . "</td>
                    <td>" . $row['message'] . "</td>
                    <td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }

    // Close connection
    mysqli_close($con);
    ?>
</body>
</html>
