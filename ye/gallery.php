<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="jquery.cycle.all.js"></script>
<script type="text/javascript">
$('#slider').cycle({ 
    fx:     'scrollHorz', 
    speed:  'slow', 
    next:   '#next', 
    prev:   '#prev' 
});
</script>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>
</head>

<body>
<div id="container">
<header>
  <h1>Dance By Freedom Works</h1>
</header>

<div id="titleBar">
  <div align="right"><a href="#">CHECK OUR SCHEDULE</a>  </div>
</div>

<nav id="topNav">
<a href="index.php">Home</a> 
<a href="gallery.php">Gallery</a> 
<a href="#">Package</a> 
<a href="#">About Us</a></nav>

<div id="main">
<div id="wrapper">
  		<div id="container">
    		<div class="controller" id="prev"></div>
    			<div id="slider">
                <img src="images/1431615372810.jpg" width="960" height="720"/>
                <img src="images/1431645184598.jpg" width="960" height="720" />
                <img src="images/1431645174644.jpg" width="960" height="720" />
                <img src="images/1431645172040.jpg" width="960" height="720"/>
                <img src="images/15.JPG" width="960" height="720" />
                <img src="images/18.JPG" width="960" height="720"/>
                <img src="images/fdw.jpg" width="960" height="720"/>
                <img src="images/fdww.jpg" width="960" height="720"/>
                <img src="images/IMG_0031.JPG" width="960" height="720"/>
                <img src="images/A.jpg" width="960" height="720" />              				
            </div>
   		  <div class="controller" id="next"></div>
      </div>
</div>
</body>
</html>
