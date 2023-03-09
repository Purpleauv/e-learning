<?php
	session_start();
	include('../../includes/config.php');
    if(isset($_POST['add_dept'])){
        $dept_name = $_POST['dept_name'];
        $dept_code = $_POST ['dept_code'];
        $result = check_dept($dept_name, $dept_code);

        if (empty($dept_name) or empty($dept_code)){
            echo "<script>alert('Some fields are empty');</script>";
        }
        elseif(!ctype_alpha(str_replace(' ', '', $dept_name))){
            echo "<script>alert('Name must contain characters only');</script>";
        }
        elseif(mysqli_num_rows($result) > 0) {
			echo "This department already exists in the database.";
		} 
        else{
            $save = save_to_dept($dept_name, $dept_code);
            if ($save==true) {
                echo "<script type='text/javascript'> document.location = 'manageDept.php'; </script>";
            }
        }
    }
    if (isset($_GET['id'])){
        $ID = $_GET['id'];
        delete_from_dept($ID);
        echo "<script type='text/javascript'> document.location = 'manageDept.php'; </script>";
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Departments</title>
  </head>
  <body>
    <h1>Edit Departments</h1>
    <form name="manageDept" method="post">
    	<?php show_dept(); ?>
    </form>
    <br><br><br>
    <form name="add_dept" method="post">
        <label for="dept_name">Department Name:</label>
        <input type="text" id="dept_name" name="dept_name"><br><br>
        <label for="dept_code">Department Code:</label>
        <input type="dept_code" id="dept_code" name="dept_code"><br><br>
        <input name="add_dept" id="add_dept" type="submit" value="Add Department">
        <button onclick="event.preventDefault(); window.location.href='admin_dashboard.php';">Cancel</button>
    </form>
  </body>
</html>