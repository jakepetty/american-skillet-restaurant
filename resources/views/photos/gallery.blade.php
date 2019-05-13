@extends('layouts.frontend')

@section('title')
Gallery | {{ config('app.name') }}
@endsection
@section('content')
<section class="page-title parallax" data-parallax="scroll" data-image-src="/img/1556311252_breakfast.jpg">
    <div class="container">
        <h1>Gallery</h1>
    </div>
</section>
<section id="gallery">
    <div class="container-fluid">
        <div class="row p-4">
            @foreach($photos as $photo)
            <div class="col-md-4 mb-4">
                <div class="wrapper">
                    <img src="/img/photos/{{ $photo->id }}_l.{{ $photo->ext }}" class="img-fluid" alt="{{ $photo->seo_text }}" />
                    <a href="/img/photos/{{ $photo->id }}_xl.{{ $photo->ext }}" data-toggle="lightbox" data-gallery="gallery" >
                        <i class="fas fa-search"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
