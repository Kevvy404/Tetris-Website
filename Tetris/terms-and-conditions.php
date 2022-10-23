<!DOCTYPE html>
<html>
    <body>
		<ul class="index">
			<li><a href=index.php>Home</a></li>
            <li style = "float:right"><a href=leaderboard.php>Leaderboard</a></li>	
			<li style = "float:right"><a href=tetris.php>Play Tetris</a></li>	
    </ul>
    <style>
      ul {
        list-style-type: none;
        width: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: blue;
      }
      li {
        float: left;
        margin: 0 20px;
      }
      li a{
        font-weight: bold;
        font-family: Arial;
        size: 12px;
        display: block;
        color: white;
        text-align: center;
        padding: 12px 20px;
        text-decoration: none;
        }
    li a:hover{
        background-color: #213f85;
    }
    .center {
        margin-top: 30px;
        display: block;
        width: 100%;
    } 
    body{
      background-image: url(images/terms_and_conditions.jpeg);
      background-repeat: no-repeat;
      background-attachment: fixed; 
      width: 95%;
      background-position: center;
      height: 1000px;
    }
    </style>
    </body>
</html>