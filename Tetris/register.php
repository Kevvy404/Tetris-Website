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

			<div class = register_container>

				<form action = "index.php" method = "POST">
					<span style = "font-family: Arial; font-size: 15px"onclick="this.parentElement.style.display='none'"
					>X</span>
					<h3> Register </h3>
					<p>Enter a Username: </p>
					<input type = "text" name = "username" placeholder = "Enter Username" required>
					<p>Enter First Name: </p>
					<input type = "text" name = "firstName" placeholder = "Enter First Name" required>
					<p>Enter Last Name: </p>
					<input type = "text" name = "lastName" placeholder = "Enter Last Name" required>
					<p>Enter a Password: </p>
					<input type = "password" name = "password" placeholder = "Enter Password" required>
					<p>Repeat Password: </p>
					<input type = "password" name = "repeatPassword" placeholder = "Repeat Password" required>
					<p>Display Score on Leardboard?</p>
					<input type="radio" id="radioYes" name="display" value="yes" checked>
					<br>
					<input type="radio" id="radioNo" name="display" value="no">

						<div class="tick">
							<label for="yes_radio" required>Yes</label>
							<label for="no_radio" >No</label>
						</div>

					<p>By creating an account you agree with our <a href = "terms-and-conditions.php">terms and conditions</a></p>
					<button type = "submit" name  = "submit">Register</button>
				</form>

			</div>
			<style>
				h3{
					font-family: Arial;
					font-size: 24px;
					text-align: center;
				}
				p{
					font-family: Arial;
					font-size: 15px;
					text-align: center;
				}
				input{
					font-family: Arial;
					font-size: 13px;
					margin: 0 auto;
					display: block;
					width: 210px;
					
				}
				button{
					border-radius: 10px;
					background-color: white;
					width: 150px;
					height: 30px;
					margin-top: 15px;
					font-size: 14px;
					font-family: Arial;
					margin-left: 85px;
					padding: 5px;
					
				}
				label{
					text-align: center;
					font-family: Arial;
					font-size: 15px;
				}
				.register_container{
					border-radius: 25px;
					box-shadow: 5px 5px;
					background-color: #c7c7c7;
					opacity: 0.96;
					height: 650px;
					width: 320px;
					padding: 30px;
					margin-left: auto;
            		margin-right: auto;
				}
				.tick{
					margin-left: auto;
					margin-right: auto;
					margin-top: 0px;
					width: 100px;
					height: 25px;
					text-align: center;
					border-radius: 25px;
				}
				.tick label {
					font-family: Arial;
					font-size: 15px;
				}
				.radio_button input:radio~ .tick{
					background-color: #2196F3;
				}
				.tick:after {
					content: "";
					position: absolute;
					display: none;
				}
				label[for = yes_radio] {
					position: absolute;
					right: 50%;
				}
				label[for = yes_radio] {
					position: absolute;
				}		
				.radio_button input:radio ~ .tick:after{
					display: block;
					opacity: 1;
				}
			</style>

			<?php	
				if (isset($_GET["error"])) {
					switch ($_GET["error"]) {
						case "emptySignupInput":
                            echo "<p>Please fill in all fields!</p>";
                            break;
							
                        case "passwordMatch":
                            echo "<p>Passwords do not match!</p?";
                            break;

                        case "usernameAlreadyExists":
                            echo "<p>Username is unavailable!</p>";
                            break;

                        case "stmtFailed":
                            echo "<p>Something went wrong, try again later!</p>";
                            break;
                    }
                }

			?>
			
		</div>	
	</body>
</html>