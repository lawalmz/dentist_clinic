<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Nurse</title>
  	<link rel="stylesheet" href="style2.css">
  </head>
  <body>
    <h1 class="h1">Select the table you want to modify</h1>
    <div class="b">
      <a href="Dentist.php"><button type="submit" class="Dentist" >DENTIST</button></a>
      <a href="Receptionist.php"><button type="submit" class="Receptionist">Receptionist</button></a>
      <button  type="submit" class="Nurse">Nurse</button>
    </div>
    <br>

    <form class="" name="" method="post">
      <div class="container">
        <div class="pic">
          <img src="photos/nurse-modified.png" alt="Login icon">
          </div><br>
          <h1 class="header">Nurse</h1>
        <label for="id"><b>ID</b></label>
  			<input id="text" type="text" name="id" placeholder="Enter Id" required><br>
        <label for="name"><b>Name</b></label>
     <input id="text" type="text" name="user_name" placeholder="Enter Name" required><br>
     <label for="emailtxt"><b>Email</b></label>
     <br>
     <input  type="email" placeholder="Enter Email" name="email" required></input>
     <br>
       <label for="Salary"><b>Salary</b></label><br>
     <input id="text" type="text" name="salary" placeholder="Enter Salary" required><br>
     <label for="Date_of_birth"><b>Date_of_birth</b></label><br>
   <input id="text" type="text" name="Date_of_birth" placeholder="Enter Date_of_birth   'YYYY-MM-DD'" required><br>

       <button id="button" type="submit" name="Insert" value="Insert">Insert</button>
       <button type="submit" name="Delete" class="cancelbtn">Delete</button>
        <button id="button" type="submit" name="Update" value="Update">Update</button><br>

       <p>*note that to update a Nurse you can only use his/her id to update name, salary etc</p>

      </div>

</form>
    <div class="t">
    <table id="customers">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date_of_birth</th>
        <th>Salary</th>
      </tr>



    <?php
      session_start();

    	include("connection.php");
    	include("functions.php");
      $id = $_POST['id'];
      $name =$_POST['user_name'];
      $email = $_POST['email'];
      $salary =$_POST['salary'];
      $date_of_birth =$_POST['Date_of_birth'];

      if(isset($_POST["delete"]))
      {
        mysqli_query($con,"delete from user where user_id ='$id'");
      }

      if(isset($_POST["Insert"]))
      {
        mysqli_query($con,"insert into user (user_id, user_name,email_address,salary,date_of_birth) values ('$id','$name','$email','$salary','$date_of_birth')");
        mysqli_query($con,"insert into nurse (user_id) values ('$id')");
      }
      if (isset($_POST["Update"]))
      {
        mysqli_query($con,"update user  set user_name ='$name' where user_id='$id' ");
        mysqli_query($con,"update user set email_address ='$email' where user_id='$id' ");
        mysqli_query($con,"update user  set Salary ='$salary' where user_id='$id' ");
        mysqli_query($con,"update user  set date_of_birth ='$date_of_birth' where user_id='$id' ");

      }

    $res = mysqli_query($con,"select n.user_id,user_name,email_address,date_of_birth,salary from user u join nurse n on u.user_id = n.user_id");
    while ($row = mysqli_fetch_array($res))
    {
      echo "<tr>";

      echo "<td>";  echo $row["user_id"]; echo "</td>";
      echo "<td>";  echo $row["user_name"]; echo "</td>";
      echo "<td>";  echo $row["email_address"]; echo "</td>";
      echo "<td>";  echo $row["date_of_birth"]; echo "</td>";
      echo "<td>";  echo $row["salary"]; echo "</td>";


      echo "</tr>";
    }


     ?>
     </table>
        </div>
  </body>
</html>
