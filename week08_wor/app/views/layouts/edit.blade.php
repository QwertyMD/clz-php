@extends('layouts.master')

@section('content')
<h2>Edit Student</h2>
<form action="/week08_wor/public/?action=update&id={{ $student['id'] }}" method="post">
    <label>Name:</label>
    <input type="text" name="name" value="{{ $student['name'] }}" required>
    <label>Email:</label>
    <input type="email" name="email" value="{{ $student['email'] }}" required>
    <label>Course:</label>
    <input type="text" name="course" value="{{ $student['course'] }}" required>
    <button type="submit" class="btn">Update Student</button>
    <a href="/week08_wor/public/?action=index" class="btn-secondary">Cancel</a>
</form>
@endsection