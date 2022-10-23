<?php
  if (isset($_POST["Score"])) {

    $Score = $_POST["Score"];
    
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
    require_once 'index.php';

    addScoreToLeaderboard($connect, $Username, $Score);
  }
?>

<!DOCTYPE html>
<html>
    <body>

    <link rel="stylesheet" href="websiteStylings.css" type="text/css">

		<ul class="index">
			<li><a href=index.php>Home</a></li>
      <li style = "float:right"><a href=leaderboard.php>Leaderboard</a></li>	
			<li style = "float:right"><a href=tetris.php>Play Tetris</a></li>	
		</ul>

    <div class = "main">

      <div class = "leaderboard_container" id = "leaderboard_container">

        <span 
        style = "font-family: Arial; font-size: 15px"
        onclick = "this.parentElement.style.display='none'"
        onclick = changeBG()>
          X
        </span>

        <h3>Leaderboard</h3>

        <table>
          <tr>
            <th>Username</th>
            <th>Score</th>
          </tr>
          <tr>
          <?php
            $conn = mysqli_connect("localhost", "root", "WebDev2021", "tetris", 53331);
            $result = mysqli_query($conn, "SELECT Username, Score FROM Scores ORDER BY Score DESC");
                if (mysqli_num_rows($result)) {
                  while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                      <td>{$row['Username']}</td>
                      <td>{$row['Score']}</td>
                    </tr>";
                }
              }
            ?>
          </tr>
        </table> 

      </div>
      <style>
        .leaderboard_container{
          border-radius: 25px;
          box-shadow: 5px 5px;
          background-color: #c7c7c7;
          opacity: 0.96;
          height: 450px;
          width: 550px;
          padding: 20px;
          margin-left: auto;
          margin-right: auto;
          margin-top: 50px;
        }
        h3{
          font-family: Arial;
          font-size: 22px;
          text-align: center;
          font-weight: bold;
        }
        table{
          width: 100%;
          border: 1px solid grey;
          border-collapse: collapse;
          border-spacing: 2px;
        }
        td{
          text-align: left;
          border: 1px solid;
          border-collapse: collapse;
          width: 25%;
          text-align:center;
          font-family: Arial;
          font-size: 18px;
        }
        th{
          height: 20px;
          border: 1px solid;
          width: 25%;
          border-collapse: collapse;
          padding: 3px;
          font-family: Arial;
          font-size: 16px;
          font-weight: bold;
          color: white;
          background-color: blue;
        }
        tr:nth-child(even) {
          background-color: #dddddd;
        }
      </style>
      </div>
    </body>
</html>