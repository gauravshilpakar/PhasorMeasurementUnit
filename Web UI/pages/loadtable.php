<?php
include 'connection.php';
//selects all available data from the SQL Database
    $sql = "SELECT * FROM pmu"; 
    $result= mysqli_query($conn, $sql);
	
    if(mysqli_num_rows($result)>0)
    {
        while($row= mysqli_fetch_assoc($result))
        {
?>
<?php
//creates table entry for all required parameters
echo "<tr>";
    echo "<td>";
        echo $row['utctime'];
        echo "</td>";
    echo "<td>";
        echo $row['loc'];
        echo "</td>";
    echo "<td>";
        echo $row['voltage'];
        echo "</td>";
    echo "<td>";
        echo $row['current'];
        echo "</td>";
    echo "<td>";
        echo $row['frequency'];
        echo "</td>";
    echo "<td>";
        echo $row['phase'];
        echo "</td>";
    echo "</tr>";
?>

<?php
        }
    }
?>

