<?php
	session_start();
	include('../../includes/config.php');
  if (isset($_GET['id'])){
    $ID = $_GET['id'];
    delete_from_stud($ID);
    echo "<script type='text/javascript'> document.location = 'manageStudAcc.php'; </script>";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sign up Page</title>
  </head>
  <body>
    <h1>Edit Student Account</h1>
    <form name="manageStudAcc" method="post">
    	<?php show_stud(); ?>
    </form>
    <button onclick="event.preventDefault(); window.location.href='admin_dashboard.php';">Return</button>
  </body>
</html>