<?php
  include ('includes/admin_content.php');
  $dept_code = $_GET['dept_code'];
?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php show_departments_info($dept_code);
     ?>
    <button onclick="event.preventDefault(); window.location.href='admin_dashboard.php';">Return</button>
    
  </body>
</html>