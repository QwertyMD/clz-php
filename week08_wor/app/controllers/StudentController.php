<?php

require_once __DIR__ . '/../models/Student.php';

class StudentController
{
    private $student;
    private $blade;

    // Dependency injection of Student model and Blade instance
    public function __construct($db, $blade)
    {
        $this->student = new Student($db);
        $this->blade = $blade;
    }

    // Display all students
    public function index()
    {
        $students = $this->student->all();
        echo $this->blade->make('layouts.index', ['students' => $students])->render();
    }

    // Show form for adding a new student
    public function create()
    {
        echo $this->blade->make('layouts.create')->render();
    }

    // Process form submission for adding a student
    public function store()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $course = $_POST['course'] ?? '';
        $this->student->create($name, $email, $course);
        header('Location: /week08_wor/public/?action=index');
        exit;
    }

    // Show form for editing an existing student
    public function edit($id)
    {
        $student = $this->student->find($id);
        echo $this->blade->make('layouts.edit', ['student' => $student])->render();
    }

    // Process form submission for updating a student
    public function update($id)
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $course = $_POST['course'] ?? '';
        $this->student->update($id, $name, $email, $course);
        header('Location: /week08_wor/public/?action=index');
        exit;
    }

    // Remove a student record
    public function delete($id)
    {
        $this->student->delete($id);
        header('Location: /week08_wor/public/?action=index');
        exit;
    }
}
