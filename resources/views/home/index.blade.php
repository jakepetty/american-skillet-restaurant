@extends('layouts.frontend')
@section('content')
<div class="section parallax" id="hero" data-parallax="scroll" data-image-src="/img/hero-bg.jpg">
    <div class="middle">
        <div class="text-center">
            <p>Welcome to</p>
            <h1>{{ config('app.name') }}</h1>
            <a href="#menu" class="btn btn-outline-light">Our Menu</a>
        </div>
    </div>
</div>
<section id="welcome">
    <div class="container">
        <div class="row row-eq-height">
            <div class="col-md-6">
                <div class="text-center">
                    <header>
                        <p>Traditional Restaurant</p>
                        <h2>Welcome</h2>
                    </header>
                    <p>We've been serving mid-western style breakfast and lunch to the Cedar Rapids area since 1995</p>
                    <a href="{{ route('about') }}" class="btn btn-outline-dark">Our Story <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-none d-lg-block">
                    <div class="img-wrapper">
                        <img src="/img/photos/{{ $photo->id }}_l.{{ $photo->ext }}" alt="{{ $photo->seo_text }}" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="bar parallax" data-parallax="scroll" data-image-src="/img/discover-bg.jpg">
    <header>
        <p>Discover</p>
        <h2>{{ config('app.name') }}</h2>
    </header>
</div>
<section id="discovery">
    <div class="container">
        <header>
            <p>Discover</p>
            <h2>Our Menu</h2>
        </header>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 mt-4">
                        <div class="img-wrapper">
                            <img src="/img/menu_categories/{{ $menu_categories[0]->id }}_l.{{ $menu_categories[0]->ext }}" class="img-fluid" alt="" />
                            <a href="{{ route('menu.show', [$menu_categories[0]->id, $menu_categories[0]->seo_url]) }}" class="btn btn-light btn-lg">
                                {{ $menu_categories[0]->name }}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="img-wrapper">
                            <img src="/img/menu_categories/{{ $menu_categories[1]->id }}_l.{{ $menu_categories[1]->ext }}" class="img-fluid" alt="" />
                            <a href="{{ route('menu.show', [$menu_categories[1]->id, $menu_categories[1]->seo_url]) }}" class="btn btn-light btn-lg">
                                {{ $menu_categories[1]->name }}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="img-wrapper">
                            <img src="/img/menu_categories/{{ $menu_categories[2]->id }}_m.{{ $menu_categories[2]->ext }}" class="img-fluid" alt="" />
                            <a href="{{ route('menu.show', [$menu_categories[2]->id, $menu_categories[3]->seo_url]) }}" class="btn btn-light btn-lg">
                                {{ $menu_categories[2]->name }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="img-wrapper">
                            <img src="/img/menu_categories/{{ $menu_categories[3]->id }}_s.{{ $menu_categories[3]->ext }}" class="img-fluid" alt="" />
                            <a href="{{ route('menu.show', [$menu_categories[3]->id, $menu_categories[3]->seo_url]) }}" class="btn btn-light btn-lg">
                                {{ $menu_categories[3]->name }}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="img-wrapper">
                            <img src="/img/menu_categories/{{ $menu_categories[4]->id }}_s.{{ $menu_categories[4]->ext }}" class="img-fluid" alt="" />
                            <a href="{{ route('menu.show', [$menu_categories[4]->id, $menu_categories[4]->seo_url]) }}" class="btn btn-light btn-lg">
                                {{ $menu_categories[4]->name }}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="img-wrapper">
                            <img src="/img/menu_categories/{{ $menu_categories[5]->id }}_s.{{ $menu_categories[5]->ext }}" class="img-fluid" alt="" />
                            <a href="{{ route('menu.show', [$menu_categories[5]->id, $menu_categories[5]->seo_url]) }}" class="btn btn-light btn-lg">
                                {{ $menu_categories[5]->name }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="parallax" id="specials" data-image-src="/img/specials-bg.jpg">
    <div class="container">
        <header>
            <p>Upcoming</p>
            <h2>Specials</h2>
        </header>
        <div class="row">
            <div class="col-md-6 img" style="background-image: url('/img/events/{{ $event->id }}_l.{{ $event->ext }}')">
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
                <div class="d-none d-lg-block">
                    <div class="countdown row"
                        data-day="{{ $special['day'] }}"
                        data-month="{{ $special['month'] }}"
                        data-year="{{ $special['year'] }}"
                        data-hour="{{ $special['hour'] }}"
                        data-minute="{{ $special['minute'] }}"
                        data-second="{{ $special['second'] }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
