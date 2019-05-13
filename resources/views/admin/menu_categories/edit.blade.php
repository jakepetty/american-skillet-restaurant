@extends('layouts.backend')
@section('content')

<section class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('menu_categories.index') }}">{{ __('Menu Categories') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Updating a Category') }}</li>
            </ol>
        </nav>
        <h2>{{ __('Updating') }} {{ $menu_category->name }}</h2>
        <hr>
        <form action="{{ route('menu_categories.update', $menu_category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="project-image">{{ __('Image') }}</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-group">
                <label for="menu-category-name">{{ __('Name') }}</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="menu-category-name" name="name" value="{{ old('name', $menu_category->name) }}" placeholder="{{ __('Name of the category') }}"  required>
                @if($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('Update') }}</button>
        </form>
    </section>
@endsection
