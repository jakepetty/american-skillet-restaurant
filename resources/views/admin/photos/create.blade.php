@extends('layouts.backend')
@section('content')

<section class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('photos.index') }}">{{ __('Photos') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('New Photo') }}</li>
            </ol>
        </nav>
        <h2>{{ __('Adding a new menu category') }}</h2>
        <hr>
        <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="photo-image">{{ __('Image') }}</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-group">
                <label for="photo-caption">{{ __('Caption') }}</label>
                <input type="text" class="form-control @error('caption') is-invalid @elseif($errors->any()) is-valid @enderror" id="photo-caption" name="caption" value="{{ old('caption') }}" placeholder="{{ __('Caption for the photo') }}">
                @error('caption')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo-seo-text">{{ __('SEO Text') }}</label>
                <input type="text" class="form-control @error('seo_text') is-invalid @elseif($errors->any()) is-valid @enderror" id="photo-seo-text" name="seo_text" value="{{ old('seo_text') }}" placeholder="{{ __('Describe this photo in detail') }}">
                @error('seo_text')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('Create') }}</button>
        </form>
    </section>
@endsection
