<!DOCTYPE html>
<?php
include 'connection.php';
?>

<head>
    <title>Project Lab 2 Log</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="../jquery.js"></script>
    
    <script>
    //jquery script to auto refresh the table
    //waits until data is available 
    $(document).ready(function() {
        setInterval(function() {
            $('#x').load('loadtable.php')
        }, 3); //delay in ms
    });
    </script>
    <style>
    table {
	border-width: 3px black;
	text-align: center;
	display: inline-block;
	border-spacing: 0px;
}

section.pmu1 {
	float: left;
}

section.pmu2 {
	float: right;
}

th,
td {
	border: 1px solid black;
	padding: 5px;
	text-align: left;
}

tr:hover {
	background-color: white;
}

section.one {
	text-align: center;
	float: left;
}

section.two {
	text-align: center;
	float: right;
}
</style>
</head>

<body>
    <header>
        <nav>
            <div class="b"><a href="../index.php">Main</a></div>
            <div class="b"><a href="log.php">Log</a></div>
        </nav>
    </header>

    <section class="main">
        <em>
            <h2>Project Lab 2</h2>
            <h3>Group 6 Pulse Measurement Unit </h3>
        </em>
        <h2>Log Page</h2>
    </section>

    <section class="pmu1">

        <table>
            <p>PMU1</p>
            <thead>
                <th>UTC Time</th>
                <th>Latitude and Longitude</th>
                <th>Voltage</th>
                <th>Current</th>
                <th>Frequency</th>
                <th>Phase</th>
            </thead>
            <thead id="x"></thead>
        </table>
    </section>

    <section class="pmu2">
        <table>
            <p>PMU2</p>
            <tr>
                <th>Time</th>
                <th>Latitude and Longitude</th>
                <th>Peak Voltage</th>
                <th>Peak Current</th>
                <th>Frequency</th>
                <th>Phase Difference</th>
            </tr>
        </table>

    </section>
</body>