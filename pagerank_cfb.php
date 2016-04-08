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
  <h1>Fun With PageRank - College Football</h1>
  <h7>January 12, 2016<h7>
    <p>I am by no means to first person to try and rank football teams using PageRank. I quick google search will attest to that. Still I find the PageRank algorithm really interesting and was curious what kind of rankings I would get when I applied in to scores from this season. I also wanted to compare different techniques for creating links between nodes representing teams and see if I could optimize the process to give rankings that best predicted the success of teams.</p>

    <p>PageRank is an algorithm that was originally created by Larry Page and was key to the creation of Google as it allows webpages to be ranked and shown in a meaningful order in search results. The algorithm works by representing each website as a node with edges linking it to all the pages that it links to and edges connecting to it from all the pages that link to that webpage. The algorithm gives every node an initial rank value of 1 and then continually runs through the list of nodes and assigns its value to the sum of the ranks of the sites that link to it divided by the number of nodes each one links to times a dampening value plus 1 minus the dampening value (the dampening value allows for sites that are linked to by no others to still be factored in). This gives us the formula for the rank of a website <b><i>(PR(A))</b></i> to be <br><br><b><i> PR(A) = (1-d) + d (PR(T1)/C(T1) + … + PR(Tn)/C(Tn))</i></b><br><br> or more specifically the value that this approaches when we run through the list of pages many times. Basically this is the provability that a random web surfer who starts on a random page and randomly clicks on links will end up on a given page. For more info I recommend reading <a href="http://www.sirgroane.net/google-page-rank/">this</a>.</p>

    <p>To apply this algorithm to college football scores obviously the nodes represent the teams and the simplest way to link the teams is just to link the winning team to the loosing team in each game. Now all that is left to do is to write a quick program, plug in the data for the 2015 season from <a href="http://www.sports-reference.com/cfb/">this site</a>, and see what the best teams in college football are:</p>



    <table>
      <tr><th>Ranking</th><th>Team</th><th>Rank Value</th><th>AP Rank</th></th>
      <tr><td>1</td><td>Mississippi</td><td>13.152064389794507</td><td>10</td></tr>
      <tr><td>2</td><td>Alabama</td><td>11.995434228501326</td><td>1</td></tr>
      <tr><td>3</td><td>Michigan State</td><td>6.028237561703026</td><td>6</td></tr>
      <tr><td>4</td><td>Arkansas</td><td>5.851229795995238</td><td></td></tr>
      <tr><td>5</td><td>Florida</td><td>5.10865335059102</td><td>25</td></tr>
      <tr><td>6</td><td>Memphis</td><td>4.669365414640358</td><td></td></tr>
      <tr><td>7</td><td>Clemson</td><td>4.608702627429248</td><td>2</td></tr>
      <tr><td>8</td><td>Stanford</td><td>4.02385263509375</td><td>3</td></tr>
      <tr><td>9</td><td>Houston</td><td>3.8161178450930255</td><td>8</td></tr>
      <tr><td>10</td><td>Oklahoma</td><td>3.6874630785172573</td><td>5</td></tr>
      <tr><td>11</td><td>Connecticut</td><td>3.6331792831198086</td><td></td></tr>
      <tr><td>12</td><td>Nebraska</td><td>3.331446212217053</td><td></td></tr>
      <tr><td>13</td><td>Northwestern</td><td>3.252909918181448</td><td>23</td></tr>
      <tr><td>14</td><td>Louisiana State</td><td>3.1765338753239845</td><td>16</td></tr>
      <tr><td>15</td><td>Oregon</td><td>3.0300277904694557</td><td>19</td></tr>
      <tr><td>16</td><td>Michigan</td><td>2.971511890859038</td><td>12</td></tr>
      <tr><td>17</td><td>Ohio State</td><td>2.8522630010866914</td><td>4</td></tr>
      <tr><td>18</td><td>Utah</td><td>2.7683111471299626</td><td>17</td></tr>
      <tr><td>19</td><td>Iowa</td><td>2.605393298794179</td><td>9</td></tr>
      <tr><td>20</td><td>Notre Dame</td><td>2.5808425315625483</td><td>11</td></tr>
      <tr><td>21</td><td>Texas Christian</td><td>2.527663388590618</td><td>7</td></tr>
      <tr><td>22</td><td>Texas</td><td>2.4284649059411563</td><td></td></tr>
      <tr><td>23</td><td>Oklahoma State</td><td>2.412125697981591</td><td>20</td></tr>
      <tr><td>24</td><td>Navy</td><td>2.368147071648376</td><td>18</td></tr>
      <tr><td>25</td><td>Toledo</td><td>2.2649714913821746</td><td></td></tr>
</table>



<p>This isn’t quite what I was hoping for. Ole Miss is no doubt a very good team this year but I don’t know that they should have been in the championship. Also Clemson, who looked really good last night, is the #7 team in this ranking, 6-7 Connecticut and Nebraska are #11 and #12 (6 spots above Ohio State), and, as much as it pains me to admit it, Texas probably doesn’t deserve to be ranked #22 above Oklahoma State (even though we should have won our game against them). These problems all kind of makes sense though. This system only gives teams credit for who they beat and more the less people that beat those teams. Ole Miss was the only team to beat Alabama so they gain a huge boost and Texas, with wins against Oklahoma and Baylor, shoots up to #22 despite our 5-7 record. The question is though, despite these problems, how well is it working? I modified the program to run on the data from 2008-2015 (resetting after each year) and to count in what percentage of games after week 4 in the year (necessary to build up some links) the team with the higher rank won. The answer I got was 66%. That isn’t bad for sure but this is college football, in at least half of games the winner is obvious.</p>  <p>There must be a better way.</p>

<p>What if instead of just giving each team a connection for a win you gave them one weighted based on the number of points they won by? I modified the code and ran it again and got this:</p>

<table>
  <tr><th>Ranking</th><th>Team</th><th>Rank Value</th><th>AP Rank</th></th>
    <tr><td>1</td><td>Mississippi</td><td>16.546109291799667</td><td>10</td></tr>
    <tr><td>2</td><td>Alabama</td><td>16.221881946583537</td><td>1</td></tr>
    <tr><td>3</td><td>Florida</td><td>10.116506820015267</td><td>25</td></tr>
    <tr><td>4</td><td>Michigan State</td><td>7.596623396197893</td><td>6</td></tr>
    <tr><td>5</td><td>Ohio State</td><td>6.755035090366382</td><td>4</td></tr>
    <tr><td>6</td><td>Michigan</td><td>6.187586562016839</td><td>12</td></tr>
    <tr><td>7</td><td>Clemson</td><td>5.314369122578836</td><td>2</td></tr>
    <tr><td>8</td><td>Memphis</td><td>4.972078578040473</td><td></td></tr>
    <tr><td>9</td><td>Stanford</td><td>4.132866520624508</td><td>3</td></tr>
    <tr><td>10</td><td>Houston</td><td>4.121665846640544</td><td>8</td></tr>
    <tr><td>11</td><td>Florida State</td><td>3.9662263933395168</td><td>14</td></tr>
    <tr><td>12</td><td>Connecticut</td><td>3.8935762094662736</td><td></td></tr>
    <tr><td>13</td><td>Northwestern</td><td>3.558828493675431</td><td>23</td></tr>
    <tr><td>14</td><td>Utah</td><td>3.3878316726442987</td><td>17</td></tr>
    <tr><td>15</td><td>Oklahoma</td><td>3.3792875276710337</td><td>5</td></tr>
    <tr><td>16</td><td>Navy</td><td>3.1106390355524156</td><td>18</td></tr>
    <tr><td>17</td><td>Louisiana State</td><td>2.970543992031731</td><td>16</td></tr>
    <tr><td>18</td><td>Southern California</td><td>2.8507316276250267</td><td></td></tr>
    <tr><td>19</td><td>Temple</td><td>2.5541231226403918</td><td></td></tr>
    <tr><td>20</td><td>Notre Dame</td><td>2.540759670189545</td><td>11</td></tr>
    <tr><td>21</td><td>Oregon</td><td>2.298996291003772</td><td>19</td></tr>
    <tr><td>22</td><td>Oklahoma State</td><td>2.200994113966649</td><td>20</td></tr>
    <tr><td>23</td><td>Arkansas</td><td>2.1821347212464777</td><td></td></tr>
    <tr><td>24</td><td>Auburn</td><td>2.001231953036031</td><td></td></tr>
    <tr><td>25</td><td>South Florida</td><td>1.9591946276537273</td><td></td></tr>
    <tr><td colspan="4">67.4% Correct</td></tr>
</table>


<p>A little better but still not ideal. The top 25 actually look a lot better with this system but the overall percentage of games predicted correctly didn’t improve much. This is probably because this system gives large bonuses to teams with blowout wins which skews the results for lower ranked teams. For example this system ranks Georgia Tech #51 over Georgia at #54 despite Georgia Tech being 3-9 and Georgia being 10-3 because all three of Georgia Tech’s wins were either blowout victories or against a highly ranked team. Georgia on the other hand played mostly very close games except against other low ranked teams where the victories weren’t worth much.  

<p>For the next version I made a couple of changes. Links between nodes are now reduced in weight from week to week and season to season but are carried over. This allows me to only have to exclude the first 4 weeks on the 2008 season and not the first 4 weeks on every season to get meaningful data. I wrote an optimization program to determine what the optimal drop off values were for between weeks and between seasons. Not surprisingly the week to week drop off was very small and the one between seasons was very large. I expected this to slightly decrease the percentage of times the higher ranked team beat the lower ranked team but in fact it actually increased it to 71.74% although the final order didn’t change much. Next I played around with different ways of improving the linking algorithm until I found some things that improved the percentage correct significantly. To solve the problem where teams gained huge bonuses for blowout wins I took the points they won by to a power between 0 and 1. This made all wins more equal but still gave bonuses to greater margins of victory. I used my optimization code to determine the ideal value to fit my set of data. This gave me these rankings:</p>

<table>
  <tr><th>Ranking</th><th>Team</th><th>Rank Value</th><th>AP Rank</th></th>
  <tr><td>1</td><td>Mississippi</td><td>14.421438903408603</td><td>10</td></tr>
  <tr><td>2</td><td>Alabama</td><td>14.314009661876144</td><td>1</td></tr>
  <tr><td>3</td><td>Florida</td><td>7.633905416604498</td><td>25</td></tr>
  <tr><td>4</td><td>Michigan State</td><td>6.719355971259446</td><td>6</td></tr>
  <tr><td>5</td><td>Ohio State</td><td>6.386773777257061</td><td>4</td></tr>
  <tr><td>6</td><td>Clemson</td><td>5.950925413005159</td><td>4</td></tr>
  <tr><td>7</td><td>Stanford</td><td>4.5569268651639305</td><td>3</td></tr>
  <tr><td>8</td><td>Memphis</td><td>4.52878062713223</td><td></td></tr>
  <tr><td>9</td><td>Michigan</td><td>4.439600003768146</td><td>12</td></tr>
  <tr><td>10</td><td>Oklahoma</td><td>4.283558551295348</td><td>5</td></tr>
  <tr><td>11</td><td>Utah</td><td>4.052287457722774</td><td>17</td></tr>
  <tr><td>12</td><td>Oregon</td><td>3.8014638381857115</td><td>19</td></tr>
  <tr><td>13</td><td>Houston</td><td>3.660993497822507</td><td>8</td></tr>
  <tr><td>14</td><td>Florida State</td><td>3.6207386210374506</td><td>14</td></tr>
  <tr><td>15</td><td>Oklahoma State</td><td>3.5819021766017207</td><td>20</td></tr>
  <tr><td>16</td><td>Arkansas</td><td>3.5163718511428637</td><td></td></tr>
  <tr><td>17</td><td>Texas Christian</td><td>3.434071962028466</td><td>7</td></tr>
  <tr><td>18</td><td>Southern California</td><td>3.377286250509462</td><td></td></tr>
  <tr><td>19</td><td>Louisiana State</td><td>3.274145917726346</td><td>16</td></tr>
  <tr><td>20</td><td>Northwestern</td><td>3.156491625105003</td><td>23</td></tr>
  <tr><td colspan="4">72.23% Correct</td></tr>
</table>

<p>Getting better but Mississippi is still on top. To reward teams for getting more wins and not just for the teams they beat I linked a team to itself when they won but with a relatively low strength. These were the results:</p> 

<table>
  <tr><th>Ranking</th><th>Team</th><th>Rank Value</th><th>AP Rank</th></th>
  <tr><td>1</td><td>Alabama</td><td>21.2424902488574</td><td>1</td></tr>
  <tr><td>2</td><td>Ohio State</td><td>11.704640297920006</td><td>4</td></tr>
  <tr><td>3</td><td>Clemson</td><td>10.149979230255482</td><td>2</td></tr>
  <tr><td>4</td><td>Mississippi</td><td>8.779587390363004</td><td>10</td></tr>
  <tr><td>5</td><td>Stanford</td><td>6.089518400405526</td><td>3</td></tr>
  <tr><td>6</td><td>Houston</td><td>5.910931477026027</td><td>8</td></tr>
  <tr><td>7</td><td>Michigan State</td><td>5.374658656017661</td><td>6</td></tr>
  <tr><td>8</td><td>Oklahoma</td><td>4.418512016234129</td><td>5</td></tr>
  <tr><td>9</td><td>Florida</td><td>4.414748653552236</td><td>25</td></tr>
  <tr><td>10</td><td>Texas Christian</td><td>4.038496765889279</td><td>7</td></tr>
  <tr><td>11</td><td>Utah</td><td>3.8456477849565687</td><td>17</td></tr>
  <tr><td>12</td><td>Michigan</td><td>3.5303143903197296</td><td>12</td></tr>
  <tr><td>13</td><td>Oregon</td><td>3.3555492819953487</td><td>19</td></tr>
  <tr><td>14</td><td>Florida State</td><td>3.2038651411931167</td><td>14</td></tr>
  <tr><td>15</td><td>Notre Dame</td><td>3.098458569061836</td><td>11</td></tr>
  <tr><td>16</td><td>Southern California</td><td>2.838827541666553</td><td></td></tr>
  <tr><td>17</td><td>Oklahoma State</td><td>2.822590318188176</td><td>20</td></tr>
  <tr><td>18</td><td>Baylor</td><td>2.7911637337455875</td><td>13</td></tr>
  <tr><td>19</td><td>Memphis</td><td>2.7283381324200637</td><td></td></tr>
  <tr><td>20</td><td>Louisiana State</td><td>2.7133019676801435</td><td>16</td></tr>
  <tr><td colspan="4">73.25% Correct</td></tr>
</table>


<p>Looks a lot better now. One big thing that could still be improved though is to somehow incorporate the idea of a “quality loss”. To accomplish this I added a small link form the winning team to the loosing team that is inversely dependent on the difference in score. Sort of the opposite of the first score link. Again optimizing the values. Here are the results:</p>

<table>
  <tr><th>Ranking</th><th>Team</th><th>Rank Value</th><th>AP Rank</th></th>
  <tr><td>1</td><td>Alabama</td><td>6.957259047990596</td><td>1</td></tr>
  <tr><td>2</td><td>Clemson</td><td>5.384768629919646</td><td>2</td></tr>
  <tr><td>3</td><td>Ohio State</td><td>4.68255449927019</td><td>4</td></tr>
  <tr><td>4</td><td>Stanford</td><td>3.9686455361007127</td><td>3</td></tr>
  <tr><td>5</td><td>Mississippi</td><td>3.81290866288281</td><td>10</td></tr>
  <tr><td>6</td><td>Oklahoma</td><td>3.669840545782093</td><td>5</td></tr>
  <tr><td>7</td><td>Notre Dame</td><td>3.1313126577286923</td><td>11</td></tr>
  <tr><td>8</td><td>Michigan State</td><td>3.115711491929591</td><td>6</td></tr>
  <tr><td>9</td><td>Houston</td><td>3.067196935750496</td><td>8</td></tr>
  <tr><td>10</td><td>Texas Christian</td><td>3.028064235280795</td><td>7</td></tr>
  <tr><td>11</td><td>Florida State</td><td>2.980322818652764</td><td>14</td></tr>
  <tr><td>12</td><td>Michigan</td><td>2.9569599514760334</td><td>12</td></tr>
  <tr><td>13</td><td>Baylor</td><td>2.857102448017883</td><td>13</td></tr>
  <tr><td>14</td><td>Oregon</td><td>2.8281970973371484</td><td>19</td></tr>
  <tr><td>15</td><td>Utah</td><td>2.8265938814412515</td><td>17</td></tr>
  <tr><td>16</td><td>Tennessee</td><td>2.8224196145180014</td><td>22</td></tr>
  <tr><td>17</td><td>Southern California</td><td>2.8009842814746286</td><td></td></tr>
  <tr><td>18</td><td>North Carolina</td><td>2.7923511130996412</td><td>15</td></tr>
  <tr><td>19</td><td>Louisiana State</td><td>2.7669958534412435</td><td>16</td></tr>
  <tr><td>20</td><td>Florida</td><td>2.757168278193059</td><td>25</td></tr>
  <tr><td colspan="4">73.94% Correct</td></tr>
</table>

<p>This obviously helped Clemson and Ohio State as both only had one loss but they were to really good teams. One final question I had was if the point rankings should be based off of the numerical point difference or the ratio of the scores. Previously I had been using the numerical difference but I decided to convert it over to ratio to see how that change things. I had to reoptimize everything put in the end these were the results I got:</p>

<table>
  <tr><th>Ranking</th><th>Team</th><th>Rank Value</th><th>AP Rank</th></th>
  <tr><td>1</td><td>Alabama</td><td>13.879078935506218</td><td>1</td></tr>
  <tr><td>2</td><td>Clemson</td><td>9.457881153254105</td><td>2</td></tr>
  <tr><td>3</td><td>Ohio State</td><td>7.169494418189567</td><td>4</td></tr>
  <tr><td>4</td><td>Oklahoma</td><td>4.78077705016697</td><td>5</td></tr>
  <tr><td>5</td><td>Michigan</td><td>4.70056260555836</td><td>12</td></tr>
  <tr><td>6</td><td>Mississippi</td><td>4.543529339295558</td><td>10</td></tr>
  <tr><td>7</td><td>Notre Dame</td><td>4.450597882458476</td><td>11</td></tr>
  <tr><td>8</td><td>Stanford</td><td>4.269519801060248</td><td>3</td></tr>
  <tr><td>9</td><td>Florida State</td><td>4.242500272796831</td><td>14</td></tr>
  <tr><td>10</td><td>Houston</td><td>4.129250161175549</td><td>8</td></tr>
  <tr><td>11</td><td>Texas Christian</td><td>3.7310455510786915</td><td>7</td></tr>
  <tr><td>12</td><td>Arkansas</td><td>3.124350503877841</td><td></td></tr>
  <tr><td>13</td><td>Tennessee</td><td>2.9032383776386497</td><td>22</td></tr>
  <tr><td>14</td><td>North Carolina</td><td>2.8152756165448594</td><td>15</td></tr>
  <tr><td>15</td><td>Michigan State</td><td>2.8087805723467185</td><td>6</td></tr>
  <tr><td>16</td><td>Florida</td><td>2.7894561159115048</td><td>25</td></tr>
  <tr><td>17</td><td>Utah</td><td>2.7863658969691913</td><td>17</td></tr>
  <tr><td>18</td><td>Baylor</td><td>2.6866881933312023</td><td>13</td></tr>
  <tr><td>19</td><td>Navy</td><td>2.653431762625406</td><td>18</td></tr>
  <tr><td>20</td><td>Oregon</td><td>2.6466538144421903</td><td>19</td></tr>
  <tr><td colspan="4">74.97% Correct</td></tr>
</table>


<p>I had mixed feelings regarding this change. It is objectively better as the percentage of games in which the team that has the higher rankings wins is much higher but I’m not sure that I like the top 20 as much. Michigan is ranked really high and Michigan State is really low. Also Stanford sees a big drop when this system is employed. The final remaining question is how these rankings preform on data they were not optimized on. I first tested the ratio based algorithm on data from 2000 to 2008 with the first 4 weeks of the 2000 season reserved for linking teams and not predicting. It scored 71.91% which isn’t bad on data it was not optimized for. When I tested the margin of victory algorithm that initially scored over 1 percentage point lower on the optimized data it scored 72.39% of the test data. This makes me think that the ratio algorithm was only better because it optimized to fit the data better and the margin of victory algorithm is the better one overall. This fits nicely with me preferring how it ranks the top teams.</p> 

<p>In conclusion I was able to rank college football teams using the PageRank algorithm and improve on the initial results. The advantage of this algorithm is that it doesn’t just rank the top teams but it ranks every college football team giving you a complete picture of D1 college football. This certainly isn’t the best way to rank college football teams. There is lots more data you could incorporate and better algorithms you could use that can allow you to predict over 80% of games. As a relatively simple algorithm with simple code and very limited input data I was surprised how well the ranking it produced looked. Finally here are the full rankings using the data from 2000-2015:
</p>

<table>
  <tr><th>Ranking</th><th>Team</th><th>Rank Value</th><th>AP Rank</th></th>
<tr><td>1</td><td>Alabama</td><td>7.224160011334014</td><td>1</td></tr>
<tr><td>2</td><td>Clemson</td><td>5.541906053956279</td><td>2</td></tr>
<tr><td>3</td><td>Ohio State</td><td>4.86248888787741</td><td>4</td></tr>
<tr><td>4</td><td>Stanford</td><td>4.048798083941409</td><td>3</td></tr>
<tr><td>5</td><td>Mississippi</td><td>3.973252186036484</td><td>10</td></tr>
<tr><td>6</td><td>Oklahoma</td><td>3.756654928603376</td><td>5</td></tr>
<tr><td>7</td><td>Michigan State</td><td>3.237406657839539</td><td>6</td></tr>
<tr><td>8</td><td>Notre Dame</td><td>3.221913319408799</td><td>11</td></tr>
<tr><td>9</td><td>Houston</td><td>3.177763500040661</td><td>8</td></tr>
<tr><td>10</td><td>Florida State</td><td>3.0934821629792317</td><td>14</td></tr>
<tr><td>11</td><td>Texas Christian</td><td>3.092014028511254</td><td>7</td></tr>
<tr><td>12</td><td>Michigan</td><td>3.051976231095965</td><td>12</td></tr>
<tr><td>13</td><td>Louisiana State</td><td>2.9558910834288925</td><td>16</td></tr>
<tr><td>14</td><td>Baylor</td><td>2.9218945398587692</td><td>13</td></tr>
<tr><td>15</td><td>Tennessee</td><td>2.907515844194595</td><td>22</td></tr>
<tr><td>16</td><td>Oregon</td><td>2.88614416602345</td><td>19</td></tr>
<tr><td>17</td><td>Florida</td><td>2.883365790200218</td><td>25</td></tr>
<tr><td>18</td><td>Utah</td><td>2.8830021406894355</td><td>17</td></tr>
<tr><td>19</td><td>North Carolina</td><td>2.870513934700063</td><td>15</td></tr>
<tr><td>20</td><td>Southern California</td><td>2.860817353677727</td><td> </td></tr>
<tr><td>21</td><td>Arkansas</td><td>2.693500813171901</td><td> </td></tr>
<tr><td>22</td><td>Navy</td><td>2.6815302920733544</td><td>18</td></tr>
<tr><td>23</td><td>Mississippi State</td><td>2.550840483045118</td><td> </td></tr>
<tr><td>24</td><td>Western Kentucky</td><td>2.427437234983055</td><td>24</td></tr>
<tr><td>25</td><td>Iowa</td><td>2.359895079041505</td><td>9</td></tr>
<tr><td>26</td><td>Oklahoma State</td><td>2.3493840033376503</td><td>20</td></tr>
<tr><td>27</td><td>Washington</td><td>2.345241812521774</td><td> </td></tr>
<tr><td>28</td><td>Georgia</td><td>2.2800274101179046</td><td> </td></tr>
<tr><td>29</td><td>Texas A&M</td><td>2.2799104320365173</td><td> </td></tr>
<tr><td>30</td><td>Auburn</td><td>2.248746145497043</td><td> </td></tr>
<tr><td>31</td><td>Memphis</td><td>2.106909587268683</td><td> </td></tr>
<tr><td>32</td><td>West Virginia</td><td>2.0988069709103474</td><td> </td></tr>
<tr><td>33</td><td>San Diego State</td><td>2.023316897548638</td><td> </td></tr>
<tr><td>34</td><td>California</td><td>1.9998083973800473</td><td> </td></tr>
<tr><td>35</td><td>Northwestern</td><td>1.9837198319074334</td><td>23</td></tr>
<tr><td>36</td><td>UCLA</td><td>1.9656033297508748</td><td> </td></tr>
<tr><td>37</td><td>Arizona State</td><td>1.9595482430554303</td><td> </td></tr>
<tr><td>38</td><td>Toledo</td><td>1.9571656509407265</td><td> </td></tr>
<tr><td>39</td><td>Brigham Young</td><td>1.9552740040435235</td><td> </td></tr>
<tr><td>40</td><td>Boise State</td><td>1.9449966931943656</td><td> </td></tr>
<tr><td>41</td><td>Wisconsin</td><td>1.943300723429565</td><td>21</td></tr>
<tr><td>42</td><td>Temple</td><td>1.9338290803668383</td><td> </td></tr>
<tr><td>43</td><td>Bowling Green State</td><td>1.914337512174002</td><td> </td></tr>
<tr><td>44</td><td>South Florida</td><td>1.8733294043883326</td><td> </td></tr>
<tr><td>45</td><td>Louisville</td><td>1.8465286317157759</td><td> </td></tr>
<tr><td>46</td><td>Washington State</td><td>1.831973936975508</td><td> </td></tr>
<tr><td>47</td><td>Western Michigan</td><td>1.7770625516483372</td><td> </td></tr>
<tr><td>48</td><td>Georgia Southern</td><td>1.7723632455828442</td><td> </td></tr>
<tr><td>49</td><td>Miami (FL)</td><td>1.7532979228899208</td><td> </td></tr>
<tr><td>50</td><td>Pittsburgh</td><td>1.7384524789672948</td><td> </td></tr>
<tr><td>51</td><td>Air Force</td><td>1.7170629563103361</td><td> </td></tr>
<tr><td>52</td><td>Penn State</td><td>1.7105386708605215</td><td> </td></tr>
<tr><td>53</td><td>North Carolina State</td><td>1.7010018222165484</td><td> </td></tr>
<tr><td>54</td><td>Virginia Tech</td><td>1.6813341796318055</td><td> </td></tr>
<tr><td>55</td><td>Appalachian State</td><td>1.6701452911658001</td><td> </td></tr>
<tr><td>56</td><td>Texas Tech</td><td>1.668766887400046</td><td> </td></tr>
<tr><td>57</td><td>Nebraska</td><td>1.658889391522711</td><td> </td></tr>
<tr><td>58</td><td>Georgia Tech</td><td>1.6212527640771435</td><td> </td></tr>
<tr><td>59</td><td>Texas</td><td>1.560087748177339</td><td> </td></tr>
<tr><td>60</td><td>Arizona</td><td>1.5546103998306493</td><td> </td></tr>
<tr><td>61</td><td>Cincinnati</td><td>1.4879752779616622</td><td> </td></tr>
<tr><td>62</td><td>Connecticut</td><td>1.4720027364068882</td><td> </td></tr>
<tr><td>63</td><td>Utah State</td><td>1.4689319339591713</td><td> </td></tr>
<tr><td>64</td><td>Northern Illinois</td><td>1.4449947491164377</td><td> </td></tr>
<tr><td>65</td><td>Marshall</td><td>1.439102131210634</td><td> </td></tr>
<tr><td>66</td><td>Missouri</td><td>1.4121176098813124</td><td> </td></tr>
<tr><td>67</td><td>Southern Mississippi</td><td>1.4103483277653197</td><td> </td></tr>
<tr><td>68</td><td>Louisiana Tech</td><td>1.4042627179262506</td><td> </td></tr>
<tr><td>69</td><td>Minnesota</td><td>1.401874949493287</td><td> </td></tr>
<tr><td>70</td><td>Arkansas State</td><td>1.398863043137954</td><td> </td></tr>
<tr><td>71</td><td>Indiana</td><td>1.3605801440877276</td><td> </td></tr>
<tr><td>72</td><td>Duke</td><td>1.3602521805821683</td><td> </td></tr>
<tr><td>73</td><td>South Carolina</td><td>1.3533591434975678</td><td> </td></tr>
<tr><td>74</td><td>Kansas State</td><td>1.336563547609276</td><td> </td></tr>
<tr><td>75</td><td>Maryland</td><td>1.3210492183852187</td><td> </td></tr>
<tr><td>76</td><td>Iowa State</td><td>1.2645859117547698</td><td> </td></tr>
<tr><td>77</td><td>Boston College</td><td>1.2592665972458104</td><td> </td></tr>
<tr><td>78</td><td>Central Michigan</td><td>1.256794452939677</td><td> </td></tr>
<tr><td>79</td><td>Middle Tennessee State</td><td>1.1953293648354104</td><td> </td></tr>
<tr><td>80</td><td>East Carolina</td><td>1.19208679260967</td><td> </td></tr>
<tr><td>81</td><td>Illinois</td><td>1.1597159393554373</td><td> </td></tr>
<tr><td>82</td><td>Virginia</td><td>1.1364454151279006</td><td> </td></tr>
<tr><td>83</td><td>Syracuse</td><td>1.1268991092129959</td><td> </td></tr>
<tr><td>84</td><td>Ohio</td><td>1.0948949721127397</td><td> </td></tr>
<tr><td>85</td><td>Army</td><td>1.0898953872771153</td><td> </td></tr>
<tr><td>86</td><td>Kentucky</td><td>1.0760839605482424</td><td> </td></tr>
<tr><td>87</td><td>Vanderbilt</td><td>1.0693634717891984</td><td> </td></tr>
<tr><td>88</td><td>Purdue</td><td>1.0582575603024897</td><td> </td></tr>
<tr><td>89</td><td>Rutgers</td><td>1.0523179868981378</td><td> </td></tr>
<tr><td>90</td><td>Wake Forest</td><td>1.0465479065689278</td><td> </td></tr>
<tr><td>91</td><td>San Jose State</td><td>1.0281746663360987</td><td> </td></tr>
<tr><td>92</td><td>Oregon State</td><td>1.02483602454208</td><td> </td></tr>
<tr><td>93</td><td>Buffalo</td><td>0.9778664454959232</td><td> </td></tr>
<tr><td>94</td><td>Colorado State</td><td>0.9724796739711302</td><td> </td></tr>
<tr><td>95</td><td>Colorado</td><td>0.95521838188361</td><td> </td></tr>
<tr><td>96</td><td>Akron</td><td>0.945023946610994</td><td> </td></tr>
<tr><td>97</td><td>Georgia State</td><td>0.9340434648976754</td><td> </td></tr>
<tr><td>98</td><td>New Mexico</td><td>0.9333227812426348</td><td> </td></tr>
<tr><td>99</td><td>Tulsa</td><td>0.9265686395895174</td><td> </td></tr>
<tr><td>100</td><td>Troy</td><td>0.9225759057018894</td><td> </td></tr>
<tr><td>101</td><td>Nevada</td><td>0.8660562258211573</td><td> </td></tr>
<tr><td>102</td><td>Fresno State</td><td>0.8405874154998786</td><td> </td></tr>
<tr><td>103</td><td>Southern Methodist</td><td>0.8345438627239115</td><td> </td></tr>
<tr><td>104</td><td>Texas-San Antonio</td><td>0.8336273636854139</td><td> </td></tr>
<tr><td>105</td><td>Texas State</td><td>0.8312894958813077</td><td> </td></tr>
<tr><td>106</td><td>Wyoming</td><td>0.8177168233290907</td><td> </td></tr>
<tr><td>107</td><td>South Alabama</td><td>0.8131296610246296</td><td> </td></tr>
<tr><td>108</td><td>Kansas</td><td>0.7628025025590193</td><td> </td></tr>
<tr><td>109</td><td>Florida Atlantic</td><td>0.7446616388347236</td><td> </td></tr>
<tr><td>110</td><td>Ball State</td><td>0.7359578644845043</td><td> </td></tr>
<tr><td>111</td><td>Nevada-Las Vegas</td><td>0.7353214985525114</td><td> </td></tr>
<tr><td>112</td><td>North Texas</td><td>0.7314461864717602</td><td> </td></tr>
<tr><td>113</td><td>Tulane</td><td>0.7159965270025683</td><td> </td></tr>
<tr><td>114</td><td>Hawaii</td><td>0.7087076832398298</td><td> </td></tr>
<tr><td>115</td><td>Central Florida</td><td>0.6952510236890954</td><td> </td></tr>
<tr><td>116</td><td>Rice</td><td>0.6810685798567235</td><td> </td></tr>
<tr><td>117</td><td>Florida International</td><td>0.6757691943756488</td><td> </td></tr>
<tr><td>118</td><td>Old Dominion</td><td>0.6617348410773847</td><td> </td></tr>
<tr><td>119</td><td>Kent State</td><td>0.657665592627139</td><td> </td></tr>
<tr><td>120</td><td>Louisiana-Monroe</td><td>0.6559556904609171</td><td> </td></tr>
<tr><td>121</td><td>Texas-El Paso</td><td>0.6536543700896079</td><td> </td></tr>
<tr><td>122</td><td>New Mexico State</td><td>0.6525230431779202</td><td> </td></tr>
<tr><td>123</td><td>Massachusetts</td><td>0.6259609514481066</td><td> </td></tr>
<tr><td>124</td><td>Eastern Michigan</td><td>0.6177975426182662</td><td> </td></tr>
<tr><td>125</td><td>Louisiana-Lafayette</td><td>0.6034732426264243</td><td> </td></tr>
<tr><td>126</td><td>Miami (OH)</td><td>0.5574022478633163</td><td> </td></tr>
<tr><td>127</td><td>Idaho</td><td>0.5410084836595543</td><td> </td></tr>
<tr><td>128</td><td>Portland State</td><td>0.49430950488609543</td><td> </td></tr>
<tr><td>129</td><td>Charlotte</td><td>0.426612271625464</td><td> </td></tr>
<tr><td>130</td><td>Charleston Southern</td><td>0.3248664329086697</td><td> </td></tr>
<tr><td>131</td><td>Florida A&M</td><td>0.30839512988517637</td><td> </td></tr>
<tr><td>132</td><td>Wofford</td><td>0.2838487833117854</td><td> </td></tr>
<tr><td>133</td><td>Tennessee-Martin</td><td>0.27863686732751586</td><td> </td></tr>
<tr><td>134</td><td>Western Carolina</td><td>0.27743796447851354</td><td> </td></tr>
<tr><td>135</td><td>Liberty</td><td>0.2751060860092764</td><td> </td></tr>
<tr><td>136</td><td>North Dakota</td><td>0.25195493995024537</td><td> </td></tr>
<tr><td>137</td><td>North Dakota State</td><td>0.25066216675454345</td><td> </td></tr>
<tr><td>138</td><td>Alabama-Birmingham</td><td>0.2501699083157457</td><td> </td></tr>
<tr><td>139</td><td>Fordham</td><td>0.23276890053878724</td><td> </td></tr>
<tr><td>140</td><td>Tennessee Tech</td><td>0.23168873120083538</td><td> </td></tr>
<tr><td>141</td><td>Chattanooga</td><td>0.22719931634103432</td><td> </td></tr>
<tr><td>142</td><td>Yale</td><td>0.22530299161852424</td><td> </td></tr>
<tr><td>143</td><td>Holy Cross</td><td>0.22350682276629513</td><td> </td></tr>
<tr><td>144</td><td>Lamar</td><td>0.22242672181406864</td><td> </td></tr>
<tr><td>145</td><td>Citadel</td><td>0.21921072403021805</td><td> </td></tr>
<tr><td>146</td><td>Eastern Washington</td><td>0.21784862985979864</td><td> </td></tr>
<tr><td>147</td><td>Stephen F. Austin</td><td>0.21453120865250358</td><td> </td></tr>
<tr><td>148</td><td>Delaware</td><td>0.2142078232116168</td><td> </td></tr>
<tr><td>149</td><td>Northwestern State</td><td>0.2137953512282769</td><td> </td></tr>
<tr><td>150</td><td>Southern</td><td>0.21175943067922767</td><td> </td></tr>
<tr><td>151</td><td>Jacksonville State</td><td>0.20987003609031457</td><td> </td></tr>
<tr><td>152</td><td>South Dakota State</td><td>0.20794142373153612</td><td> </td></tr>
<tr><td>153</td><td>North Carolina A&T</td><td>0.2058309531827044</td><td> </td></tr>
<tr><td>154</td><td>James Madison</td><td>0.20550494514202322</td><td> </td></tr>
<tr><td>155</td><td>Illinois State</td><td>0.2047194790637865</td><td> </td></tr>
<tr><td>156</td><td>Murray State</td><td>0.2045157703253057</td><td> </td></tr>
<tr><td>157</td><td>Missouri State</td><td>0.20431112389932138</td><td> </td></tr>
<tr><td>158</td><td>Eastern Kentucky</td><td>0.20356946516977809</td><td> </td></tr>
<tr><td>159</td><td>Colgate</td><td>0.2033479562469926</td><td> </td></tr>
<tr><td>160</td><td>Norfolk State</td><td>0.20125784726153623</td><td> </td></tr>
  <tr><td colspan="4">73.24% Correct</td></tr>
</table>
</main>


<footer>
	<p id="foot">© 2016 Justin Hill</p>
</footer>


<script src="nav.js"></script>

</body>
</html>