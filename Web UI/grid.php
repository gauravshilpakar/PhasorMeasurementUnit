<?php
include 'pages/connection.php';

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
?>

init();
var step =-4;
var sine;
var ctx1;
var grid;
var ctx;
var HEIGHT=640;
var WIDTH=window.innerWidth/2-50;

function init(){
  sine = document.getElementById('sine');
  ctx1 = sine.getContext('2d');
  grid = document.getElementById('grid');
  ctx = grid.getContext('2d');
  window.requestAnimationFrame(drawAll);
}

function drawAll() {
  drawsine();
  drawgrid();
}

function drawsine() {
  // ctx1.clearRect(0, 0, 500, 500);
  ctx1.save();

  plotSine(ctx1, step, 50);
  ctx1.restore();

  step += 4;
  window.requestAnimationFrame(drawAll);
}
function drawPoint(ctx1, y) {
  var radius = 3;
  ctx1.beginPath();
  // Hold x constant at 4 so the point only moves up and down.
  ctx1.arc(4, y, radius, 0, 2 * Math.PI, false);
  ctx1.fillStyle = 'red';
  ctx1.fill();
  ctx1.lineWidth = 1;
  ctx1.stroke();
}
function plotSine(ctx1, xOffset, yOffset) {
  var width = WIDTH;
  var height = HEIGHT;
  var scale = 20;

  ctx1.beginPath();
  ctx1.lineWidth = 2;
  ctx1.strokeStyle = "rgb(66,44,255)";

  // console.log("Drawing point...");
  // drawPoint(ctx1, yOffset+step);

  var x = 4;
  var y = 0;
  var amplitude = 40;
  var frequency = 20;
  //ctx1.moveTo(x, y);
  ctx1.moveTo(x, 50);
  while (x < width) {
      y = height / 2 + amplitude * Math.sin((x + xOffset) / frequency);
      ctx1.lineTo(x, y);
      x++;
      //console.log("x="+x+" y="+y);
  }
  ctx1.stroke();
  ctx1.save();
  console.log("Drawing point at y=" + y);
  drawPoint(ctx1, y);

  ctx1.stroke();
  ctx1.restore();
}


function drawgrid(){
  ctx.clearRect(0, 0, WIDTH, HEIGHT);

  var grid_size = 20;
  var x_axis_distance_grid_lines = 16;
  var y_axis_distance_grid_lines = 0;
  var x_axis_starting_point = { number: 1 };
  var y_axis_starting_point = { number: 10 };
  
  // grid width
  grid.width = window.innerWidth/2-50;
  grid.height= 640;
  
  // no of vertical grid lines
  var num_lines_x = Math.floor(grid.height/grid_size);
  var num_lines_y = Math.floor(grid.width/grid_size);
  
  // Draw grid lines along X-axis
  for(var i=0; i<=num_lines_x; i++) {
    ctx.beginPath();
    ctx.lineWidth = 1;
    
    // If line represents X-axis draw in different color
    if(i == x_axis_distance_grid_lines) 
        ctx.strokeStyle = "black";
    else
        ctx.strokeStyle = "#e0e0e0";
    
    if(i == num_lines_x) {
        ctx.moveTo(0, grid_size*i);
        ctx.lineTo(grid.width, grid_size*i);
    }
    else {
        ctx.moveTo(0, grid_size*i+0.5);
        ctx.lineTo(grid.width, grid_size*i+0.5);
    }
    ctx.stroke();
  }
  
  // Draw grid lines along Y-axis
  for(i=0; i<=num_lines_y; i++) {
    ctx.beginPath();
    ctx.lineWidth = 1;
    
    // If line represents Y-axis draw in different color
    if(i == y_axis_distance_grid_lines) 
        ctx.strokeStyle = "black";
    else
        ctx.strokeStyle = "#e0e0e0";
    
    if(i == num_lines_y) {
        ctx.moveTo(grid_size*i, 0);
        ctx.lineTo(grid_size*i, grid.height);
    }
    else {
        ctx.moveTo(grid_size*i+0.5, 0);
        ctx.lineTo(grid_size*i+0.5, grid.height);
    }
    ctx.stroke();
  }
  ctx.translate(y_axis_distance_grid_lines*grid_size, x_axis_distance_grid_lines*grid_size);
  
  // Ticks marks along the positive X-axis
  for(i=1; i<(num_lines_y ); i++) {
    ctx.beginPath();
    ctx.lineWidth = 1;
    ctx.strokeStyle = "#000000";
  
    // Draw a tick mark 6px long (-3 to 3)
    ctx.moveTo(grid_size*i+0.5, -3);
    ctx.lineTo(grid_size*i+0.5, 3);
    ctx.stroke();
  
    // Text value at that point
    ctx.font = '9px Arial';
    ctx.textAlign = 'start';
    ctx.fillText(x_axis_starting_point.number*i , grid_size*i-2, 15);
  }
  
  // Ticks marks along the negative X-axis
  for(i=1; i<y_axis_distance_grid_lines; i++) {
    ctx.beginPath();
    ctx.lineWidth = 1;
    ctx.strokeStyle = "#000000";
  
    // Draw a tick mark 6px long (-3 to 3)
    ctx.moveTo(-grid_size*i+0.5, -3);
    ctx.lineTo(-grid_size*i+0.5, 3);
    ctx.stroke();
  
    // Text value at that point
    ctx.font = '9px Arial';
    ctx.textAlign = 'end';
    ctx.fillText(-x_axis_starting_point.number*i , -grid_size*i+3, 15);
  }
  
  // Ticks marks along the positive Y-axis
  // Positive Y-axis of graph is negative Y-axis of the grid
  for(i=1; i<(num_lines_x - x_axis_distance_grid_lines); i++) {
    ctx.beginPath();
    ctx.lineWidth = 1;
    ctx.strokeStyle = "#000000";
  
    // Draw a tick mark 6px long (-3 to 3)
    ctx.moveTo(-3, grid_size*i+0.5);
    ctx.lineTo(3, grid_size*i+0.5);
    ctx.stroke();
  
    // Text value at that point
    ctx.font = '9px Arial';
    ctx.textAlign = 'start';
    ctx.fillText(-y_axis_starting_point.number*i , 8, grid_size*i+3);
  }
  
  // Ticks marks along the negative Y-axis
  // Negative Y-axis of graph is positive Y-axis of the grid
  for(i=1; i<x_axis_distance_grid_lines; i++) {
    ctx.beginPath();
    ctx.lineWidth = 1;
    ctx.strokeStyle = "#000000";
  
    // Draw a tick mark 6px long (-3 to 3)
    ctx.moveTo(-3, -grid_size*i+0.5);
    ctx.lineTo(3, -grid_size*i+0.5);
    ctx.stroke();
  
    // Text value at that point
    ctx.font = '9px Arial';
    ctx.textAlign = 'start';
    ctx.fillText(y_axis_starting_point.number*i , 8, -grid_size*i+3);
  }
}

function drawsine(){
  //ctx1.clearRect(0, 0, WIDTH, HEIGHT);
  
  sine.height= 640;
  sine.width= window.innerWidth/2-50;
  
      var width = sine.width;
      var height= sine.height;
  
      ctx1.beginPath();
      ctx1.lineWidth = 2;
      ctx1.strokeStyle = "rgb(66,44,255)";
      
      var x = 0;
      var y = 0;
      var Ar=0;
      var Ai=0;
      var amp = <?php echo $v?>;
      var freq = <?php echo $f?>;
      var phase = <?php echo $p?>;
    
      var a = 2*amp;
      var f = freq/60;
      var phi = phase;
      var Vrms = amp/sqrt(2);
      while (x < width) {
          y = height/2 + (-a) * Math.cos(2*f*x*Math.PI/180+phi);
          Ar = Vrms*cos($p); 
          Ai = Vrms*sin($p);
          ctx1.lineTo(x, y);
          ctx2.lineTo(Ar, Ai);
          x = x + 1;
      }
      ctx1.stroke();
  }


