<?php 

$conn = mysqli_connect('localhost', 'root', 'password', 'quest');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT text FROM text WHERE id=2";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    		while($row = mysqli_fetch_assoc($result)) {
       			echo $row['text'];
			}
		} else {
    		echo "0 results";
		}


?>