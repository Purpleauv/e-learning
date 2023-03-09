<?php

global $db_host, $db_host, $db_username, $db_password, $db_name, $conn;
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "testelearning_emp";
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

function create($conn, $teacher_id){
    $student_name = $_POST["student_name"];
    $email = $_POST["email"];
    $subject_id = $_POST["subject_id"];
    
    $query = "INSERT INTO students (student_name, email) VALUES ('$student_name', '$email')";
    mysqli_query($conn, $query);
    $student_id = mysqli_insert_id($conn);

    $query = "INSERT INTO enrollment (subject_id, student_id, teacher_id) VALUES ('$subject_id', '$student_id', '$teacher_id')"; 
    mysqli_query($conn, $query);

}

function update($conn){
    $student_id = $_POST["student_id"];
    $student_name = $_POST["student_name"];
    $email = $_POST["email"];
    $query = "UPDATE students SET student_name = '$student_name', email = '$email' WHERE student_id = $student_id";
    mysqli_query($conn, $query);
}

function delete($conn){
    $student_id = $_POST["student_id"];
    $query = "DELETE FROM enrollment WHERE student_id = $student_id";
    mysqli_query($conn, $query);

    $query = "DELETE FROM students WHERE student_id = $student_id";
    mysqli_query($conn, $query);
}

function get_students($conn,$teacher_id,$subject_id){
    $query = "SELECT students.student_id, students.student_name, students.email, subjects.subject_name, teachers.name 
                FROM students 
                JOIN enrollment ON students.student_id = enrollment.student_id 
                JOIN subjects ON enrollment.subject_id = subjects.subject_id 
                JOIN teachers ON subjects.teacher_id = teachers.teacher_id 
                WHERE subjects.teacher_id = $teacher_id AND subjects.subject_id = $subject_id";
    $result = mysqli_query($conn, $query);
    return $result;
}

function get_all($conn){
    // If no query parameters are provided, retrieve information for all students
    $query = "SELECT students.student_id, students.student_name, students.email, subjects.subject_name, teachers.name 
    FROM students 
    JOIN enrollment ON students.student_id = enrollment.student_id 
    JOIN subjects ON enrollment.subject_id = subjects.subject_id 
    JOIN teachers ON subjects.teacher_id = teachers.teacher_id ";
    $result = mysqli_query($conn, $query);
    return $result;
}

function get_subjects($conn, $teacher_id) {
    $query = "SELECT DISTINCT subject_name, subject_id
                FROM subjects 
                WHERE teacher_id = $teacher_id";
    $result = mysqli_query($conn, $query);
    return $result;
}

function get_teacher($conn, $teacher_id){
    $query = "SELECT *
                FROM teachers 
                WHERE teachers.teacher_id = $teacher_id";
    $result = mysqli_query($conn, $query);
    return $result;
}

function get_subject_name($conn, $subject_id){
    $query = "SELECT subjects.subject_name FROM subjects WHERE subjects.subject_id = $subject_id";
    $result = mysqli_query($conn, $query);
    return $result;
}
?>