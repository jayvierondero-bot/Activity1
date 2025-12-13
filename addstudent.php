<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

<h2>Add Student Record</h2>

<form method="POST" action="save_student.php">
    Name: <input type="text" name="student_name" required><br><br>
    Student ID: <input type="text" name="student_id" required><br><br>
    Course: <input type="text" name="course" required><br><br>
    Enrollment Date: <input type="date" name="enrollment_date" required><br><br>

    <button type="submit">Save Student</button>
</form>

<a href="list_students.php">View Students</a>

</body>
</html>
