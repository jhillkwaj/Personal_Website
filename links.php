<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
   <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>


<?php include 'NavBar.html';?>

<nav id="side_nav">
  <p onclick="openLink('https://drive.google.com/open?id=0B6fs0TXsSDUoSG14T01WR2RXQ0E')">Resume</p>
  <p onclick="openLink('https://www.github.com/jhillkwaj')">GitHub</p>
  <p onclick="openLink('https://www.linkedin.com/in/justinhill5')">LinkedIn</p>
  <p id="contactTAB" id="selectDefault" onclick="sideMenue(this, 'contact')">Contact</p>
</nav>

<main id="main">
   <address>
      <h2>Phone:</h2>
        <p>(832) 930-2718</p>
      <h2>Email:</h2>
        <p>justinhill@utexas.edu</p>
      <h2>Address:</h2>
        <p>Justin Hill<br>
        303 East 21st Street #B321<br>
        Austin, TX 78705</p>
    </address>
</main>



  <div id="contact">
    <address>
      <h2>Phone:</h2>
        <p>(832) 930-2718</p>
      <h2>Email:</h2>
        <p>justinhill@utexas.edu</p>
      <h2>Address:</h2>
        <p>Justin Hill<br>
        303 East 21st Street #B321<br>
        Austin, TX 78705</p>
    </address>
  </div>
</div>



<footer>
	<p id="foot">© 2016 Justin Hill</p>
</footer>


<script src="nav.js"></script>

</body>
</html>