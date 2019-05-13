@extends('layouts.backend')
@section('content')
<form method="post" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="event-image">Image</label>
        <input id="event-image" class="form-control" name="image" type="file">
    </div>
    <div class="form-group">
        <label for="event-name">Name</label>
        <input id="event-name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" name="name" type="text" value="{{ old('name', $event->name) }}">
        @if($errors->has('name'))
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="event-caption">Caption</label>
        <textarea id="event-caption" class="form-control {{ $errors->has('caption') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" name="caption">{{ old('caption', $event->caption) }}</textarea>
        @if($errors->has('caption'))
        <div class="invalid-feedback">{{ $errors->first('caption') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="event-start-time">Start Time</label>
        <input id="event-start-time" class="form-control {{ $errors->has('start_time') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" name="start_time" type="time" value="{{ old('start_time', $event->start_time) }}">
        @if($errors->has('start_time'))
        <div class="invalid-feedback">{{ $errors->first('start_time') }}</div>
        @endif
    </div>
    <button class="btn btn-primary mt-5" type="submit">Save</button>
</form>
@endsection
