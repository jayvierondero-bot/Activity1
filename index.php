<?php
include 'databaseconnection.php';

// ADD STUDENT
if (isset($_POST['save'])) {
    $stmt = $conn->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['email'], $_POST['course']]);
    header("Location: index.php");
}

// FETCH STUDENTS
$students = $conn->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
</head>
<body>

<h2>Add Student</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="course" placeholder="Course" required><br><br>
    <button type="submit" name="save">Save</button>
</form>

<hr>

<h2>Student List</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($students as $student): ?>
    <tr>
        <td><?= $student['id'] ?></td>
        <td><?= $student['name'] ?></td>
        <td><?= $student['email'] ?></td>
        <td><?= $student['course'] ?></td>
        <td>
            <a href="edit.php?id=<?= $student['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $student['id'] ?>" onclick="return confirm('Delete this record?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
