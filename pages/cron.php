<?php
include 'connection.php';
// sql to delete a record
$sql = "DELETE FROM pmu";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>