<?php
include('../../includes/session.php');
include('includes/db.php');
?>


<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <h1>Welcome, Teacher!</h1>
    <table>
        <tr>
            <td>
                <label for="approved_modules">Approved Modules</label> <?php echo "#" ?>
            </td>
        </tr>
        <tr>
            <td><label for="rejected_modules">Rejected Modules</label> <?php echo "#" ?></td>
        </tr>
        <tr>
            <td><label for="pending_modules">Pending Modules</label> <?php echo "#" ?></td>
        </tr>
    </table>

    <?php 
    // global $host, $_username, $_password;
    // $database = "testelearning_stud";
    // $conn = new mysqli($host, $_username, $_password, $database);
    // $sql ="SELECT * FROM info, sub_taken AS info.name, sub_taken.subj_name, sub_taken.grade, sub_taken.status";
    // $query= mysqli_query($conn, $sql);
    // echo '<table>';
    //     echo '<thead>';
    //         echo '<tr>';
    //             echo '<th> Student Name </th>';
    //             echo '<th> Subject </th>';
    //             echo '<th> Grade </th>';
    //             echo '<th> Status </th>';
    //         echo '</tr>';
    //     echo '</thead>';
    // echo '<tbody>';
    // while($row = mysqli_fetch_assoc($query)){
    //     echo '<tr>';
    //         echo '<td>' . $row['name'] . '</td>';
    //         echo '<td>' . $row['subj_name'] . '</td>';
    //         echo '<td>' . $row['grade'] . '</td>';
    //         echo '<td>' . $row['status'] . '</td>';
    //     echo '</tr>';
    // }
    // echo '</tbody>';
    // echo '</table>';

    // ?>
</body>

</html>