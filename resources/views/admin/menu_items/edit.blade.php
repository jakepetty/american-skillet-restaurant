@extends('layouts.backend')
@section('content')

<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('menu_categories.index') }}">{{ __('Menu Categories') }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Updating a Category') }}</li>
        </ol>
    </nav>
    <h2>{{ __('Updating') }} {{ $menu_item->name }}</h2>
    <hr>
    <form action="{{ route('menu_items.update', $menu_item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project-image">{{ __('Image') }}</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <div class="form-group">
            <label for="menu-item-id">{{ __('Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @elseif($errors->any()) is-valid @enderror"
                id="menu-item-name" name="name" value="{{ old('name', $menu_item->name) }}"
                placeholder="{{ __('Name of the category') }}" required>
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="menu-item-price">{{ __('Price') }}</label>
            <input type="number"
                class="form-control @error('price') is-invalid @elseif($errors->any()) is-valid @enderror"
                id="menu-item-price" name="price" value="{{ old('price', $menu_item->price) }}"
                placeholder="{{ __('Name of the category') }}" required>
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="menu-item-caption">{{ __('Caption') }}</label>
            <textarea class="form-control @error('price') is-invalid @elseif($errors->any()) is-valid @enderror"
                id="menu-item-caption" name="caption" placeholder="{{ __('Caption for this menu item') }}"
                required>{{ old('caption', $menu_item->caption) }}</textarea>
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="menu-category-id">{{ __('Name') }}</label>
            <select id="menu-category-id" name="menu_category_id"
                class="form-control @error('menu_category_id') is-invalid @elseif($errors->any()) is-valid @enderror"
                required>
                <option value="">Select a Menu Category</option>
                @foreach($menu_item->category->get() as $category)
                <option value="{{ $category->id }}" @if($category->id == $menu_item->menu_category_id) selected
                    @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @if($errors->has('menu_category_id'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('Update') }}</button>
    </form>
</section>
@endsection
