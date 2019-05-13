@extends('layouts.backend')
@section('content')
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Title</th>
            <th>Caption</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="ui-sortable" data-url="{{ route('employees.reorder') }}">
        @foreach($employees as $employee)
        <tr class="sortable" data-id="{{ $employee->id }}">
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->title }}</td>
            <td>{{ $employee->caption }}</td>
            <td>
                <form class="form-inline float-right" action="{{ route('employees.destroy', $employee->id) }}"
                    method="POST" onsubmit="return confirm('Are you sure you want to remove {{ $employee->name }}')">
                    @csrf @method('DELETE')
                    <div class="btn-group">
                        <a class="btn btn-outline-dark btn-sm" href="{{ route('employees.edit', $employee->id) }}"><i
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
<a href="{{ route('employees.create') }}" class="btn btn-outline-dark">Add</a>
@endsection
