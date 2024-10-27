<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

<?php

    $servername = "localhost";
    $db_username = "bioinfc5_User";
    $db_password = "PZwOrPV92Xdt";
    $db_name = "bioinfc5_MainDb";
    $books_table = "Books";
    $borrow_table = "Borrow";

    $conn = new mysqli($servername, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['username'])) {
        $username = $_GET['username'];
        $validate_sql = "SELECT * FROM UserPass WHERE User = '$username'";
        $validate_result = $conn->query($validate_sql);
        if ($validate_result->num_rows > 0) {
            echo "<h1>Hi, " . $username . "</h1>";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['return'])) {
                    $isbn_to_return = $_POST['return'];
                    $delete_sql = "DELETE FROM $borrow_table WHERE User = '$username' AND ISBN = '$isbn_to_return'";
                    if ($conn->query($delete_sql) === TRUE) {
                        echo "<p>Book with ISBN $isbn_to_return returned successfully.</p>";
                    } else {
                        echo "<p>Error returning book: " . $conn->error . "</p>";
                    }
                } elseif (isset($_POST['borrow'])) {
                    $borrow_count_sql = "SELECT COUNT(*) AS count FROM $borrow_table WHERE User = '$username'";
                    $borrow_count_result = $conn->query($borrow_count_sql);
                    $borrow_count_row = $borrow_count_result->fetch_assoc();
                    $borrowed_books_count = $borrow_count_row['count'];
                    if ($borrowed_books_count < 3) {
                        $isbn_to_borrow = $_POST['borrow'];
                        $insert_sql = "INSERT INTO $borrow_table (User, ISBN) VALUES ('$username', '$isbn_to_borrow')";
                            if ($conn->query($insert_sql) === TRUE) {
                                echo "<p>Book with ISBN $isbn_to_borrow borrowed successfully.</p>";
                            } else {
                                echo "<p>Error borrowing book: " . $conn->error . "</p>";
                            }
                    } else {
                        echo "<p>You have already borrowed the maximum allowed number of books (3).</p>";
                    }
                }
            }
            
            $sql = "SELECT b.Name, b.Author, b.ISBN FROM $books_table b
            LEFT JOIN $borrow_table br ON b.ISBN = br.ISBN
            WHERE br.ISBN IS NULL";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2><i class='fas fa-book'></i> Available Books:</h2>";
                echo "<form method='post'>";
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li><i class='fas fa-book'></i> " . $row['Name'] . " by " . $row['Author'] . " (ISBN: " . $row['ISBN'] . ")";
                    echo " <button type='submit' name='borrow' value='" . $row['ISBN'] . "'><i class='fas fa-plus'></i> Borrow</button></li>";
                }
                
                echo "</ul>";
                echo "</form>";
            } else {
                echo "<p>All books are currently borrowed.</p>";
            }
            
            echo "<hr>";

            $sql = "SELECT b.Name, b.Author, b.ISBN FROM $books_table b
            JOIN $borrow_table br ON b.ISBN = br.ISBN
            WHERE br.User = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2><i class='fas fa-book-reader'></i> Books Borrowed by $username:</h2>";
                echo "<form method='post'>";
                echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li><i class='fas fa-book-reader'></i> " . $row['Name'] . " by " . $row['Author'] . " (ISBN: " . $row['ISBN'] . ")";
                echo " <button type='submit' name='return' value='" . $row['ISBN'] . "'><i class='fas fa-undo'></i> Return</button></li>";
            }

            echo "</ul>";
            echo "</form>";
            } else {
                echo "<p>$username has not borrowed any books.</p>";
            }
        }else{
            echo "<p>Invalid username.</p>";
        }
   
    } else {
        die("<p>Username not provided</p>");
    }

    $conn->close();
    echo "<hr>";
?>

    <a href="https://bioinfcamptools.ir/Lib">Logout</a>
</body>
</html>
