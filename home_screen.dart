import 'package:flutter/material.dart';
import '../models/student.dart';
import 'dart:math';

class HomeScreen extends StatefulWidget {
  const HomeScreen({super.key});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  final List<Student> students = [];
  final TextEditingController nameController = TextEditingController();
  final TextEditingController courseController = TextEditingController();

  void addStudent() {
    setState(() {
      students.add(
        Student(
          id: Random().nextInt(10000).toString(),
          name: nameController.text,
          course: courseController.text,
        ),
      );
    });
    nameController.clear();
    courseController.clear();
    Navigator.pop(context);
  }

  void editStudent(Student student) {
    nameController.text = student.name;
    courseController.text = student.course;

    showDialog(
      context: context,
      builder: (_) => AlertDialog(
        title: const Text("Edit Student"),
        content: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            TextField(controller: nameController, decoration: const InputDecoration(labelText: "Name")),
            TextField(controller: courseController, decoration: const InputDecoration(labelText: "Course")),
          ],
        ),
        actions: [
          TextButton(
            onPressed: () {
              setState(() {
                student.name = nameController.text;
                student.course = courseController.text;
              });
              nameController.clear();
              courseController.clear();
              Navigator.pop(context);
            },
            child: const Text("Update"),
          ),
        ],
      ),
    );
  }

  void deleteStudent(Student student) {
    setState(() {
      students.remove(student);
    });
  }

  void showAddDialog() {
    showDialog(
      context: context,
      builder: (_) => AlertDialog(
        title: const Text("Add Student"),
        content: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            TextField(controller: nameController, decoration: const InputDecoration(labelText: "Name")),
            TextField(controller: courseController, decoration: const InputDecoration(labelText: "Course")),
          ],
        ),
        actions: [
          TextButton(onPressed: addStudent, child: const Text("Save")),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Student Records")),
      floatingActionButton: FloatingActionButton(
        onPressed: showAddDialog,
        child: const Icon(Icons.add),
      ),
      body: students.isEmpty
          ? const Center(child: Text("No student records found"))
          : ListView.builder(
              itemCount: students.length,
              itemBuilder: (_, index) {
                final student = students[index];
                return Card(
                  child: ListTile(
                    title: Text(student.name),
                    subtitle: Text(student.course),
                    trailing: Row(
                      mainAxisSize: MainAxisSize.min,
                      children: [
                        IconButton(
                          icon: const Icon(Icons.edit),
                          onPressed: () => editStudent(student),
                        ),
                        IconButton(
                          icon: const Icon(Icons.delete),
                          onPressed: () => deleteStudent(student),
                        ),
                      ],
                    ),
                  ),
                );
              },
            ),
    );
  }
}
