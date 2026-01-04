<?php

class Student
{
    private $db;

    // Dependency injection of mysqli connection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Retrieve all students
    public function all()
    {
        $result = $this->db->query("SELECT * FROM students");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Retrieve a single student by ID
    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_assoc();
    }

    // Insert a new student
    public function create($name, $email, $course)
    {
        $stmt = $this->db->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $course);
        return $stmt->execute();
    }

    // Update an existing student
    public function update($id, $name, $email, $course)
    {
        $stmt = $this->db->prepare("UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $email, $course, $id);
        return $stmt->execute();
    }

    // Remove a student record
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
