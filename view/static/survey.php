<!DOCTYPE html>
<html>
<head>
	<title>Survey</title>
</head>
<body>
	<form name="form" action="" method="post">
  		<input type="text" name="Survey-Name" id="subject" placeholder="Survey-Name">
	</form>
</body>
</html>
<?php
  		  			if(isset($_POST["Survey-Name"])){
  			$table_name = $_POST["Survey-Name"];
  				$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE $table_name (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
	$re = "Table $table_name created successfully";
    echo $re;
} else {
    echo "Error creating table: " . $conn->error;

}
unset($_POST['$Survey-Name']);
$conn->close();
}

  		?>

