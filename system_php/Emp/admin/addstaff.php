<?php
	include('../../includes/config.php');
		if(isset($_POST['add_staff'])){
		$ID = checkid_emp();
		$fullname=$_POST['fullname'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$department=$_POST['department'];
		$role='Teacher';
		$img='no-user-image.jpg';
		$result = check_emp($username, $email);
		if (empty($fullname) or empty($email) or empty($username) or empty($password) or empty($password2)){
			echo "<script>alert('Some fields are empty');</script>";
		}
		elseif(!ctype_alpha(str_replace(' ', '', $fullname))){
			echo "<script>alert('Name must contain characters only');</script>";
		}
		elseif(strlen($username)<8){
			echo "<script>alert('Username is less than 8 characters');</script>";
		}
		elseif($password!=$password2){
			echo "<script>alert('Password and Confirm Password doesnt match');</script>";
		}
		elseif(strlen($password)<8){
			echo "<script>alert('Password is less than 8 characters');</script>";
		}
		elseif(mysqli_num_rows($result) > 0) {
			echo "This username and email already exists in the database.";
		} 
		else{
			$save1 = save_to_emp($ID, $fullname, $email, $username, $password, $department, $role, $img);
			$save2 = save_to_login($ID, $username, $password, $role);
			if ($save1==true and $save2==true) {
			    echo "<script>alert('Successfully Registered');</script>";
			    echo "<script type='text/javascript'> document.location = 'manageEmpAcc.php'; </script>";
			}
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign up Page</title>
</head>

<body>
    <h1>Sign up</h1>
    <form name="add_staff" method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <label for="password">Confirm Password:</label>
        <input type="password" id="password2" name="password2"><br><br>
        <label for="department">Department:</label>
		<?php include('includes/selection.php')?> 
        <br><br>
        <input name="add_staff" id="add_staff" type="submit" value="Add Staff">
        <button onclick="event.preventDefault(); window.location.href='manageEmpAcc.php';">Cancel</button>
    </form>
</body>

</html>