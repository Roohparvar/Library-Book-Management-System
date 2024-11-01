<?php

$servername = "localhost";
$db_username = "bioinfc5_LBMS";
$db_password = "PZwOrPV92Xdt";
$db_name = "bioinfc5_LBMS";
$borrow_table = "Borrow";


$conn = new mysqli($servername, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "DELETE FROM $borrow_table WHERE DATEDIFF(CURRENT_DATE, BorrowDate) > 14";


if ($conn->query($sql) === TRUE) {
    echo "Reservations older than 10 days have been removed successfully.";
} else {
    echo "Error removing reservations: " . $conn->error;
}

$conn->close();
?>
