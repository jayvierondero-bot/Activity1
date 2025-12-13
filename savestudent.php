<?php
include 'db.php';

$name = $_POST['student_name'];
$student_id = $_POST['student_id'];
$course = $_POST['course'];
$date = $_POST['enrollment_date'];

$sql = "INSERT INTO students (student_name, student_id, course, enrollment_date)
        VALUES ('$name', '$student_id', '$course', '$date')";

if (mysqli_query($conn, $sql)) {
    echo "Student record saved successfully! <br>";
    echo "<a href='add_student.php'>Add Another</a> | ";
    echo "<a href='list_students.php'>View Students</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
