<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
   <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'NavBar.html';?>

<?php include 'ProjectList.html';?>

<main id="main">
  <h2>Hackathons</h2>
    <p>I find hackathons extremely rewarding and I love learning about new technologies, meeting new people, and making a working project in only a day or two. Here is a list of hackathons and game jams that I have attended. You can click on them to see the projects from each event:</p>
    <ul>
      <h3 onclick="openPage('houalert')">City of Houston Hackathon</h3>
      <h3 onclick="openLink('https://github.com/zapper59/JBSD')">EGaDS Game Jam Fall 2015</h3>
      <h3 onclick="openLink('http://devpost.com/software/volume-profile-scheduler')">HACKTX (Austin, TX)</h3>
      <h3 onclick="openPage('cfg')">JP Morgan Chase Code for Good (Columbus, OH)</h3>
      <h3 onclick="openPage('msbp')">Jolly Game Jam Fall 2015 (Austin, TX)</h3>
      <h3 onclick="openPage('twitlibs')">CodeRED Liftoff (Houston, TX)</h3>
      <h3 onclick="openLink('http://devpost.com/software/hackrice-stockapp')">HACKRICE (Houston, TX)</h3>
      <h3 onclick="openLink('http://jhillkwaj.github.io/JollyGameJamSpring2016/')">Jolly Game Jam Spring 2016 (Austin, Tx)</h3>
    </ul>
</main>

<script src="nav.js"></script>

<footer>
	<p id="foot">© 2016 Justin Hill</p>
</footer>



</body>
</html>