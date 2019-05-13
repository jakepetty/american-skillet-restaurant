@extends('layouts.backend')
@section('content')
<form method="post" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="form-group">
        <label for="employee-image">Image</label>
        <input id="employee-image" class="form-control" name="image" type="file">
    </div>
    <div class="form-group">
        <label for="employee-name">Name</label>
        <input id="employee-name" class="form-control" name="name" type="text" value="{{ old('name', $employee->name) }}">
    </div>
    <div class="form-group">
        <label for="employee-title">Title</label>
        <input id="employee-title" class="form-control" name="title" type="text" value="{{ old('title', $employee->title) }}">
    </div>
    <div class="form-group">
        <label for="employee-caption">Caption</label>
        <input id="employee-caption" class="form-control" name="caption" type="text" value="{{ old('caption', $employee->caption) }}">
    </div>
    <button class="btn btn-primary" type="submit">Create</button>
</form>
@endsection
