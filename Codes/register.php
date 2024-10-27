<?php

    $servername = "localhost";
    $username = "bioinfc5_User";
    $password = "PZwOrPV92Xdt";
    $dbname = "bioinfc5_MainDb";
    $tableName = "UserPass";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username)) {
        echo "Error: Username cannot be empty";
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $checkQuery = "SELECT * FROM $tableName WHERE User = '$username'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "Error: Username already exists";
    } else {
        $sql = "INSERT INTO $tableName (User, Pass) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "User registered successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}

$conn->close();
?>
