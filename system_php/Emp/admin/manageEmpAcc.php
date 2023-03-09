<?php
	session_start();
	include('../../includes/config.php');
  if (isset($_GET['id'])){
    $ID = $_GET['id'];
    delete_from_emp($ID);
    echo "<script type='text/javascript'> document.location = 'manageEmpAcc.php'; </script>";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sign up Page</title>
  </head>
  <body>
    <h1>Edit Employee Account</h1>
    <form name="manageEmpAcc" method="post">
    	<?php show_emp(); ?>
    </form>
    <button onclick="event.preventDefault(); window.location.href='admin_dashboard.php';">Return</button>
    <button onclick="event.preventDefault(); window.location.href='addstaff.php';">Add Staff</button>
  </body>
</html>