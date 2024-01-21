<?php
session_start();

	include("connection.php");
	include("functions.php");

	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//something was posted
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];
			$email =$_POST['email'];
			$id =$_POST['id'];
			$query_1 = mysqli_query($con,"select * from user where email_address = '$email' ");
			if (mysqli_num_rows($query_1)>0) {

				$nameErr="user already exists";
			}
			else {
				


			if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && $password > 5)
			{

				$query = "insert into user (user_id, user_name, email_address) values ('$id','$user_name','$email')";
				$query_2 = "insert into admin (user_id,password) values ('$id','$password')";

				mysqli_query($con, $query);
				mysqli_query($con, $query_2);

				header("Location: index.php");
				die;

			}else
			{
				echo "Please enter some valid information!";
			}
		}
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	  <link rel="stylesheet" href="style.css">
</head>
<body>


	<form action="" method="POST" style="border:1px solid #ccc" class="col-lg-12">

	  <div class="container">
	    <div class="pic">
	      <img src="photos/login.jpg" alt="Login icon">
	    </div>

	    <h1 class="header-signup">Sign Up</h1>
	    <p>Please fill in this form to create an account.</p>
	    <hr>
			<label for="id"><b>ID</b></label><br>
			<input id="text" type="text" name="id" placeholder="Enter Id" required><br><br>
			  <label for="name"><b>Name</b></label>
			<input id="text" type="text" name="user_name" placeholder="Enter Name" required><br><br>
			<label for="emailtxt"><b>Email</b></label>
			<br>
			<input  type="email" placeholder="Enter Email" name="email" required></input>
			<br>
			  <label for="psw"><b>Password</b></label><br>
			<input id="text" type="password" name="password" placeholder="Enter Password" required><br>
				<span class="error" >* <?php echo $nameErr;?></span><br><br>
			<label>
	        <input type="checkbox"  name="remember" style="margin-bottom:15px" required> Remember me
	      </label>

	      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

			<button id="button" type="submit" value="Signup">Sign up</button>
			  <button type="reset" class="cancelbtn">Cancel</button>
				<br>
				 <div class="signup-link">Already have an account<a href="index.php"> Click to Login</a></div>
			<a href=""></a><br><br>
		</form>
	</div>
</body>
</html>
