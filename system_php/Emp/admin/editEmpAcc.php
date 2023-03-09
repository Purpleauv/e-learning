<?php
  include('../../includes/config.php');
  $ID = $_GET['id'];
  $row = edit_emp($ID);
  if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $update = update_emp($ID, $name, $email, $username, $password);
    if ($update == true){
      echo "<script>alert('Successfully Registered');</script>";
      echo "<script type='text/javascript'> document.location = 'manageEmpAcc.php'; </script>";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Staff Accounts</title>
  </head>
  <body>
    <h1>Edit Staff Accounts</h1>
    <form name="update" method="post">
      <label for="name">Full Name:</label>
      <input type="text" id="name" name="name" value="<?php echo $row['name']?>"><br><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo $row['email']?>"><br><br>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" value="<?php echo $row['username']?>"><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" value="<?php echo $row['password']?>"><br><br>

    <input name="update" id="update" type="submit" value="Update">
    <button onclick="event.preventDefault(); window.location.href='manageEmpAcc.php';">Cancel</button>
    </form>
  </body>
</html>