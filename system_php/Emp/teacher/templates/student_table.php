<?php

// Handle POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Handle form submissions based on the action parameter
	if(isset($_POST["action"])){
		//CREATE
		if ($_POST["action"] == "create") { 
				create($conn, $ID); //CREATE
		} elseif ($_POST["action"] == "update") { 
				update($conn); //UPDATE
		} elseif ($_POST["action"] == "delete") { 
				delete($conn); //DELETE
		} 
	}
}

?>
<?php if(isset($students)) {?>
<center class="mb-5">

    <form method="POST" action="index.php">
        <button type="submit" class="fw-bold mt-3 mb-0">Hide</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($students)) { ?>
            <tr>
                <td><?php echo $row["student_id"]; ?></td>
                <td><?php echo $row["student_name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["subject_name"]; ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="student_id" value="<?php echo $row["student_id"]; ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <h4>Add Student</h4>
                <form method="POST">
                    <input type="hidden" name="action" value="create">
                    <label>Name:</label>
                    <input type="text" name="student_name">
                    <label>Email:</label>
                    <input type="text" name="email">
                    <label>Subject:</label>
                    <select name="subject_id">
                        <?php
                $query = "SELECT * FROM subjects WHERE teacher_id = $ID;";
                $teacher_subjects = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($teacher_subjects)) {
                echo '<option value="' . $row["subject_id"] . '">' . $row["subject_name"] . '</option>';
                }
            ?>
                    </select>
                    <button type="submit">Create</button>
                </form>
            </tr>
            <tr>
                <h4>Update Student</h4>
                <form method="POST">
                    <input type="hidden" name="action" value="update">
                    <label>Student:</label>
                    <select name="student_id">
                        <?php
        $query = "SELECT * FROM students";
        $students = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($students)) {
          echo '<option value="' . $row["student_id"] . '">' . $row["student_name"] . '</option>';
        }
      ?>
                    </select>
                    <label>Name:</label>
                    <input type="text" name="student_name">
                    <label>Email:</label>
                    <input type="text" name="email">
                    <button type="submit">Update</button>
                </form>
            </tr>

        </tbody>
    </table>
</center>
<?php } ?>