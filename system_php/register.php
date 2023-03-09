<?php
	include('includes/config.php');
	if(isset($_POST['signup'])){
		$ID = checkid_stud();
		$fullname=$_POST['fullname'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$address=$_POST['city'];
		$role='Student';
		$img='no-user-image.jpg';
		$query = check_name_stud ($username, $email);
		$row = mysqli_fetch_assoc($query);
		if (empty($fullname) or empty($email) or empty($username) or empty($password) or empty($password2) or empty($gender) or empty($dob) or empty($address)){
			echo "<script>alert('Some fields are empty');</script>";
		}
		elseif(!ctype_alpha(str_replace(' ', '', $fullname))){
			echo "<script>alert('Name must contain characters only');</script>";
		}
		elseif($email == $row['email']){
			echo "<script>alert('Email has already been used');</script>";
		}
		elseif(strlen($username)<4){
			echo "<script>alert('Username is less than 8 characters');</script>";
		}
		elseif($username == $row['username']){
			echo "<script>alert('Username is already taken');</script>";
		}
		elseif($password!=$password2){
			echo "<script>alert('Password and Confirm Password doesnt match');</script>";
		}
		elseif(strlen($password)<8){
			echo "<script>alert('Password is less than 8 characters');</script>";
		}
		else{
			$save1 = save_to_stud($ID, $fullname, $email, $username, $password, $gender, $dob, $address, $role, $img);
			$save2 = save_to_login($ID, $username, $password, $role);
			if ($save1==true and $save2==true) {
			    echo "<script>alert('Successfully Registered');</script>";
			    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
			}
		}
	}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Learning Register</title>

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    <!-- bootstrap css-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <style>
    .myRightCtn {
        position: relative;
        background-color: #2C74B3;
        border-radius: 5%;
        height: 100%;
        padding: 5%;
        color: rgb(192, 192, 192);
        font-size: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .myLeftCtn {
        position: relative;
        background: #fff;
        border-radius: 5%;
    }

    .myLeftCtn header {
        color: #2C74B3;
        font-size: 200%;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .row {
        height: 100%;
    }

    .myCard {
        position: relative;
        background: #fff;
        height: 75%;
        border-radius: 25px;
        -webkit-box-shadow: 0px 10px 40px -10px rgba(0, 0, 0, 0.7);
        -moz-box-shadow: 0px 10px 40px -10px rgba(0, 0, 0, 0.7);
        box-shadow: 0px 10px 40px -10px rgba(0, 0, 0, 0.7);
    }

    .myRightCtn header {
        color: #fff;
        font-size: 200%;
        font-weight: 700;
    }

    .box {
        position: relative;
        margin: 5%;
        margin-bottom: 55%;
    }

    .myLeftCtn .myInput {
        width: 80%;
        border-radius: 5%;
        padding: 2%;
        padding-left: 10%;
        border: none;
        -webkit-box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
        -moz-box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
        box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
    }

    .myLeftCtn .parent .myInput {
        width: 90%;
        padding-left: 20%;
    }

    .myLeftCtn .parent .myInput {
        width: 90%;
        padding-left: 20%;
    }


    .parent {
        flex-direction: row;
        justify-content: center;
        align-items: center;
        display: flex;
    }

    .parent .form-group {
        width: 42%;
    }

    .myLeftCtn .parent .form-group .fas {
        position: relative;
        color: #2C74B3;
        left: 15%;
    }

    .parent .myInput {
        width: 100%;
        height: 40px;
    }

    f .myLeftCtn .parent2 .myInput {
        width: 90%;
        padding-left: 20%;
    }


    .myLeftCtn .parent2 {
        width: 100%;
        padding-left: 6%;
    }

    .parent2 {
        flex-direction: row;
        justify-content: center;
        align-items: center;
        display: flex;
    }

    .parent2 .form-group {
        width: 42%;
        padding-right: 5%;
    }

    .myLeftCtn .parent2 .form-group .fas {
        position: relative;
        color: #2C74B3;
        left: 15%;
    }

    .parent2 .myInput {
        width: 100%;
        height: 40px;
    }

    .myLeftCtn .myInput:focus {
        outline: none;
    }

    .myForm {
        position: relative;
        margin-top: 10%;
    }

    .myLeftCtn .button {
        background-color: #2C74B3;
        color: #fff;
        width: 25%;
        border: none;
        border-radius: 25px;
        padding: 2%;
        -webkit-box-shadow: 0px 10px 41px -11px rgba(0, 0, 0, 0.7);
        -moz-box-shadow: 0px 10px 41px -11px rgba(0, 0, 0, 0.7);
        box-shadow: 0px 10px 41px -11px rgba(0, 0, 0, 0.7);
    }

    .myLeftCtn .button:hover {
        background-color: #2C74B3;
    }

    .myLeftCtn .button:focus {
        outline: none;
    }

    .myLeftCtn .fas {
        position: relative;
        color: #2C74B3;
        left: 8%;
    }

    .button_out {
        background: transparent;
        color: #fff;
        width: 40%;
        border: 2px solid#fff;
        border-radius: 25px;
        padding: 3%;
        -webkit-box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
        -moz-box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
        box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
    }

    .button_out:hover {
        border: 2px solid#eecbff;
    }

    .button_out:focus {
        outline: none;
    }

    .regis_button {
        padding: 3%;
    }
    </style>


</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">


    <!-- Page navigation !-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" data-spy="affix" data-offset-top="0">
        <div class="container" id="bacg">
            <a class="navbar-brand" href="#"><img src="../imgs/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#service">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#course">Coures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#testimonial">Testimonial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#contact">Get in Touch</a>
                    </li>
                    <li class="nav-item">
                        <a class="- btn btn-primary rounded ml-4" href="../system_php/login.php"
                            style="font-size:120%">Sign
                            In!</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of page navibation -->


    <!-- Page Header -->
    <header class="header" id="home">
        <div class="container">
            <div class="myCard">
                <div class="row">
                    <div class="col-md-6">
                        <div class="myLeftCtn">
                            <form class="myForm text-center" name="signin-up" method="post">
                                <header>Create new account</header>

                                <div class="form-group">
                                    <i class="fas fa-user"></i>
                                    <input class="myInput" type="text" id="fullname" name="fullname"
                                        placeholder="LName, FName  M.I." required>
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-envelope"></i>
                                    <input class="myInput" type="email" id="email" name="email" placeholder="Email"
                                        required>
                                </div>


                                <div class="form-group">
                                    <i class="fas fa-user-circle"></i>
                                    <input class="myInput" type="text" id="username" name="username"
                                        placeholder="Username" required>
                                </div>

                                <div class="parent">
                                    <div class="form-group">
                                        <i class="fas fa-unlock-alt"></i>
                                        <input class="myInput" type="password" id="password" name="password"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-user"></i>
                                        <input class="myInput" type="password" id="password2" name="password2"
                                            placeholder="Confirm Password" required>
                                    </div>
                                </div>

                                <div class="parent2">
                                    <div class="form-group"
                                        style="display: inline-block;  vertical-align: middle; border-right: 2px solid #ccc; margin-right: 1%">
                                        <label for="dob"><b>Date of Birth:</b></label>
                                        <input class="myInput" type="date" id="dob" name="dob" required>
                                    </div>

                                    <div class="form-check" style="margin-right:12%">
                                        <label for="gender"><b>Gender:</b></label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="gender_male" value="Male">
                                                <label class="form-check-label" for="gender_male"><i class="fas fa-male"
                                                        aria-hidden="true" style="font-size:25px"></i></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="gender_female" value="Female">
                                                <label class="form-check-label" for="gender_female"><i
                                                        class="fas fa-female" aria-hidden="true"
                                                        style="font-size:25px"></i> </label>
                                            </div>
                                            <div style="margin-left:20px; margin-bottom:10px;">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="gender_other" value="Other">
                                                <label class="form-check-label" for="gender_other"> Prefer not to
                                                    say</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-address-book" aria-hidden="true"></i>
                                    <select class="myInput" id="city" name="city" required>
                                        <!--Sean: If city is not == Makati dashboard = Non-makati-->
                                        <option value="">Select a city</option>
                                        <?php
											// Open CSV file
											$file = fopen("cities.csv", "r");

											// Loop through each line of the file and generate options for dropdown
											while (($data = fgetcsv($file)) !== FALSE) {
												echo '<option value="' . $data[2] . '">' . $data[2] . '</option>';
											}

											// Close file
											fclose($file);
											?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <input id="check_1" name="check_1" type="checkbox" required><small> I read and
                                            agree to Terms & Conditions</small></input>
                                        <div class="invalid-feedback">You must check the box.</div>
                                    </label>
                                </div>

                                <input name="signup" type="submit" id="signin" class="button" value="Sign up">
                                <a href="" onclick="event.preventDefault(); window.location.href='login.php';">Go
                                    Back</a>
                                <div class="regis_button">Don't have an account?<a href="../system_php/register.php">
                                        Click here.</a></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 d-none d-md-block">
                        <div class="myRightCtn">
                            <div class="box">
                                <header>IDEOS!</header>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam.</p>
                                <input type="button" class="button_out" value="Learn More" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header-widget -->
        <div class="widget">
            <div class="widget-item">
                <h4>Powered by:</h4>
                <h6><a href="#">University Of Makati</a> and <a href="#">Pinnacle Technologies Inc.</a></h6>
            </div>
        </div>
    </header>
    <!-- End of Page Header -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>


</form>
</body>

</html>