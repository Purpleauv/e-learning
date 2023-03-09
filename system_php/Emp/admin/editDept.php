<?php
  include('../../includes/config.php');
  $ID = $_GET['id'];
  $row = edit_dept($ID);
  if(isset($_POST['update'])){
    $dept_name = $_POST['dept_name'];
    $dept_code = $_POST['dept_code'];
    $update = update_dept($ID, $dept_name, $dept_code);
    if ($update == true){
      echo "<script>alert('Successfully Registered');</script>";
      echo "<script type='text/javascript'> document.location = 'manageDept.php'; </script>";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Department</title>
  </head>
  <body>
    <h1>Edit Department</h1>
    <form name="update" method="post">
      <label for="dept_name">Department Name:</label>
      <input type="text" id="dept_name" name="dept_name" value="<?php echo $row['dept_name']?>"><br><br>
      <label for="dept_code">Department Code:</label>
      <input type="text" id="dept_code" name="dept_code" value="<?php echo $row['dept_code']?>"><br><br>

    <input name="update" id="update" type="submit" value="Update">
    <button onclick="event.preventDefault(); window.location.href='manageDept.php';">Cancel</button>
    </form>
  </body>
</html>