@extends('layouts.backend')
@section('content')
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Day</th>
            <th>Name</th>
            <th>Caption</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td><img src="/img/events/{{ $event->id }}_s.{{ $event->ext }}" /></td>
            <td>{{ $days[$event->id] }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->caption }}</td>
            <td class="text-right">
                <a class="btn btn-outline-dark btn-sm" href="{{ route('events.edit', $event->id) }}"><i
                        class="fas fa-edit"></i>
                    {{ __('Edit') }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
