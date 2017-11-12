<?php
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$username = stripcslashes($username);
	$password = stripcslashes($password);
    $con = mysqli_connect("localhost", "root", "", "login");
	
	
	$username = mysqli_real_escape_string($con, $username);
	$password = mysqli_real_escape_string($con, $password);

	$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'" or die("Failed to query database".mysqli_error());

	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	if ($row['username'] == $username && $row['password'] == $password) {
		echo "Login success!!! Welcome ".$row['username'];
	} else {
		echo "Failed to login!";
	}
	
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<style>
		body {
			font-family: 'Indie Flower', cursive;
			margin: 0;
			padding: 0;
		}
	</style>
	<meta charset="UTF-8">
	<title>money doors</title>
</head>
<body>
	<canvas id="ca"></canvas>
	<script type="text/javascript">
		
		var c = document.getElementById('ca');
		var cc = c.getContext('2d');
        
		c.width = window.innerWidth;
		c.height = window.innerHeight;

		cc.fillStyle = "aquamarine";
		cc.fillRect(0, 0, c.width, c.height);
		var xPosr = c.width/6;
		var xPosg = c.width*2.5/6;
		var xPosb = c.width*4/6;

		var wPos = c.width/6;
		var yPos = c.height/4;
		var hPos = c.height/2
		var cClicks = 0;
		var tTime = 30;
		var tActive = 0;
		var rc = {
			x: xPosr,
			y: yPos,
			w: wPos,
			h: hPos,
		};
		var gc = {
			x: xPosg,
			y: yPos,
			w: wPos,
			h: hPos,
		};
		var bc = {
			x: xPosb,
			y: yPos,
			w: wPos,
			h: hPos,
		};
		cc.fillStyle = "red";
		cc.fillRect(rc.x, rc.y, rc.w, rc.h);

		cc.fillStyle = "green";
		cc.fillRect(gc.x, gc.y, gc.w, gc.h);

		cc.fillStyle = "blue";
		cc.fillRect(bc.x, bc.y, bc.w, bc.h);

		var totalMon = 0;
		
		cc.font = "10px Comic Sans MS";
		cc.fillStyle = "grey";
		cc.textAlign = "center";
		cc.fillText("Developed by JJ OMG © 2017 ", c.width-100, c.height-50); 
		
		cc.font = "30px Comic Sans MS";
		cc.fillStyle = "black";
		cc.textAlign = "center";
		cc.fillText("Your Money: "+"€"+ totalMon , c.width-750, c.height-100); 
		
		cc.fillStyle = "black";
		cc.fillText("Clicks: " + cClicks, c.width-200, (c.height*0) + 30);

		var tCount = 0;
		var rCount = 0;
		var gCount = 0;
		var bCount = 0;
		var rMon = 0;
		var gMon = 0;
		var bMon = 0;
		if(tActive == 0){
        var intervalVar = setInterval(function()
		{ 
		 if (tTime > 0) {
		 cc.font = "60px Comic Sans MS";
		 cc.fillStyle = "aquamarine";
		 cc.fillText(tTime, 350, (c.height*0) + 60);
		 tTime--; 
		 cc.fillStyle = "black";
		 cc.fillText(tTime, 350, (c.height*0) + 60);
		 cc.font = "30px Comic Sans MS"; }, 1000);
		 tActive = 1;
		 }
		}

		document.addEventListener('click', dooryclick);
		function dooryclick(event) {
			tCount++;
			console.log("Working "+event.clientX+" "+event.clientY+"Square"+rc.x+" "+rc.y+ " "+ rc.w+" " +rc.h);
			if(tCount <= 30 && tTime > 0) {
			if (event.clientX > rc.x && event.clientX < (rc.x + rc.w) && event.clientY > rc.y && event.clientY < (rc.y+ rc.h)) {
				console.log("Working red");
				rCount++;
				if (rCount > 0) {
						cc.fillStyle = "aquamarine";
						cc.fillRect(0, 0, c.width, c.height);

						if(rc.w > 0){
							cc.fillStyle = "lightcoral";
							rc.x =  xPosr;
							rc.y =  yPos;
							rc.w = wPos;
							rc.h = hPos;
							cc.fillRect(rc.x, rc.y, rc.w, rc.h);
						}

						if(gc.w > 0){
							cc.fillStyle = "green";
							gc.x = gc.x + wPos/20;
							gc.w = gc.w - wPos/10;
							gc.y = gc.y + hPos/20;
							gc.h = gc.h - hPos/10;
							cc.fillRect(gc.x, gc.y, gc.w, gc.h);
							console.log("x: "+gc.x+"w: "+gc.w);
						}
					   if(bc.w > 0){

							cc.fillStyle = "blue";
							bc.x = bc.x + wPos/20;
							bc.w = bc.w - wPos/10;
							bc.y = bc.y + hPos/20;
							bc.h = bc.h - hPos/10;
							cc.fillRect(bc.x, bc.y, bc.w, bc.h);
					   }
					   if(rCount < 10 ){
						rMon += 0.10;
					  } else if (rCount > 10 && rCount < 20){
						rMon += 1;
					  } else if (rCount > 20) {
						rMon += 2;
					  }

						gCount = 0;
						bCount = 0;
						cClicks++;
				}
			}else if (event.clientX > gc.x && event.clientX < (gc.x + gc.w) && event.clientY > gc.y && event.clientY < (gc.y+ gc.h)) {
				console.log("Working green");
				gCount++;
				if (gCount > 0 ) {
						cc.fillStyle = "aquamarine";
						cc.fillRect(0, 0, c.width, c.height);

						if(gc.w > 0){
							cc.fillStyle = "lightgreen";
							gc.x = xPosg;
							gc.y = yPos;
							gc.w = wPos;
							gc.h = hPos;
							cc.fillRect(gc.x, gc.y, gc.w, gc.h);
						}

						if(rc.w > 0){
							cc.fillStyle = "red";
							rc.x = rc.x + wPos/20;
							rc.w = rc.w - wPos/10;
							rc.y = rc.y + hPos/20;
							rc.h = rc.h - hPos/10;
							cc.fillRect(rc.x, rc.y, rc.w, rc.h);
						}
						if(bc.w > 0){
							cc.fillStyle = "blue";
							bc.x = bc.x + wPos/20;
							bc.w = bc.w - wPos/10;
							bc.y = bc.y + hPos/20;
							bc.h = bc.h - hPos/10;
							cc.fillRect(bc.x, bc.y, bc.w, bc.h);
						}
					  if(gCount < 10 ){
						gMon += 0.12;
					  } else if (gCount > 10 && gCount < 20){
						gMon += 1.2;
					  } else if (gCount > 20) {
						gMon += 2.4;
					  }

						rCount = 0;
						bCount = 0;
						cClicks++;
				}
			}else if (event.clientX > bc.x && event.clientX < (bc.x + bc.w) && event.clientY > bc.y && event.clientY < (bc.y+ bc.h)) {
				console.log("Working blue");
				bCount++;
				if (bCount > 0) {
						cc.fillStyle = "aquamarine";
						cc.fillRect(0, 0, c.width, c.height);

						if(bc.w > 0){
							cc.fillStyle = "lightblue";
							bc.x = xPosb;
							bc.y = yPos;
							bc.w = wPos;
							bc.h = hPos;
							cc.fillRect(bc.x, bc.y, bc.w, bc.h);
						}

						if(rc.w > 0){
							cc.fillStyle = "red";
							rc.x = rc.x + wPos/20;
							rc.w = rc.w - wPos/10;
							rc.y = rc.y + hPos/20;
							rc.h = rc.h - hPos/10;
							cc.fillRect(rc.x, rc.y, rc.w, rc.h);
						}
						if(gc.w > 0){
							cc.fillStyle = "green";
							gc.x = gc.x + wPos/20;
							gc.w = gc.w - wPos/10;
							gc.y = gc.y + hPos/20;
							gc.h = gc.h - hPos/10;
							cc.fillRect(gc.x, gc.y, gc.w, gc.h);
						}
						if(bCount < 10 ){
						bMon += 0.15;
					  } else if (bCount > 10 && bCount < 20){
						bMon += 1.50;
					  } else if (bCount > 20) {
						bMon += 3.00;
					  }

						rCount = 0;
						gCount = 0;
						cClicks++;
				}
			}
				if (tTime > 0) {
					totalMon = rMon+gMon+bMon;
					cc.fillStyle = "black";
					cc.fillText("Your Money: "+"€"+ totalMon.toFixed(2), c.width/2, c.height*9/10); 
				}
			} else {
				cc.fillStyle = "aquamarine";
				cc.fillText("Your Money: "+"€"+ totalMon.toFixed(2), c.width/2, c.height*9/10); 
				cc.fillStyle = "red";
				cc.fillText("GAME OVER "+"Your Total Money: "+"€"+ totalMon.toFixed(2), c.width/2, c.height*9/10); 
				clearInterval(intervalVar);
			}
			cc.fillStyle = "black";
			cc.fillText("Clicks: " + cClicks, c.width-200, (c.height*0) + 30);
					cc.font = "10px Comic Sans MS";
		cc.fillStyle = "grey";
		cc.textAlign = "center";
		cc.fillText("Developed by JJ OMG © 2017 ", c.width-100, c.height-50);
			cc.font = "30px Comic Sans MS";
			
		}
	</script>
</body>
</html> -->