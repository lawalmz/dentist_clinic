<?php

session_start();

	include("connection.php");
	include("functions.php");



			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				//something was posted
				$email =$_POST['email'];
				$password = $_POST['password'];

				if(!empty($email) && !empty($password))
				{

					//read from database
					$query = "select * from user u join admin a on u.user_id = a.user_id where email_address = '$email' limit 1";
					$result = mysqli_query($con, $query);

					if($result)
					{
						if($result && mysqli_num_rows($result) > 0)
						{

							$user_data = mysqli_fetch_assoc($result);

							if($user_data['password'] === $password)
							{

								$_SESSION['user_id'] = $user_data['user_id'];
								header("Location: dentist.php");
								die;
							}
						}
					}

					$nameErr="wrong username or password!";
				}else
				{
						echo "wrong username or password!";
				}
			}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>


	<form action="" method="POST" style="border:1px solid #ccc" class="col-lg-12">
		<div class="container">
			<div class="pic">
				<img src="photos/login.jpg" alt="Login icon">
			</div>

			<h1 class="header">Login Form</h1>
			<p> Please sign in using your email and password.</p>

			<hr>

			 <label for="emailtxt"><b>Email</b></label>
			<input id="text" type="email" name="email" placeholder="Enter Email" required><br><br>
			 <label for="psw"><b>Password</b></label><br>
			<input id="text" type="password"  placeholder="Enter Password" name="password" required><br><br>
			<span class="error" >* <?php echo $nameErr;?></span>
			<div class="content">
								<div class="checkbox">
									<input type="checkbox" id="remember-me">
									<label for="remember-me">Remember me</label>
								</div>
								<div class="pass-link"><a href="#">Forgot password?</a></div>
							</div>
							<br>

			<button id="button" type="submit" value="Login">Submit</button>
			 <button type="reset" class="cancelbtn">Cancel</button>
			 <br>

			  <div class="signup-link">Not a member? <a href="signup.php">Signup now</a></div>
		</form>
	</div>
</body>
</html>
