<?php
    $host = "localhost";
    $_username = "root";
    $_password = "";
    $database = "testelearning_stud";
    $conn = new mysqli($host, $_username, $_password, $database);

    $ID = $_GET['id'];
    $sql = "DELETE FROM `info` WHERE `info`.`ID` = '$ID'";
    $query = mysqli_query($conn, $sql);

    $database = "testelearning_login";
    $conn = new mysqli($host, $_username, $_password, $database);

    $ID = $_GET['id'];
    $sql = "DELETE FROM `login` WHERE `login`.`ID` = '$ID'";
    $query = mysqli_query($conn, $sql);

    header('Location: manageStudAcc.php');
?>