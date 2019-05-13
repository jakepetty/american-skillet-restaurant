@extends('layouts.backend')
@section('content')
<form method="post" action="{{ route('events.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="event-image">Image</label>
        <input id="event-image" class="form-control" name="image" type="file">
    </div>
    <div class="form-group">
        <label for="event-name">Name</label>
        <input id="event-name" class="form-control" name="name" type="text" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="event-caption">Caption</label>
        <textarea id="event-caption" class="form-control" name="caption">{{ old('caption') }}</textarea>
    </div>
    <div class="form-group">
        <label for="event-name">Name</label>
        <input id="event-name" class="form-control" name="name" type="date" value="{{ old('name') }}">
    </div>
    <div class="form-check">
        <input id="event-recurring" class="form-check-input" type="checkbox">
        <label for="event-recurring" class="form-check-label">Recurring?</label>
    </div>
    <button class="btn btn-primary mt-5" type="submit">Create</button>
</form>
@endsection
