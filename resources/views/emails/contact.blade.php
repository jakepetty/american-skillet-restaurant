@component('mail::message')
<p>{{ $body }}</p>
<p><strong>Phone Number:</strong> {{ $phone }}</p>
This message was sent from {{ config('app.url') }}
@endcomponent
