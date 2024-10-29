<?php

    session_start();

    $servername = "localhost";
    $db_username = "bioinfc5_LBMS";
    $db_password = "PZwOrPV92Xdt";
    $dbname = "bioinfc5_LBMS";
    $tableName = "Users";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $username = $_GET['username'];
    $validate_sql = "SELECT * FROM Admin WHERE User = '$username'";
    $validate_result = $conn->query($validate_sql);
    if ($validate_result->num_rows > 0) {
        $reserved_books_sql = "SELECT Books.Name, Books.Author, Books.ISBN, Borrow.User, Borrow.BorrowDate 
                               FROM Books 
                               JOIN Borrow ON Books.ISBN = Borrow.ISBN";
        $reserved_books_result = mysqli_query($conn, $reserved_books_sql);
    } else {
        echo "<p>Invalid username.</p>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        h2 {
            margin-top: 20px;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            background-color: #fff;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        a {
            text-decoration: none;
            color: #0066cc;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
    
</head>

<body>
    <h2>Welcome <?php $user = $_GET['username']; echo $user; ?>,</h2>
    
    <h3>Reserved Books:</h3>
    <ul>
        <?php
            while ($row = mysqli_fetch_assoc($reserved_books_result)) {
                $bookName = $row['Name'];
                $author = $row['Author'];
                $isbn = $row['ISBN'];
                $reservedBy = $row['User'];
                $borrowDate = date('Y-m-d H:i:s', strtotime($row['BorrowDate']));
                echo "<li> {$bookName} by {$author} - Reserved by: {$reservedBy} on {$borrowDate}</li>";
            }
        ?>
    </ul>
    <a href="https://bioinfcamptools.ir/LBMS/">Logout</a>
</body>
</html>
