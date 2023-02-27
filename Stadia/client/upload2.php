<!DOCTYPE html>
<html>
<head>
	<title>Upload File to Database</title>
</head>
<body>
	<h2>Upload a File</h2>
	<form method="POST" action="upload2.php" enctype="multipart/form-data">
		<label for="file">Choose file to upload:</label>
		<input type="file" name="file" id="file">
		<br>
		<input type="submit" name="submit" value="Upload">
	</form>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stadia";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// File details
	$file_name = $_FILES['file']['name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$file_temp = $_FILES['file']['tmp_name'];

	// Read file 
	$fp = fopen($file_temp, 'r');
	$content = fread($fp, filesize($file_temp));
	$content = addslashes($content);
	fclose($fp);

	// Insert file data into database
	$sql = "INSERT INTO files (name, size, type, content) VALUES ('$file_name', '$file_size', '$file_type', '$content')";

	if (mysqli_query($conn, $sql)) {
		echo "File uploaded successfully.";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	// Close connection
	mysqli_close($conn);
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stadia";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Retrieve file data from database
$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$file_name = $row['name'];
		$file_size = $row['size'];
		$file_type = $row['type'];
		$file_content = $row['content'];
		echo "<a href='upload2.php?id=".$row['id']."'>".$file_name."</a><br>";
	}
} else {
	echo "No files found.";
}

// Close connection
mysqli_close($conn);
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stadia";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve file data from database
    $sql = "SELECT * FROM files WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Set the content type header to the appropriate type
        header("Content-Type: ".$row['type']);

        // Output the file content
        echo $row['filedata'];
    } else {
        echo "No file found.";
    }
}

mysqli_close($conn);
?>

