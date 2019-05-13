@extends('layouts.backend')
@section('content')
<form method="post" action="{{ route('employees.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="employee-image">Image</label>
        <input id="employee-image" class="form-control" name="image" type="file">
    </div>
    <div class="form-group">
        <label for="employee-name">Name</label>
        <input id="employee-name" class="form-control @error('name') is-invalid @enderror" name="name" type="text">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="employee-title">Title</label>
        <input id="employee-title" class="form-control @error('title') is-invalid @enderror" name="title" type="text">
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="employee-caption">Caption</label>
        <input id="employee-caption" class="form-control @error('caption') is-invalid @enderror" name="caption"
            type="text">
        @error('caption')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit">Create</button>
</form>
@endsection
