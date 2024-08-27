<!DOCTYPE html>
<html>
<head>
    <title>Backend</title>
</head>
<body>

    <?php
    // Check if form data is available
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = isset($_POST["name"]) ? $_POST["name"] : '';
        $phone = isset($_POST["phone"]) ? $_POST["phone"] : '';
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $location = isset($_POST["location"]) ? $_POST["location"] : '';
        $date = isset($_POST["date"]) ? $_POST["date"] : '';
        $message = isset($_POST["message"]) ? $_POST["message"] : '';

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

        // Insert data into the database
        $sql = "INSERT INTO form (name, phone, email, location, date, message) 
                VALUES ('$name', '$phone', '$email', '$location', '$date', '$message')";

        if (mysqli_query($con, $sql)) {
            echo "Success! Your message has been sent.";
        } else {
            echo "Error while inserting record: " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
    } else {
        echo "Form data not submitted correctly.";
    }
    ?>

</body>
</html>
