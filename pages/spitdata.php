<?php
include 'connection.php';
//selects all available data from the SQL Database
    $sql = "SELECT * FROM pmu"; 
    $result= mysqli_query($conn, $sql);
		
    if(mysqli_num_rows($result)>0)
    {
        while($row= mysqli_fetch_assoc($result))
        {
            $v= $row['voltage'];
            $f= $row['frequency'];
            $p= $row['phase'];
        }
    }
echo "Voltage= ". $v;
echo "<br>Frequency= ". $f;
echo "<br>Phase= ". $p;
?>