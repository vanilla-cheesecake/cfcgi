<?php 
	 define('DB_HOST', 'localhost');
	 define('DB_USER', 'root');
	 define('DB_PASS', '');
	 define('DB_NAME', 'cfcgi');


	 // Database configuration
$servername = "localhost"; // the name of the server where the MySQL database is running
$username = "root"; // the username to login to the MySQL database
$password = ""; // the password to login to the MySQL database
$dbname = "cfcgi"; // the name of the MySQL database

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize PDO
$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";
$pdo = new PDO($dsn, $username, $password);

// Check PDO connection
if (!$pdo) {
    die("PDO connection failed.");
}
	 
?>
	 