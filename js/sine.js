function drawsine(){
//ctx1.clearRect(0, 0, WIDTH, HEIGHT);

sine.height= 640;
sine.width= window.innerWidth/2-50;

    var width = sine.width;
    var height= sine.height;

    ctx1.beginPath();
    ctx1.lineWidth = 2;
    ctx1.strokeStyle = "rgb(66,44,255)";
    
    var x = 2*20;
    var y = 0;
    var a = 2*120;
    var f = 1;
    var phi = 30;
    while (x < width) {
      
        y = height/2 + (-a) * Math.sin(2*f*x*Math.PI/180+phi);
        console.log(a*Math.sin(2*f*Math.PI/180+phi));
        //console.log (pi);
        ctx1.lineTo(x, y);
        x = x + 1;
    }
    ctx1.stroke();
}
