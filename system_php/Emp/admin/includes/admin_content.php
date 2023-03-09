<?php

	$host = "localhost";
    $_username = "root";
    $_password = "";

	function total_student(){
		global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM info";
		$result = mysqli_query($conn, $sql);
		return mysqli_num_rows($result);
	}

	function total_employee(){
		global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM info";
		$result = mysqli_query($conn, $sql);
		return mysqli_num_rows($result);
	}

	function total_vacant(){
		global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM sub_taken";
		$query= mysqli_query($conn, $sql);
		$value=0;
		while($row = mysqli_fetch_assoc($query)){
			if (is_null($row['sub_prof'])){
				$value=$value+1;
			}
		}
		return $value;
	}

	function total_filled(){
		global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM sub_taken";
		$query= mysqli_query($conn, $sql);
		$value=0;
		while($row = mysqli_fetch_assoc($query)){
			if (!is_null($row['sub_prof'])){
				$value=$value+1;
			}
		}
		return $value;
	}

	function stud_report(){
		global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM report_stud";
		$result = mysqli_query($conn, $sql);
		return mysqli_num_rows($result);
	}

	function emp_report(){
		global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM report_emp";
		$result = mysqli_query($conn, $sql);
		return mysqli_num_rows($result);
	}

	function feedback(){
		global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM feedback";
		$result = mysqli_query($conn, $sql);
		return mysqli_num_rows($result);
	}

	function show_subjects(){
		global $host, $_username, $_password;
        $database = "testelearning_subjects";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM subjects";
        $query= mysqli_query($conn, $sql);

        $database2 = "testelearning_stud";
        $conn2 = new mysqli($host, $_username, $_password, $database2);
        echo '<table>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th> Subject Name </th>';
                    echo '<th> Number of Students </th>';
                    echo '<th> Action </th>';
                echo '</tr>';
            echo '</thead>';
        echo '<tbody>';

        while($row = mysqli_fetch_assoc($query)){
        	$subject = $row['subject_name'];
        	$sql = "SELECT * FROM sub_taken WHERE subj_name = '$subject'";
        	$query2 = mysqli_query($conn2, $sql);
        	$number = mysqli_num_rows($query2);
            echo '<tr>';
                echo '<td>' . $row['subject_name'] . '</td>';
                echo '<td>' . $number . '</td>';
                echo '<td><a href="../admin/view_subjects.php?subj_name=' . $row['subject_name'] . '">View</a></td>';    
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
	}

	function show_subjects_info($subj_name){
		global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM sub_taken WHERE subj_name = '$subj_name'";
        $query= mysqli_query($conn, $sql);
        echo '<table>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th> Student Name </th>';
                    echo '<th> Status </th>';
                    echo '<th> Grade </th>';
                    echo '<th> Prof Name </th>';
                echo '</tr>';
            echo '</thead>';
        echo '<tbody>';

        while($row = mysqli_fetch_assoc($query)){
        	$stud_id=$row['stud_id'];
        	$emp_id=$row['sub_prof'];

        	$stud_name=mysqli_fetch_assoc(mysqli_query(new mysqli('localhost', 'root', '', 'testelearning_stud'), "SELECT name from info WHERE ID = '$stud_id'"));
        	if (is_null($emp_id)){
        		$emp_name['name']="No assigned professor";
        	}
        	else{
        		$emp_name=mysqli_fetch_assoc(mysqli_query(new mysqli('localhost', 'root', '', 'testelearning_emp'), "SELECT name from info WHERE ID = '$emp_id'"));
        	}
            echo '<tr>';
                echo '<td>' . $stud_name['name'] . '</td>';
                if ($row['status']==0){
                	echo '<td> Ongoing </td>';
                	echo '<td>Not yet released</td>';
                }
                elseif ($row['status']==1){
                	echo '<td> Passed </td>';
                	echo '<td>' . $row['grade'] . '</td>';
                }
                elseif ($row['status']==2){
                	echo '<td> Failed </td>';
                	echo '<td>' . $row['grade'] . '</td>';
                }
                elseif ($row['status']==3){
                	echo '<td> Dropped </td>';
                	echo '<td> No Grade </td>';
                }
                echo '<td>' . $emp_name['name'] . '</td>';
                
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
	}

	function show_departments(){
		global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM departments";
        $query= mysqli_query($conn, $sql);
        echo '<table>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th> Department Name </th>';
                    echo '<th> Number of Employees </th>';
                    echo '<th> Action </th>';
                echo '</tr>';
            echo '</thead>';
        echo '<tbody>';

        while($row = mysqli_fetch_assoc($query)){
        	$dept = $row['dept_code'];
        	$sql = "SELECT * FROM info WHERE department = '$dept'";
        	$query2 = mysqli_query($conn, $sql);
        	$number = mysqli_num_rows($query2);
            echo '<tr>';
                echo '<td>' . $row['dept_name'] . '</td>';
                echo '<td>' . $number . '</td>';
                echo '<td><a href="../admin/view_departments.php?dept_code=' . $row['dept_code'] . '">View</a></td>';    
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
	}

	function show_departments_info($dept_code){
		global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM info WHERE department = '$dept_code'";
        $query= mysqli_query($conn, $sql);
        $disp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM departments WHERE dept_code = '$dept_code'"));
        echo '<h1>' . $disp['dept_name'] . '</h1>';	
        echo '<table>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th> Employee Name </th>';
                    echo '<th> Workloads </th>';
                echo '</tr>';
            echo '</thead>';
        echo '<tbody>';

        while($row = mysqli_fetch_assoc($query)){

            echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td> Not Available</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
	}

	function show_enrollees(){
		global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM sub_taken";
        $query= mysqli_query($conn, $sql);
        echo '<table>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th> Student Name </th>';
                    echo '<th> Subject </th>';
                    echo '<th> Action </th>';
                echo '</tr>';
            echo '</thead>';
        echo '<tbody>';

        while($row = mysqli_fetch_assoc($query)){
        	$stud_id = $row['stud_id'];
        	$sql = "SELECT * FROM info WHERE ID = '$stud_id'";
        	$query2 = mysqli_query($conn, $sql);
        	$name = mysqli_fetch_assoc($query2);
            echo '<tr>';
                if ($row['status']==0){
                	echo '<td>' . $name['name'] . '</td>';
              		echo '<td>' . $row['subj_name'] . '</td>';
                	if (is_null($row['sub_prof'])){
	                	echo '<td> Vacant </td>';
	                }
	                else{
	                	echo '<td> Filled </td>';
	                }
	                echo '<td><a href="../admin/assign_prof.php?stud_id=' . $row['stud_id'] . '&sub_name=' . $row['subj_name'] .'">Assign</a></td>';  
                }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
	}

    function save_assign($stud_id, $subj_name, $prof_id){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "INSERT INTO subj_assigned (emp_id, subj_name, stud_id) VALUES ('$prof_id', '$subj_name', '$stud_id')";
        $query= mysqli_query($conn, $sql);
    }

    function update_sub_prof($stud_id, $subj_name, $prof_id){
        global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "UPDATE `sub_taken` SET `sub_prof` = '$prof_id' WHERE `sub_taken`.`stud_id` = '$stud_id' AND `sub_taken`.`subj_name` = '$subj_name'";
        $query= mysqli_query($conn, $sql);
    }

?>