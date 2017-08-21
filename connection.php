<?php
$connection = mysqli_connect('localhost', 'root' , '');
#Check connection
if(!$connection){
	die("connection failed: " .  mysqli_connect_error());
}
	echo "Connected successfully<br>";

#Create database
$database = "CREATE DATABASE IF NOT EXISTS bio";
if (mysqli_query($connection, $database)) {
	# code...
	echo "Database created successfully<br>";
}
else {
	echo "Error creating database" . mysqli_error($connection);
}

#Create table
$table = "CREATE TABLE IF NOT EXISTS details (
id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
title VARCHAR (30) NOT NULL,
name VARCHAR (50) NOT NULL,
email VARCHAR (40) NOT NULL,
occupation VARCHAR (25) NOT NULL)";

mysqli_select_db($connection,"bio");
if(mysqli_query($connection, $table)){
	echo "Table created successfully";
	}
	else {
	echo "Error creating table" . mysqli_error($connection);
}

#Insert into database
$result = mysqli_query($connection, "SELECT * FROM  details");
if(!$result){
	die("Database result failed: " . mysqli_error($connection));
}

$title = $_POST["title"];
$name = $_POST["name"];
$email = $_POST["email"];
$occupation = $_POST["occupation"];

$insert = "INSERT INTO details (title,name,email,occupation)
VALUES('".$title."','".$name."','".$email."','".$occupation."')";

if(mysqli_query($connection, $insert)) {
	echo "<h2>"."Your Details have been successfully added to Database."."<h2>";
}
else {
	echo "Error".mysqli_error($connection);
}

	mysqli_close($connection);

?>
<div>
  <form action="homepage.php" method="post" encytype="multipart/form-data">
    <input type="submit" value="Back" />
   </form>
 </table>
</div>