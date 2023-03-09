<?php
  include ('includes/admin_content.php');
  $subj_name = $_GET['subj_name'];
?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <h1><?php echo $subj_name?></h1>
    <?php show_subjects_info($subj_name);
     ?>
    <button onclick="event.preventDefault(); window.location.href='admin_dashboard.php';">Return</button>
    
  </body>
</html>