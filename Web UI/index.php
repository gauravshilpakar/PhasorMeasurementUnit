<!DOCTYPE html>
<?php
include 'pages/connection.php';
?>

<head>
    <!-- //<meta http-equiv="refresh" content="0.30"> -->
    <title>Project Lab 2</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/pepe.png" />
    <script src="jquery.js"></script>

    <script>
    //jquery script to auto refresh the table
    //waits until data is available 
    $(document).ready(function() {
        setInterval(function() {
            $('#spitdata').load('pages/spitdata.php')
        }, 30); //delay in ms
    });

    $(document).ready(function() {
        setInterval(function() {
            $('#script').load('grid copy.php')
        }, 3); //delay in ms
    });
    </script>

</head>

<body>
    <header>
        <nav>
            <div class="b"><a href="index.php">Main</a></div>
            <div class="b"><a href="pages/log.php">Log</a></div>
        </nav>
    </header>

    <section>
        <div class="logo"><a href="index.php"></a></div>
    </section>

    <section class="intro">
        <em>
            <h2>Project Lab 2</h2>
            <h3>Group 6 Pulse Measurement Unit </h3>
        </em>
        <div> PMU (Pulse Measurement Unit) - Design and build two phase measurement unit that is GPS (global positioning
            system) synchronized. The PMU must be able to determine the phase shift, frequency, peak voltage, and peak
            current. GPS is used to determine where the PMU is on the grid and the time stamp of the data that the
            system reads. Once all the parameters have been stated, the unit will extract the information and then store
            it in MySQL database in which will feed to a webpage.</div>

        <ol class="datatype">
            <li>Voltage</li>
            <li>Current</li>
            <li>Frequency</li>
            <li>Phase</li>
            <li>UTC Time</li>
            <li>Latitude and Longitude</li>
        </ol>
    </section>

    <div class="one">
        <p>PMU1</p>
        <div id="plothere">
             <canvas id="sine" style="z-index: 2;"></canvas>
             <canvas id="grid" style="z-index: 1;"></canvas>
             <script id="script" src='grid.php'></script>
        </div>
        <div id="spitdata"></div>
    </div>

    <!-- <div class="two" onload="init()">
        <p>PMU2</p>
        <canvas id="pmu2"></canvas>
    </div> -->
</body>

</html>