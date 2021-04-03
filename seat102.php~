<?php

?>
<html>
<head>
<style>

.heading     {
  background: url(http://apod.nasa.gov/apod/image/0603/coma_misti.jpg) -80px -80px;
  color: red;
  -webkit-text-fill-color: transparent;
  -webkit-background-clip: text;
  font-weight: bold;
  font-size: 60px;
  font-family: arial, helvetica;
  width: 600px;
  margin: 50px auto;
  text-align: center;
}

body{
  background: #444;
}
.main{
    

    border: solid 5px #FC5185;

/*transition: border-width 0.2s linear;
*/
background-color:gray;

width: 1000px;

height: 1100px;


} img{

height: 75px;
width:75px;
}

.row{
display: flex;
padding-left:30px; 
padding-top:30px; 
}
.cell,.cell1{
padding-left:30px;
}

.cell{
padding-left:40px;
}
.cell1{
padding-left: 350px;
padding-right: 50px;
}
img:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}
#menu {
    width: 100%;
    margin: 0;
    padding: 10px 0 0 0;
    list-style: none;  
    background-color: #222;
    background-image: linear-gradient(#444, #111);
    border-radius: 50px;
    box-shadow: 0 2px 1px #9c9c9c;
}

#menu li {
    float: left;
    padding: 0 0 10px 0;
    position: relative;
}

#menu a {
    float: left;
    height: 25px;
    padding: 0 25px;
    color: #999;
    text-transform: uppercase;
    font: bold 12px/25px Arial, Helvetica;
    text-decoration: none;
    text-shadow: 0 1px 0 #000;
}

#menu li:hover > a {
    color: #fafafa;
}

*html #menu li a:hover { /* IE6 */
    color: #fafafa;
}

#menu li:hover > ul {
    display: block;
}

/* Sub-menu */
#menu ul {
    list-style: none;
    margin: 0;
    padding: 0;    
    display: none;
    position: absolute;
    top: 35px;
    left: 0;   
    background-color: #222;  
    border-radius: 5px;
}

#menu ul li {
    float: none;
    margin: 0;
    padding: 0;
    display: block;  
    box-shadow: 0 1px 0 #111111, 
                0 2px 0 #777777;
}

#menu ul li:last-child { 
    box-shadow: none;    
}

#menu ul a {    
    padding: 10px;
    height: auto;
    line-height: 1;
    display: block;
    white-space: nowrap;
    float: none;
    text-transform: none;
}


#menu ul a:hover {
    background-color: #0186ba;
}

#menu ul li:first-child a {
    border-radius: 5px 5px 0 0;
}

#menu ul li:first-child a:after {
    content: '';
    position: absolute;
    left: 30px;
    top: -8px;
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-bottom: 8px solid #444;
}

#menu ul li:first-child a:hover:after {
    border-bottom-color: #04acec; 
}

#menu ul li:last-child a {
    border-radius: 0 0 5px 5px;
}

/* Clear floated elements */
#menu:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}
</style>
</head>
<body>
<ul id="menu">
    <li><a href="main.php">Home</a></li>
    <li>
        <a href="#">Lab Schedule</a>
        <ul>
            <li><a href="schedule102.php">Room 102</a></li>
            <li><a href="schedule115.php">Room 115</a></li>
        </ul>
    </li>
    <li>
        <a href="#">Availability</a>
        <ul>
            <li><a href="seat102.php">Room 102</a></li>
            <li><a href="seat115.php">Room 115</a></li>
        </ul>
    </li>
    <li><a href="#">Ghost Mode</a></li>
</ul>
<?php
$arr;
$str = "";
$crr;
$str = file_get_contents("database.txt");
$crr = explode("\n",$str);
$ptr = join(" ",$crr);
$arr = explode(" ",$ptr);
//echo sizeof($arr);
	 /*0  1  2  3
		4  5  6  7
		8  9 10 11
	  12 13 14 15*/
	  $final=[];
	  $temp;
	  for($i=1; $i<17;$i++){
	  		$temp[$i] = "pup".$i;
	  	
	  }
	  $i=1;
	  $k=1;
	  for($j=0;$j<sizeof($arr);$j++) {
	  	for($i=1;$i<17;$i++) {
	  		if($arr[$j] == $temp[$i]) {
	  			$final[$i] = $arr[$j+3];
	  			$k++;
	  			//echo"hello";
	  		}
	  	}
	  }
	  for($i=1;$i<17;$i++) {
	  		if($final[$i] == ""){
	  			$final[$i] = $temp[$i];
	  		}
	  }
	
?>
<h2 class="heading"> LabLove</h2>
<b><p style="color:White;margin-left:200px;"> Room 102 </p></b>

<div class="main">
<div class="row">
<div class="cell"><img src="ig3.jpg"><p><?php echo $final[11]; ?></p></div>
</div>
<div class="row">

<div class="cell"><img src="ig3.jpg"><p><?php echo $final[12]; ?></p></div>
<div class="cell1"><img src="ig3.jpg"><p><?php echo $final[1]; ?></p></div>
<div class="cell"><img src="ig3.jpg"><p><?php echo $final[2]; ?></p></div>
</div>
<br><br>
<div class="row">

<div class="cell"><img src="ig3.jpg"></p><?php echo $final[13]; ?></p></div>
<div class="cell1"><img src="ig3.jpg"></p><?php echo $final[3]; ?></p></div>
<div class="cell"><img src="ig3.jpg"></p><?php echo $final[4]; ?></p></div>
</div>

<div class="row">

<div class="cell"><img src="ig3.jpg"></p><?php echo $final[14]; ?></p></div>
<div class="cell1"><img src="ig3.jpg"><p><?php echo $final[5]; ?></p></div>
<div class="cell"><img src="ig3.jpg"><p><?php echo $final[6]; ?></p></div>
</div>
<br><br>
<div class="row">

<div class="cell"><img src="ig3.jpg"><p><?php echo $final[15]; ?></p></div>
<div class="cell1"><img src="ig3.jpg"><p><?php echo $final[7]; ?></p></div>
<div class="cell"><img src="ig3.jpg"><p><?php echo $final[8]; ?></p></div>
</div>
<br><br>
<div class="row">

<div class="cell"><img src="ig3.jpg"><p><?php echo $final[16]; ?></p></div>
<div class="cell1"><img src="ig3.jpg"><p><?php echo $final[9]; ?></p></div>
<div class="cell"><img src="ig3.jpg"><p><?php echo $final[10]; ?></p></div>
</div>
</div>
</body>


</html>
