<?php
// Connect to the database
$servername = "localhost";
$_username = "root";
$_password = "";
$dbname = "testelearning_emp";
$conn = mysqli_connect($servername, $_username, $_password, $dbname);
// Query the database to get the options
$sql = "SELECT * FROM departments";
$result = mysqli_query($conn, $sql);

// Step 3: Create the select element and options
echo '<select name="department">';
echo '<option value="">Select Department</option>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'. $row['dept_name'] .'">' . $row['dept_name'] . '</option>';
}
echo '</select>';
?>