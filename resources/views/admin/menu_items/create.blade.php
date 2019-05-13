@extends('layouts.backend')
@section('content')

<section class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('menu_items.index') }}">{{ __('Menu Items') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('New item') }}</li>
            </ol>
        </nav>
        <h2>{{ __('Adding a new menu item') }}</h2>
        <hr>
        <form action="{{ route('menu_items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="menu-item-name">{{ __('Name') }}</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="menu-item-name" name="name" value="{{ old('name') }}" placeholder="{{ __('Name of the item') }}"  required>
                @if($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="menu-item-category">{{ __('Category') }}</label>
                <select class="form-control {{ $errors->has('category_id') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="menu-item-category" name="category_id" placeholder="{{ __('Caption for the item') }}"  required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : null }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="menu-item-caption">{{ __('Caption') }}</label>
                <input type="text" class="form-control {{ $errors->has('caption') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="menu-item-caption" name="caption" value="{{ old('caption') }}" placeholder="{{ __('Caption for the item') }}"  required>
                @if($errors->has('caption'))
                <div class="invalid-feedback">{{ $errors->first('caption') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="menu-item-price">{{ __('Price') }}</label>
                <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="menu-item-price" name="price" value="{{ old('price') }}" placeholder="{{ __('Price for the item') }}" step="any" required>
                @if($errors->has('price'))
                <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                @endif
            </div>
            <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('Create') }}</button>
        </form>
    </section>
@endsection
