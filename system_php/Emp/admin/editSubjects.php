<?php
  include('../../includes/config.php');
  $ID = $_GET['id'];
  $row = edit_subjects($ID);
  if(isset($_POST['update'])){
    $department = $_POST['department'];
    $subject_name = $_POST ['subject_name'];
    $subject_code = $_POST ['subject_code'];
    $subject_desc = $_POST ['subject_desc'];
    $units = $_POST ['units'];
    $fee = $_POST ['fee'];
    $pic = 'no-user-image.jpg';
    $update = update_subjects($ID, $department, $subject_name, $subject_code, $subject_desc, $units, $fee, $pic);
    if ($update == true){
      echo "<script>alert('Successfully Registered');</script>";
      echo "<script type='text/javascript'> document.location = 'manageSubjects.php'; </script>";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Subjects</title>
  </head>
  <body>
    <h1>Edit Subjects</h1>
    <form name="update" method="post">
      <label for="subject_name">Subject Name:</label>
      <input type="text" id="subject_name" name="subject_name" value="<?php echo $row['subject_name']?>"><br><br>
      <label for="subject_code">Subject Code:</label>
      <input type="text" id="subject_code" name="subject_code" value="<?php echo $row['subject_code']?>"><br><br>
      <label for="subject_desc">Subject Description:</label>
      <input type="text" id="subject_desc" name="subject_desc" value="<?php echo $row['subject_desc']?>"><br><br>
      <label for="units">Units:</label>
      <input type="text" id="units" name="units" value="<?php echo $row['units']?>"><br><br>
      <label for="fee">Fee:</label>
      <input type="text" id="fee" name="fee" value="<?php echo $row['fee']?>"><br><br>
      <label for="department">Department:</label>
	  <?php include('includes/selection2.php')?><br><br>

    <input name="update" id="update" type="submit" value="Update">
    <button onclick="event.preventDefault(); window.location.href='manageSubjects.php';">Cancel</button>
    </form>
  </body>
</html>