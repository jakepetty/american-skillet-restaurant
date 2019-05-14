@extends('layouts.frontend')
@section('title')
Menu | {{ config('app.name') }}
@endsection
@section('content')
<section class="page-title parallax" data-parallax="scroll" data-image-src="/img/menu-bg.jpg">
    <div class="container">
        <h1>American Skillet Menu</h1>
    </div>
</section>

<div id="restaurant-menu">
    <section id="specials" style="background-color:#fafafa!important">
        <div class="container">
            <header>
                <p>Todays</p>
                <h2>Specials</h2>
            </header>
            <div class="row">
                <div class="col-md-6 img"
                    style="background-image: url('/img/events/{{ $event->id }}_l.{{ $event->ext }}')">
                    <div class="d-none d-lg-block">
                        <div class="datetime">
                            {{ $special['date'] }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center details">
                    <h4>
                        {{ $event->name }}
                    </h4>
                    <p>
                        {{ $event->caption }}
                    </p>
                    <div class=" d-none d-lg-block">
                        <div class="countdown row" data-day="{{ $special['day'] }}" data-month="{{ $special['month'] }}"
                            data-year="{{ $special['year'] }}" data-hour="{{ $special['hour'] }}"
                            data-minute="{{ $special['minute'] }}" data-second="{{ $special['second'] }}"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="menu-items">
        @foreach($menu_categories as $category)
        <div class="bar parallax mb-5" data-parallax="scroll"
            data-image-src="/img/menu_categories/{{ $category->id }}_l.{{ $category->ext }}">
            <header>
                <h2>{{ $category->name }} Menu</h2>
            </header>
        </div>
        <div class="container mb-5">
            @foreach($category->items as $item)
            <div div class="col-md-6">
                <p style="border-bottom: 2px dashed #eee;padding:10px 0;font-weight:bold;font-size: 1.2em">
                    {{ $item->name }}<span class="float-right"> ${{ $item->price }}</span></p>
                <p class="pt-2 pb-2">{{ $item->caption }}</p>
            </div>
            @endforeach
        </div>
        @endforeach
    </section>
</div>
@endsection
