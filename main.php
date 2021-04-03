

<html>
<head>
<style>
	.img{
  background-image: url("https://www.alamedafree.org/files/sharedassets/library/computerlab.jpg?w=1200");
  background-color: #cccccc;
  height: 800px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  opacity: 0.8;
  
}
	.text{
		text-align: center;
		position: absolute;
  		top: 50%;
  		left: 50%;
  		transform: translate(-50%, -50%);
  		color: white;
  		opacity:0.9;
	}
	.wrap {
  width: 765px;
  margin: 0 auto;
}

h1 {
  font-size: 8em;
  font-family: 'IM Fell Great Primer';
  position: relative;
  color: #222;
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
<body bgcolor="#fffbf2">
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
<div class="img">
	<div class='wrap'>
  <h1 data='LabLove'>
    LabLove
  </h1>
</div>
</div>
</body>
</html>
