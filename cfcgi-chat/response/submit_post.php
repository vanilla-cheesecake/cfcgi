<?php
   include_once 'lib/session.php';
   session::checkSession();
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get the post data from the form submission
	$content = mysqli_real_escape_string($conn, $_POST['content']);
	$userId = $_SESSION['userId']; // Retrieve the user_id from the session

	// Insert the post data into the database
	$sql = "INSERT INTO tbl_post (content, userId) VALUES ( '$content', '$userId')";
	if (mysqli_query($conn, $sql)) {
		// Redirect the user back to the index.php page
		header("Location: index.php");
		exit();
	} else {
		echo "Error: " . mysqli_error($conn);
	}
}

// Close the database connection
mysqli_close($conn);


?>
