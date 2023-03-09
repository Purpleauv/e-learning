<?php
  include('../../includes/config.php');
  $ID = $_GET['id'];
  $row = edit_stud($ID);
  if(isset($_POST['update'])){
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $update = update_stud($ID, $name, $email, $username, $password);
    if ($update == true){
      echo "<script>alert('Successfully Registered');</script>";
      echo "<script type='text/javascript'> document.location = 'manageStudAcc.php'; </script>";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Sign up Page</title>
  </head>
  <body>
    <h1>Edit Students Account</h1>
    <form name="update" method="post">
      <label for="fullname">Full Name:</label>
      <input type="text" id="fullname" name="fullname" value="<?php echo $row['name']?>"><br><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo $row['email']?>"><br><br>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" value="<?php echo $row['username']?>"><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" value="<?php echo $row['password']?>"><br><br>

    <input name="update" id="update" type="submit" value="Update">
    <button onclick="event.preventDefault(); window.location.href='manageStudAcc.php';">Cancel</button>
    </form>
  </body>
</html>