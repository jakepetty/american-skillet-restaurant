@extends('layouts.backend')
@section('content')
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Caption</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menu_items as $menu_item)
        <tr>
            <td>{{ $menu_item->id }}</td>
            <td>{{ $menu_item->name }}</td>
            <td>{{ $menu_item->category->name }}</td>
            <td>{{ $menu_item->caption }}</td>
            <td>{{ $menu_item->price }}</td>
            <td>
                <form class="form-inline float-right" action="{{ route('menu_items.destroy', $menu_item->id) }}"
                    method="POST" onsubmit="return confirm('Are you sure you want to remove {{ $menu_item->name }}')">
                    @csrf @method('DELETE')
                    <div class="btn-group">
                        <a class="btn btn-outline-dark btn-sm" href="{{ route('menu_items.edit', $menu_item->id) }}">
                            <i class="fas fa-edit"></i>
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
<a href="{{ route('menu_items.create') }}" class="btn btn-outline-dark">Add</a>
@endsection
