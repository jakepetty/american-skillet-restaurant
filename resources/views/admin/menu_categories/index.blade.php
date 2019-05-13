@extends('layouts.backend')
@section('content')
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menu_categories as $menu_category)
        <tr>
            <td>{{ $menu_category->id }}</td>
            <td>{{ $menu_category->name }}</td>
            <td>
                <form class="form-inline float-right" action="{{ route('menu_categories.destroy', $menu_category->id) }}"
                    method="POST" onsubmit="return confirm('Are you sure you want to remove {{ $menu_category->name }}')">
                    @csrf @method('DELETE')
                    <div class="btn-group">
                        <a class="btn btn-outline-dark btn-sm" href="{{ route('menu_categories.edit', $menu_category->id) }}"><i
                                class="fas fa-edit"></i>
                            {{ __('Edit') }}
                        </a>
                        <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i>
                            {{ __('Delete') }}
                        </button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('menu_categories.create') }}" class="btn btn-outline-dark">Add</a>
@endsection
