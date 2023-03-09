<?php
    $host = "localhost";
    $_username = "root";
    $_password = "";
    $database = "testelearning_login";
    $conn = new mysqli($host, $_username, $_password, $database);

    //login
    function login($username, $password){
        global $host, $_username, $_password;
        $database = "testelearning_login";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM login where username ='$username' AND password ='$password'";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        return array($query, $count);
    }
    //
    function login_optimized($username, $password, $conn){
        $query = "SELECT * FROM (
                        SELECT teacher_id,username,password,role FROM testelearning_emp.teachers
                        UNION
                        SELECT ID,username,password,role FROM testelearning_emp.info
                        UNION
                        SELECT ID,username,password,role FROM testelearning_stud.info
                    ) as union_tables
                WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        return mysqli_fetch_assoc($result);
    }

    function save_to_login($ID, $username, $password, $role){
        global $host, $_username, $_password;
        $database = "testelearning_login";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="INSERT INTO login (ID, username, password, role) VALUES ('$ID', '$username', '$password', '$role')";;
        $query= mysqli_query($conn, $sql);
        return $save=true;
    }
    function delete_from_login($ID){
        global $host, $username, $password;
        $database = "testelearning_login";
        $conn = new mysqli($host, $username, $password, $database);
        $sql ="DELETE FROM login WHERE `login`.`ID` = '$ID'";;
        $query= mysqli_query($conn, $sql);
        return $delete=true;
    }


    //stud
    
    function checkid_stud (){
        global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT ID FROM info ORDER BY ID DESC LIMIT 1";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $first_char = substr($row['ID'], 0, 1);
            $number = substr($row['ID'], 1);
            $number = (int) $number + 1;
            $new_string = $first_char . str_pad($number, 9, '0', STR_PAD_LEFT);
        } 
        return $new_string;
    }
    function save_to_stud($ID, $name, $email, $username, $password, $gender, $birthdate, $residency, $role, $img){
        global $host, $_username, $_password;
        $database = "testelearning_stud";
        $date=date('Y-m-d');
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="INSERT INTO info (ID, name, email, username, password, gender, birthdate, residency, role, pic, register_date) VALUES ('$ID', '$name', '$email', '$username', '$password', '$gender', '$birthdate', '$residency', '$role', '$img', '$date')";
        $query= mysqli_query($conn, $sql);
        return $save=true;
    }
    function delete_from_stud($ID){
        global $host, $username, $password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $username, $password, $database);
        $sql ="DELETE FROM info WHERE `info`.`ID` = '$ID'";;
        $query= mysqli_query($conn, $sql);
        return $delete=true;
    }
    function show_stud(){
        global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="SELECT * FROM info";
        $query= mysqli_query($conn, $sql);
        echo '<table>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th> ID </th>';
                    echo '<th> Name </th>';
                    echo '<th> email </th>';
                    echo '<th> username </th>';
                    echo '<th> gender </th>';
                    echo '<th> birthdate </th>';
                    echo '<th> residency </th>';
                    echo '<th> picture </th>';
                echo '</tr>';
            echo '</thead>';
        echo '<tbody>';
        while($row = mysqli_fetch_assoc($query)){
            echo '<tr>';
                echo '<td>' . $row['ID'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $row['gender'] . '</td>';
                echo '<td>' . $row['birthdate'] . '</td>';
                echo '<td>' . $row['residency'] . '</td>';
                echo '<td>' . $row['pic'] . '</td>';
                echo '<td><a href="../admin/editStudAcc.php?id=' . $row['ID'] . '">Edit</a> | <a href="../admin/deleteStudAcc.php?id=' . $row['ID'] . '">Delete</a></td>';    
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
    function edit_stud($ID){
        global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="SELECT * FROM info WHERE ID = '$ID'";
        $query= mysqli_query($conn, $sql);  
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    function update_stud($ID, $name, $email, $username, $password){
        global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql="UPDATE `info` SET `name` = '$name', `email` = '$email', `username` = '$username', `password` = '$password' WHERE `info`.`ID` = '$ID'";
        $query= mysqli_query($conn, $sql); 
        return $update=true;
    }

    //emp
    function checkid_emp(){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT ID FROM info ORDER BY ID DESC LIMIT 1";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $first_char = substr($row['ID'], 0, 1);
            $number = substr($row['ID'], 1);
            $number = (int) $number + 1;
            $new_string = $first_char . str_pad($number, 10, '0', STR_PAD_LEFT);
        } 
        return $new_string;
    }
    function save_to_emp($ID, $name, $email, $username, $password, $department, $role, $img){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="INSERT INTO info (ID, name, email, username, password, department, role, pic) VALUES ('$ID', '$name', '$email', '$username', '$password', '$department', '$role', '$img')";
        $query= mysqli_query($conn, $sql);
        return $save=true;
    }
    function delete_from_emp($ID){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="DELETE FROM info WHERE `info`.`ID` = '$ID'";;
        $query= mysqli_query($conn, $sql);
        return $delete=true;
    }
    function show_emp(){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="SELECT * FROM info";
        $query= mysqli_query($conn, $sql);
        echo '<table>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th> name </th>';
                    echo '<th> email </th>';
                    echo '<th> username </th>';
                    echo '<th> department </th>';
                echo '</tr>';
            echo '</thead>';
        echo '<tbody>';
        while($row = mysqli_fetch_assoc($query)){
            echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $row['department'] . '</td>';
                echo '<td><a href="../admin/editEmpAcc.php?id=' . $row['ID'] . '">Edit</a> | <a href="../admin/manageEmpAcc.php?id=' . $row['ID'] . '">Delete</a></td>';    
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
    function edit_emp($ID){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="SELECT * FROM info WHERE ID = '$ID'";
        $query= mysqli_query($conn, $sql);  
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    function update_emp($ID, $name, $email, $username, $password){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql="UPDATE `info` SET `name` = '$name', `email` = '$email', `username` = '$username', `password` = '$password' WHERE `info`.`ID` = '$ID'";
        $query= mysqli_query($conn, $sql); 
        return $update=true;
    }


    //dept
    function save_to_dept($dept_name, $dept_code){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="INSERT INTO departments (dept_name, dept_code) VALUES ('$dept_name', '$dept_code')";
        $query= mysqli_query($conn, $sql);
        return $save=true;
    }
    function delete_from_dept($ID){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="DELETE FROM departments WHERE `departments`.`ID` = '$ID'";;
        $query= mysqli_query($conn, $sql);
        return $delete=true;
    }
    function show_dept(){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="SELECT * FROM departments";
        $query= mysqli_query($conn, $sql);
        echo '<table>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th> Department Name </th>';
                    echo '<th> Department Code </th>';
                echo '</tr>';
            echo '</thead>';
        echo '<tbody>';
        while($row = mysqli_fetch_assoc($query)){
            echo '<tr>';
                echo '<td>' . $row['dept_name'] . '</td>';
                echo '<td>' . $row['dept_code'] . '</td>';
                echo '<td><a href="../admin/editDept.php?id=' . $row['ID'] . '">Edit</a> | <a href="../admin/manageDept.php?id=' . $row['ID'] . '">Delete</a></td>';    
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
    function edit_dept($ID){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="SELECT * FROM departments WHERE ID = '$ID'";
        $query= mysqli_query($conn, $sql);  
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    function update_dept($ID, $dept_name, $dept_code){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql="UPDATE `departments` SET `dept_name` = '$dept_name', `dept_code` = '$dept_code' WHERE `departments`.`ID` = '$ID'";
        $query= mysqli_query($conn, $sql); 
        return $update=true;

    }


    //sub
    function save_to_subjects($department, $subject_name, $subject_code, $subject_desc, $units, $fee, $pic){
        global $host, $_username, $_password;
        $database = "testelearning_subjects";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="INSERT INTO subjects (department, subject_name, subject_code, subject_desc, units, fee, pic) VALUES ('$department', '$subject_name', '$subject_code', '$subject_desc', '$units', '$fee', '$pic')";
        $query= mysqli_query($conn, $sql);
        return $save=true;
    }
    function delete_from_subjects($ID){
        global $host, $_username, $_password;
        $database = "testelearning_subjects";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="DELETE FROM subjects WHERE `subjects`.`ID` = '$ID'";;
        $query= mysqli_query($conn, $sql);
        return $delete=true;
    }
    function show_subjects(){
        global $host, $_username, $_password;
        $database = "testelearning_subjects";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="SELECT * FROM subjects";
        $query= mysqli_query($conn, $sql);
        echo '<table>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th> Department </th>';
                    echo '<th> Subject Name </th>';
                    echo '<th> Subject Code </th>';
                    echo '<th> Subject Description </th>';
                    echo '<th> Units </th>';
                    echo '<th> Fee </th>';
                    echo '<th> Picture </th>';
                echo '</tr>';
            echo '</thead>';
        echo '<tbody>';
        while($row = mysqli_fetch_assoc($query)){
            echo '<tr>';
                echo '<td>' . $row['department'] . '</td>';
                echo '<td>' . $row['subject_name'] . '</td>';
                echo '<td>' . $row['subject_code'] . '</td>';
                echo '<td>' . $row['subject_desc'] . '</td>';
                echo '<td>' . $row['units'] . '</td>';
                echo '<td>' . $row['fee'] . '</td>';
                echo '<td>' . $row['pic'] . '</td>';
                echo '<td><a href="../admin/editSubjects.php?id=' . $row['ID'] . '">Edit</a> | <a href="../admin/manageSubjects.php?id=' . $row['ID'] . '">Delete</a></td>';    
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
    function edit_subjects($ID){
        global $host, $_username, $_password;
        $database = "testelearning_subjects";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql ="SELECT * FROM subjects WHERE ID = '$ID'";
        $query= mysqli_query($conn, $sql);  
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    function update_subjects($ID, $department, $subject_name, $subject_code, $subject_desc, $units, $fee, $pic){
        global $host, $_username, $_password;
        $database = "testelearning_subjects";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql="UPDATE `subjects` SET `department` = '$department', `subject_name` = '$subject_name', `subject_code` = '$subject_code', `subject_desc` = '$subject_desc', `units` = '$units', `fee` = '$fee', `pic` = '$pic' WHERE `subjects`.`ID` = '$ID'";
        $query= mysqli_query($conn, $sql); 
        return $update=true;

    }
    function check_name_stud ($username, $email){
        global $host, $_username, $_password;
        $database = "testelearning_stud";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM info WHERE username='$username' OR email='$email'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }

    function check_subjects ($subject_name, $subject_code){
        global $host, $_username, $_password;
        $database = "testelearning_subjects";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM subjects WHERE subject_name='$subject_name' OR subject_code='$subject_code'";
        $query = mysqli_query($conn, $sql);
        return $query;

    }
    function check_emp ($username, $email){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM info WHERE username='$username' OR email='$email'";
        $query = mysqli_query($conn, $sql);
        return $query;

    }
    function check_dept ($dept_name, $dept_code){
        global $host, $_username, $_password;
        $database = "testelearning_emp";
        $conn = new mysqli($host, $_username, $_password, $database);
        $sql = "SELECT * FROM departments WHERE dept_name='$dept_name' OR dept_code='$dept_code'";
        $query = mysqli_query($conn, $sql);
        return $query;

    }
?>