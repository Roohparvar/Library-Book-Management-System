<?php

    $servername = "localhost";
    $username = "bioinfc5_User";
    $password = "PZwOrPV92Xdt";
    $dbname = "bioinfc5_MainDb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $data = json_decode(file_get_contents("php://input"));

    $username = mysqli_real_escape_string($conn, $data->username);
    $password = mysqli_real_escape_string($conn, $data->password);
    $userType = mysqli_real_escape_string($conn, $data->userType);

    $tableName = ($userType === 'admin') ? 'AdminPass' : 'UserPass';

    $sql = "SELECT * FROM $tableName WHERE User = '$username' AND Pass = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = array("success" => true, "redirectUrl" => $userType . ".php?username=" . urlencode($username));
    } else {
        $response = array("success" => false);
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($response);
?>
