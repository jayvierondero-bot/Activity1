<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>

<h2>Enrolled Students</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Student ID</th>
        <th>Course</th>
        <th>Enrollment Date</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['student_name']; ?></td>
        <td><?= $row['student_id']; ?></td>
        <td><?= $row['course']; ?></td>
        <td><?= $row['enrollment_date']; ?></td>
    </tr>
    <?php } ?>
</table>

<br>
<a href="add_student.php">Add Student</a>

</body>
</html>
