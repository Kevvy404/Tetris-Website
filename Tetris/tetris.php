<!DOCTYPE html>
<html>
    <head>
      <meta charset = "UTF-8">
      <script src = "tetris.js" charset="UTF-8"></script>
    </head>
    <body>

    <link rel="stylesheet" href="websiteStylings.css" type="text/css">

		<ul class="index">
			<li><a href=index.php>Home</a></li>
      <li style = "float:right"><a href=leaderboard.php>Leaderboard</a></li>	
			<li style = "float:right"><a href=tetris.php>Play Tetris</a></li>	
		</ul>

    <div class = "main">
      
      <div class = "tetris-container" id = "tetris-bg">
        <h3 style = 'font-family: Arial'>
          SCORE:
          <span id = "score" style = 'font-family: Arial'>0</span>
        </h3>
        <button id = "start" name = "start" onclick = "backgroundAudio.play(); start();">
          Start Game
        </button>
        <script type="text/javascript">
          const backgroundAudio = new Audio();
          backgroundAudio.src = "audio/tetrisThemeSong.mp3";
          backgroundAudio.volume = 0.2;
          backgroundAudio.loop = true;
        </script>
        <div class = "tetris-bg">

          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div class="block"></div>
          <div class="block"></div>
          <div class="block"></div>
          <div class="block"></div>
          <div class="block"></div>
          <div class="block"></div>
          <div class="block"></div>
          <div class="block"></div>
          <div class="block"></div>
          <div class="block"></div>

        </div>
      </div>
        <style>

          p{
            font-family: "Arial";
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            padding-left: 40px;
            text-decoration: underline;
          }
          button{
            border-radius: 10px;
            font-family: "Arial";
            font-size: 20px;
            text-align: center;
            margin: auto;
            padding-left: 30px;
            padding-right: 30px;
            position: absolute;
            bottom: 105px;
          }
          button #start:active {
            visibility: hidden;
          }
          .tetris-container{
            border-radius: 25px;
            box-shadow: 5px 5px;
            background-color: #c7c7c7;
            opacity: 0.96;
            height: 750px;
            width: 700px;
            padding: 30px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
          }
          .tetris-bg {
            background-image: url(images/tetris-grid-bg.png);
            background-repeat: no-repeat;
            background-position: center;
            width: 300px;
            height: 600px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            display: flex;
            flex-wrap: wrap;
          }
          .tetris-bg div {
            width: 30px;
            height: 30px;
          }
          .tetromino {
            background-color: purple;
          }

        </style>
      </div>
    </body>
</html>