<html>
<head>
<style>

img{

height: 75px;
width:75px;
}
.main{
border:1px solid black;
width: 1000px;
height: 800px;
}

.row{
display: flex;
padding-left:30px; 
padding-top:30px; 
}
.cell,.cell1{
padding:30px;
}

.cell{
padding-left:40px;
}
.cell1{
padding-left: 350px;
}
</style>
</head>
<body><!--
<div class="main">
<div class="row">
<div class="cell"><img src="ig3.jpg"></div>
<div class="cell"><img src="ig3.jpg"></div>
<div class="cell1"><img src="ig3.jpg"></div>
<div class="cell"><img src="ig3.jpg"></div>
</div>
<br><br>
<div class="row">
<div class="cell"><img src="ig3.jpg"></div>
<div class="cell"><img src="ig3.jpg"></div>
<div class="cell1"><img src="ig3.jpg"></div>
<div class="cell"><img src="ig3.jpg"></div>
</div>

<div class="row">
<div class="cell"><img src="ig3.jpg"></div>
<div class="cell"><img src="ig3.jpg"></div>
<div class="cell1"><img src="ig3.jpg"></div>
<div class="cell"><img src="ig3.jpg"></div>
</div>
<br><br>
<div class="row">
<div class="cell"><img src="ig3.jpg"></div>
<div class="cell"><img src="ig3.jpg"></div>
<div class="cell1"><img src="ig3.jpg"></div>
<div class="cell"><img src="ig3.jpg"></div>
</div>

</div>-->













<?php
$arr;
$str = "";
/*$fh = fopen("data.txt", 'r') or die("File does not exist or you lack permission to open it");
while(!feof($fh)) {  
  $str .= fgetc($fh);  
} 

fclose($fh);*/
$str = file_get_contents("data.txt"); 

$arr = explode("\n",$str);
$ptr = join(" ",$arr);
$crr = explode(" ",$ptr);
/*for($i=0;$i<20;$i++) {
	  		echo $crr[$i]."<br>";
	  }
	*/
	echo sizeof($crr);  
 ?>


















</body>
</html>