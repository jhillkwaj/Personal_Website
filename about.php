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
  	<p onclick="sideMenue(this, 'about')" id="selectDefault">Myself</p>
  	<p onclick="sideMenue(this, 'college')">College</p>
    <p onclick="sideMenue(this, 'work')">Work</p>
  	<p onclick="sideMenue(this, 'highschool')">Highschool</p>
</nav>

<main id="main">
    <img src="Me.jpg" alt="<Myself at a Hackathon>" style="width:304px;height:304px;">
    <h2>About</h2>
    <p>My name is Justin Hill and I study Computer Science at The University of Texas at Austin. I have been passionate about computer science from a young age when I taught myself to program using online tutorials so I could make applications and games to share with others. I was fascinated that I had the ability to make computers do what I wanted and that I could create things that other people then could interact with. Today the desire to make new and innovative things is what drives me and I always look forward to working with new people and learning about new technologies.</p>
</main>



<div>
  <div id="about">
    <img src="Me.jpg" alt="<Myself at a Hackathon>" style="width:304px;height:304px;">
    <h2>About</h2>
    <p>My name is Justin Hill and I study Computer Science at The University of Texas at Austin. I have been passionate about computer science from a young age when I taught myself to program using online tutorials so I could make applications and games to share with others. I was fascinated that I had the ability to make computers do what I wanted and that I could create things that other people then could interact with. Today the desire to make new and innovative things is what drives me and I always look forward to working with new people and learning about new technologies.</p>
  </div>

  <div id="college">
    <img src="ut.png" alt="<UT Austin>" style="width:304px;height:304px;">
    <h2>College</h2>
    <p>I am currently a freshman at The University of Texas at Austin where I am a member of Mobile App Development Club (MAD), Electronic Game Developers Society (EGaDS), Association for Computing Machinery (ACM), and Engineering Chamber Orchestra (ECHO) where I play the alto and bari saxes. I particularly enjoy attending hackathons and game jams because they provide great opportunities to learn about new technologies, work with new and interesting people, and create something in only a day or two. I finished my first semester with a 3.72 GPA and received University Honors.</p>
  </div>

  <div id="work">
    <h2>Work</h2>
    <p>Last Summer I interned at AtLink Communications in Houston, Tx on a team of three developers where we developed a database, web app, and an Android application to display the locations of undergrounded power and water lines on a map and through a 3d Augmented Reality camera overlay. As part of this project we had to determine the project requirements, produce a project plan and other documentation, set and stick to a project timeline, and present our application to members of the company at various stages of development.</p>
  </div>

  <div id="hackathons">
    <h2>Hackathons</h2>
    <p>I find hackathons extremely rewarding and I love learning about new technologies, meeting new people, and making a working project in only a day or two. Here is a list of hackathons and game jams that I have attended. You can click on them to see the projects from each event:</p>
    <ul>
      <h3 onclick="menueSelect('houalert')">City of Houston Hackathon</h3>
      <h3 onclick="openLink('https://github.com/zapper59/JBSD')">EGaDS Game Jam Fall 2015</h3>
      <h3 onclick="openLink('http://devpost.com/software/volume-profile-scheduler')">HACKTX (Austin, TX)</h3>
      <h3 onclick="sideMenue(this, 'code4good')">JP Morgan Chase Code for Good (Columbus, OH)</h3>
      <h3 onclick="menueSelect('msbp')">Jolly Game Jam (Austin, TX)</h3>
      <h3 onclick="menueSelect('twitlibs')">CodeRED Liftoff (Houston, TX)</h3>
    </ul>
  </div>

  <div id="highschool">
    <img src="clhs.jpg" alt="<Clear Lake Falcons>" style="width:304px;height:304px;">
    <h2>Highschool</h2>
    <p>I attended Clear Lake High School in Houston, Texas. It was a difficult time for me as I had previously been homeschooled when living in the Marshal Islands and I had to adjust to public school life but it is also where I really found my passion for Computer Science. I was a Captain and Lead Programmer for a Business Professionals of America (BPA) Software Engineering team from my sophomore to my senior year where I lead my team to two fourth places finishes and one second place finish and BPA Nationals. I was a chapter lead and Vice President for my schools BPA during my junior and senior years and I attended three regional, two state, and three national leadership conferences. </p>
    <p>I often stayed after school to assist my Computer Science teacher by grading test and creating labs and assignments for the pre-AP and AP computer science classes. I also tutored students in computer science and was in charge or organizing and preparing my schools UIL computer science team during my senior year where the team placed second at district competition.</p>
    <p>I was a four year member of Concert and Marching band where I played the bari sax. During my senior year I was also a Drill Instructor and was responsible for organizing my section and teaching them marching technique. I was also first chair in Area Jazz band during my Junior and Senior years and participated in school musicals and music events.</p>
    <p>Academically I was a National Merit Scholar and a National AP schooler with distinction. I took twelve AP tests and finished received ten fives and two fours. I was named the Favorite Student of the Information Technologies department and graduated Summa Cum Laude.</p>
  </div>

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