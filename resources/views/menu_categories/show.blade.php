@extends('layouts.frontend')
@section('title')
{{ $menu_category->name }} Menu | {{ config('app.name') }}
@endsection
@section('content')
<section class="page-title parallax" data-parallax="scroll"
    data-image-src="/img/menu_categories/{{ $menu_category->id }}_l.{{ $menu_category->ext }}">
    <div class="container">
        <h1>{{ $menu_category->name }} Menu</h1>
    </div>
</section>
<section id="menu-items">
    <div class="container">
        @foreach($menu_category->items as $item)
        <div div class="col-md-6">
            <p style="border-bottom: 2px dashed #eee;padding:10px 0;font-weight:bold;font-size: 1.2em">
                {{ $item->name }}<span class="float-right"> ${{ $item->price }}</span></p>
            <p class="pt-2 pb-2">{{ $item->caption }}</p>
        </div>
        @endforeach
    </div>
</section>
@endsection
