<?php
  include ('includes/admin_content.php');
  include ('../../includes/session.php');
  $total_student=total_student();
  $total_employee=total_employee();
  $total_users=$total_employee+$total_student;

  $total_vacant=total_vacant();
  $total_filled=total_filled();
  $total_sessions=$total_vacant+$total_filled;

  $total_stud_report=stud_report();
  $total_reported=$total_stud_report;
  // $total_emp_report=emp_report();
  // $total_reported=$total_stud_report+$total_emp_report;
  

  $feedbacks=feedback();
?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <h1>Admin Dashboard</h1>
    <label for="total_users">Total Users:</label> <?php echo $total_users ?><br>
    <label for="total_stud">Students:</label> <?php echo $total_student ?><br>
    <label for="total_emp">Employees:</label> <?php echo $total_employee ?><br><br>

    <label for="total_session">Total Sessions:</label> <?php echo $total_sessions ?><br>
    <label for="total_vacant">Vacant:</label> <?php echo $total_vacant ?><br>
    <label for="total_filled">Filled:</label> <?php echo $total_filled ?><br><br>

    <label for="total_report">Total Reports:</label> <?php echo $total_reported ?><br>
    <label for="total_stud_report">Student:</label> <?php echo $total_stud_report ?><br>
    <!-- <label for="total_emp_report">Employee:</label> <?php echo $total_emp_report ?><br><br> -->

    <label for="feedbacks">Feedbacks:</label> <?php echo $feedbacks ?><br><br>
    <?php show_subjects();
          echo '<br><br>';
          show_departments();
          echo '<br><br>';
          echo "<h3>Latest Sessions</h3>";
          show_enrollees();
     ?>
     <br><br>
    <button onclick="event.preventDefault(); window.location.href='manageEmpAcc.php';">Manage Staff Accounts</button>
    <button onclick="event.preventDefault(); window.location.href='manageStudAcc.php';">Manage Student Accounts</button>
    <button onclick="event.preventDefault(); window.location.href='manageDept.php';">Manage Departments</button>
    <button onclick="event.preventDefault(); window.location.href='manageSubjects.php';">Manage Subjects</button>
    <button onclick="event.preventDefault(); window.location.href='logout.php';">Log out</button>
  </body>
</html>