<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1> Test your biology </h1>
	
	<?php 

	$a = 0;
	function doss(){
	$conn = mysqli_connect('localhost', 'root', 'password', 'quest');  		// connecting to database quest
	
		if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
		}

		for ($i = 1; $i <= 3; $i++){											
		$sql = "SELECT question, ans1, ans2, ans3, ans4, correct FROM quanda WHERE id='$i'";
		$result = mysqli_query($conn, $sql);

		
		if (mysqli_num_rows($result) > 0) {

    		while($row = mysqli_fetch_assoc($result)) {
       			$question = $row['question'];
       			$ans1 = $row['ans1'];
       			$ans2 = $row['ans2'];
       			$ans3 = $row['ans3'];
       			$ans4 = $row['ans4'];
       			$correct = $row['correct'];
			}
		} else {
    		echo "0 results";
		}
	

	echo $question;echo "<br>";
       
        echo '<form action="que_res.php" method="post">';
  		echo '<input type="radio" name="option" value="ans1">'; echo $ans1 ;echo "<br>";
  		echo '<input type="radio" name="option" value="ans2">'; echo $ans2 ;echo "<br>";
  		echo '<input type="radio" name="option" value="ans3">'; echo $ans3 ;echo "<br>";
  		echo '<input type="radio" name="option" value="ans4">'; echo $ans4 ;echo "<br>";
  		echo '<input type="submit" name="submit" value="submit">'; echo "<br>";echo "<br>";echo "<br>";
		echo '</form>';

	if(isset($_POST['submit'])){
		$num = 1;
		
		if($_POST['option'] === $correct){
			echo "correct!";
		}
		else{
			echo "wrong!";
		}
		
	}

	}
		echo "Next?";
		echo "<form action= 'que_res.php' method='post'>";
		echo "YES:"; echo '<input type="radio" name="choice" value="yes">'; echo "<br>";
  		echo "NO:"; echo '<input type="radio" name="choice" value="no">'; echo "<br>";
  		echo '<input type="submit" name="post" value="post">'; echo "<br>";echo "<br>";echo "<br>";
  		
  		if(isset($_POST['post'])){
  			$a = 1;
  		}
  		else{
  			$a = 0;
  		}


		}

	do{
		doss();

	}while($a == 1);	
	?>

	<iframe src="que_text.php" style="height:200px;width:300px;border:none;"></iframe>


</body>
</html>