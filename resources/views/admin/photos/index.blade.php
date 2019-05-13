@extends('layouts.backend')
@section('content')
<div class="row mb-5 ui-sortable" data-url="{{ route('photos.reorder') }}">
@foreach($photos as $photo)
    <div class="col-md-4 sortable" data-id="{{ $photo->id }}">
        <div class="card">
            <img class="card-top-image img-fluid" src="/img/photos/{{ $photo->id }}_m.{{ $photo->ext }}">
            <div class="card-body">
                {{ $photo->caption }}
            </div>
            <div class="card-footer">
                <form class="form-inline float-right" action="{{ route('photos.destroy', $photo->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this photo?')">
                    @csrf @method('DELETE')
                    <div class="btn-group">
                        <a class="btn btn-outline-dark btn-sm" href="{{ route('photos.edit', $photo->id) }}">
                            <i class="fas fa-edit"></i>
                            {{ __('Edit') }}
                        </a>
                        <button class="btn btn-outline-dark btn-sm">
                            <i class="fas fa-times"></i>
                            {{ __('Delete') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
</div>
<a href="{{ route('photos.create') }}" class="btn btn-outline-dark">Add</a>
@endsection
