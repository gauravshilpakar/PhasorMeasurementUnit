<?php 
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
	die("Connection error: ". $conn->connect_error);
}
?>