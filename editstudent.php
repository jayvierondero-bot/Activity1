<?php
include 'db.php';

$id = $_GET['id'];

// FETCH STUDENT
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

// UPDATE STUDENT
if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE students SET name=?, email=?, course=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['email'], $_POST['course'], $id]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>
<form method="POST">
    <input type="text" name="name" value="<?= $student['name'] ?>" required><br><br>
    <input type="email" name="email" value="<?= $student['email'] ?>" required><br><br>
    <input type="text" name="course" value="<?= $student['course'] ?>" required><br><br>
    <button type="submit" name="update">Update</button>
</form>

</body>
</html>
