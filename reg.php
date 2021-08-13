
<?php
  include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title> registration page</title>
	
</head>
<body>
	<h1> Registration Form</h1>




	<form>
		 <fieldset>
		 	<legend>Basic information:</legend>
		
		<table>
			<tr><td>First Name :</td>
				<td> <input type="text" name="firstname"></td>
			
			</tr>
			<tr>
				<td> Last Name :</td>
				<td> <input type="text" name="lname"> </td>
			</tr>
			
			
			
			<tr> <td> Gender :
			 <input type="radio" id="male" name="gender" value="male"> Male
			 <input type="radio" id="male" name="gender" value="female"> Female
			 <input type="radio" id="male" name="gender" value="other"> Other</td> 

				
			</tr>
			<tr>
				<td> Date of birth</td>
				<td><input type="date" name="dob"></td>


			</tr>
						<tr>
				<td>Religion
					<select name = "religion"> 
						<option value "">select</option>
						<option value="islam"> Islam</option>

						<option value="Hindu"> Hindu</option>

						<option value="Buddhist"> Buddha</option>

						<option value="others"> others</option>



					 </select></td>
					</tr>
				


			
				


			
		</table>
		</fieldset>

		<fieldset>
			<legend>Contact Information</legend>
			<table>
			<tr> <td> Email :</td>
				<td> <input type="text" name="email"></td>

			</tr>

			<tr> <td> Phone :</td>
				<td> <input type="tel" name="number"></td>

			</tr>
			<tr> <td> Permanent Address :</td>
				<td>  <textarea name="paddrss" rows="3" cols="20"></textarea></td>

			</tr>
			<tr> <td> Present Address :</td>
				<td> <textarea name="presaddrss" rows="3" cols="20"></textarea></td>

			</tr>





			</table>


		</fieldset>


		<fieldset>
			<legend>Account Information</legend>
			<table>
			<tr> <td> Username :</td>
				<td> <input type="text" name="uname"></td>

			</tr>

			<tr> <td> Password :</td>
				<td> <input type="password" name="pwd"></td>

			</tr>
			





			</table>


		</fieldset>


		<table>

		


			<tr> <td><input type="submit" name="submit">
			</td></tr>
			</table>


		
	</form>

	if(isset($_POST['submit'])){
	
	$uname = $_POST['uname'];
	
	$pass = $_POST['pwd'];
	
	
	
	
	if($pass==$pass){
		
		$query= "select*from user where uname='$uname'";
		$query_run= mysqli_query($con,$query);
		if($query_run){
			
			if(mysqli_num_rows($query_run) >0){
				
				echo "
		<script>
		alert('User ALready Registered ');
		window.location.href='login.php';
		</script>
		";
				
				
			}else{
				
	$insertion= "insert into user values('$uname','$pass')";
	
	           
				$insertion_run = mysqli_query($con,$insertion);
				
				if($insertion_run ){
					
					echo "
		<script>
		alert('Registration Successful ');
		window.location.href='login.php';
		</script>
		";
					
				}else{
					
						echo "
		<script>
		alert('Registration Failed  ');
		window.location.href='reg.php';
		</script>
		";
				}
				
				
			}
			
			
			
		}else{
			echo "
		<script>
		alert('Database Problem');
		window.location.href='reg.php';
		</script>
		";
			
		}
		
		
	}
	else{
		echo "
		<script>
		alert('Password  match');
		window.location.href='reg.php';
		</script>
		";
	}
	
	
}
else{
	
	
}






?>

</body>
</html>
