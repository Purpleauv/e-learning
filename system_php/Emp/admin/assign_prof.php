<?php
  include ('includes/admin_content.php');
  $stud_id = $_GET['stud_id'];
  $subj_name = $_GET['sub_name'];

  if(isset($_POST['assign'])){
    $prof_id=$_POST['prof'];
    update_sub_prof($stud_id, $subj_name, $prof_id);
    save_assign($stud_id, $subj_name, $prof_id);
    echo "<script type='text/javascript'> document.location = 'admin_dashboard.php'; </script>";
  }
?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <h1>Assign</h1>
    <form name=assign_prof method="post">
      <?php
          $host = "localhost";
          $_username = "root";
          $_password = "";
          $database = "testelearning_subjects";
          $conn = new mysqli($host, $_username, $_password, $database);
          $sql = "SELECT * FROM subjects WHERE subject_name = '$subj_name'";
          $query= mysqli_query($conn, $sql);
          $result = mysqli_fetch_assoc($query);
          $dept = $result['department'];

          $query = mysqli_query(new mysqli($host, $_username, $_password, 'testelearning_emp'), "SELECT * FROM info WHERE department='$dept'");
          echo '<select name="prof" id="prof">';
          echo '<option value="">Select Professor</option>';
          while($row = mysqli_fetch_assoc($query)){
            $emp_id = $row['ID'];
            $query2 = mysqli_query(new mysqli($host, $_username, $_password, 'testelearning_emp'), "SELECT * FROM subj_assigned WHERE emp_id ='$emp_id'");
          if (mysqli_num_rows($query2)<3){
              echo '<option value="'. $row['ID'] .'">' . $row['name'] . '</option>';
          }
            }
          echo '</select>';
          echo '<br><br>';
      ?>
      <input name="assign" id="assign" type="submit" value="Assign">
      <button onclick="event.preventDefault(); window.location.href='admin_dashboard.php';">Return</button>
    </form>
  </body>
</html>