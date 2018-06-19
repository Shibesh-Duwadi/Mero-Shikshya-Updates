<?php session_start(); ?>
<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "quest";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql =  "INSERT INTO quanda (id, question, ans1, ans2, ans3, ans4, correct)
VALUES ('3', 'Fleshy part of apple is made up of___________.', 'apex cells', 'sclerenchyma', 'parenchyma', 'collenchyma', 'ans2')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


// Create database

mysqli_close($conn);
?> 