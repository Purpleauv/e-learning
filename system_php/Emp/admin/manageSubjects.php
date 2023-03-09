<?php
	session_start();
	include('../../includes/config.php');
    if(isset($_POST['add_subjects'])){
        $department = $_POST['department'];
        $subject_name = $_POST ['subject_name'];
        $subject_code = $_POST ['subject_code'];
        $subject_desc = $_POST ['subject_desc'];
        $units = $_POST ['units'];
        $fee = $_POST ['fee'];
        $pic = "no-user-img.jpg";
        $result = check_subjects($subject_name, $subject_code);

        if (empty($department) or empty($subject_name) or empty($subject_code) or empty($subject_desc) or empty($units) or empty($fee) or empty($pic)){
            echo "<script>alert('Some fields are empty');</script>";
        }
        elseif(mysqli_num_rows($result) > 0) {
			echo "This subject already exists in the database.";
		} 
        else{
            $save = save_to_subjects($department, $subject_name, $subject_code, $subject_desc, $units, $fee, $pic);
            if ($save==true) {
                echo "<script type='text/javascript'> document.location = 'manageSubjects.php'; </script>";
            }
        }
    }
    if (isset($_GET['id'])){
        $ID = $_GET['id'];
        delete_from_subjects($ID);
        echo "<script type='text/javascript'> document.location = 'manageSubjects.php'; </script>";
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Subjects</title>
  </head>
  <body>
    <h1>Edit Subjects</h1>
    <form name="manageSubjects" method="post">
    	<?php show_subjects(); ?>
    </form>
    <br><br><br>
    <form name="add_subjects" method="post">
        <label for="subject_name">Subject Name:</label>
        <input type="text" id="subject_name" name="subject_name"><br><br>
        <label for="subject_code">Subject Code:</label>
        <input type="text" id="subject_code" name="subject_code"><br><br>
        <label for="subject_desc">Subject Description:</label>
        <input type="text" id="subject_desc" name="subject_desc"><br><br>
        <label for="units">Units:</label>
        <input type="text" id="units" name="units"><br><br>
        <label for="fee">Fee:</label>
        <input type="text" id="fee" name="fee"><br><br>
        <label for="department">Department:</label>
		<?php include('includes/selection.php')?><br><br>

        <input name="add_subjects" id="add_subjects" type="submit" value="Add Subject">
        <button onclick="event.preventDefault(); window.location.href='admin_dashboard.php';">Cancel</button>
    </form>
  </body>
</html>