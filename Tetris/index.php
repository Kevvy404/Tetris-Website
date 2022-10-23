<?php
	session_start();

	require_once "includes/dbconnect.inc.php";
	require_once "includes/functions.inc.php";

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeatPassword'];
        $display = $_POST['display'];

		$data = ['Username ' =>$userame];
        echo json_encode($data);

        if(emptySignupInput($username,$firstName,$lastName,$password,$repeatPassword) !== false){
            header("location: register.php?error=emptyInput");
            exit();
        }

		if($display == "yes"){
			$display = "1";
		}
		else if($display == "no"){
			$display = "0";
		}
		else{
			header("location: register.php?error=emptyRadio");
			exit();
		}

        if(passwordMatch($password,$repeatPassword) !== false){
            header("location: register.php?error=passwordDoesntMatch");
            exit();
        }

        if(usernameAlreadyExists($connect, $username) !== false){
            header("location: register.php?error=passwordDoesntMatch");
            exit();
        }

        createUser($connect, $username, $firstName, $lastName, $password, $display);
	}

?>

<!DOCTYPE html>
<html>
	<title>
		Landing Page
	</title>
<body>

    <link rel="stylesheet" href="websiteStylings.css" type="text/css">

    	<ul class="index">
			<li><a name = "Home" href=index.php>Home</a></li>
            <li style = "float:right" name = "Leaderboard" ><a href=leaderboard.php>Leaderboard</a></li>	
			<li style = "float:right" name = "Tetris"><a href=tetris.php>Play Tetris</a></li>	
		</ul>

		<div class = "main">
			<?php
                if (isset($_SESSION["username"])) { $username = $_SESSION["username"]?>
					<div class = "main_container">
						<h3> Welcom To Tetris </h3>
						<br>
						<button type = "button" style = "font-size: 20px; text-decoration: none" onclick = "location.href = 'tetris.php'">
							Click here to play
						</button>
						<br>
						<br>
						<button type = "button" style = "font-size: 20px; text-decoration: none" onclick="location.href = 'includes/logout.inc.php';" id="logout">
							Logout
						</button >
					</div>
					<?php
				}
				else { ?>
					<div class = "main_container">
						<form action="includes/login.inc.php" method="post">
							<h3>Login</h3>
							<p> Please Enter Your Login Credentials! <p>
							<p>Username: </p>
							<input type = "text" name = "username" placeholder = "Enter Username" required >
							<p>Password: </p>
							<input type = "password" name= "password" placeholder = "Enter Password" required>
							<br>
							<button type = "submit" name = "submit">
								Login
							</button>
							<p>Don't have an account?<a href="register.php"> Sign up here </a></p>
						</form>
                	<?php
            	} 
			?>
				<style>
					h3{
						font-family: Arial;
						font-size: 25px;
						text-align: center;
					}
					p{
						font-family: Arial;
						font-size: 15px;
						text-align: center;
					}
					input{
						font-family: Arial;
						font-size: 15px;
						margin: 0 auto;
						display: block;
						width: 220px;
					}
					button{
						border-radius: 10px;
						width: 150px;
						margin-top: 15px;
						font-size: 22px;
						font-family: Arial;
						padding: 5px;
						margin-left: 80px;
					}
					.main_container{
						position: absolute center;
						border-radius: 20px;
						box-shadow: 5px 5px;
						background-color: #c7c7c7;
						opacity: 0.96;
						height: 340px;
						width: 300px;
						padding: 20px;
						margin-left: auto;
            			margin-right: auto;
						margin-top: 15px;
					}
				</style>

				<?php	
					if (isset($_GET["error"])) {
						switch ($_GET["error"]) {
							case "emptyInputLogin":
								echo "<p style = 'font-family: Arial; color: red;'>Please fill in all fields!</p>";
								break;
								
							case "wrongLoginDetails":
								echo "<p style = 'font-family: Arial; color: red;'>The login details are incorrect!</p>";
								break;
						}
					}
				?>
			<div>	
		</div>
	</body>
</html>