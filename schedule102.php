
<?php	
	require_once("dbinfo.inc");
	$err;
	$msg;
	$day;
	$subID;
	$start;
	$end;
	$diff;
	$divi;
	
?>
<html>
<head>
<style>

	.main{
		border:2px solid black;
		width:900px;
		height: 1050px;
		text-align: center;
		overflow: hidden;
	}
	.row{
		width:100%;
		display: flex;
		height: 5%;
	}
	.column{
		width:20%;
		height:95%;
		float: left;
	}
	.cell{
		border:1px solid black; 
		width:100%;
	}
	.cell1{
		border:1px solid black; 
		width:100%;
		
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
<body >
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
	$myHandle;
	try{
		$myHandle = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

	}catch(PDOException $e){
		$err .= "Connection failed: " . $e->getMessage() . "\n";
	}	
		
	//if the database connection was valid	
	if($myHandle){
		//find out which band they selected
		
		//build a query to get all that band's albums
		$mystmt = "select days, sub, stime, etime from timetable;";
		//query the db
		$rslt = $myHandle->query($mystmt);
		$i=1;
		echo"<br><br>";
		//iterate through the returned results, and build an array of books
		echo"<div class='main'>";
			echo"<div class='row'>";
				echo"<div class='cell1'>Monday</div>";
				echo"<div class='cell1'>Tuesday</div>";
				echo"<div class='cell1'>Wednesday</div>";
				echo"<div class='cell1'>Thursday</div>";
				echo"<div class='cell1'>Friday</div>";
			echo"</div>";
		foreach ($rslt as $row){
				
			//retrieving Each value of a row 
				$day = $row['days'];
				$subID = $row['sub'];
 				$start = $row['stime'];
 				$end = $row['etime'];
 				if($i==1 || $i==5 || $i==9 || $i==14 || $i==23) {
 						echo"<div class='column'>";
 					}
 					
 					$diff = $end - $start;
 					$divi = ($diff/1370)*100;
 					if($divi < 8) {
 						$divi=$divi + 1;
 					}
 						echo"<div class='cell' style='height:$divi% ;'>$subID<br>$start-$end</div>";
 					
 					if( $i==4 || $i==8 || $i==13 || $i==22) {
 						echo "</div>";
 					}
 					 				
 				$i++;
			}
			echo "</div>";
		}
?>


</body>
</html>
<?php
$i=0;
?>