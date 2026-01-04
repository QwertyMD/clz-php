@extends('layouts.master')

@section('content')
<h2>Student List</h2>
<a href="/week08_wor/public/?action=create" class="btn">Add New Student</a>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student['name'] }}</td>
            <td>{{ $student['email'] }}</td>
            <td>{{ $student['course'] }}</td>
            <td>
                <a href="/week08_wor/public/?action=edit&id={{ $student['id'] }}" class="btn-secondary">Edit</a>
                <a href="/week08_wor/public/?action=delete&id={{ $student['id'] }}" class="btn-danger" onclick="return confirm('Delete this student?')">Delete</a>
            </td>
        </tr>
        @endforeach
        @if(count($students) === 0)
        <tr>
            <td colspan="4">No students found.</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection