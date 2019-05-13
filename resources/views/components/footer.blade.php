<footer>
    <div class="footer-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Contact Us</h4>
                    <div class="wrapper">
                        <div class="phone">
                            <i class="fas fa-phone"></i> <a href="tel:{{ config('app.business.phone.raw') }}">{{ config('app.business.phone.formatted') }}</a>
                        </div>
                        <div class="fax">
                            <i class="fas fa-fax"></i> <a href="fax:{{ config('app.business.fax.raw') }}">{{ config('app.business.fax.formatted') }}</a>
                        </div>
                        <div class="address">
                            <i class="fas fa-map-marker"></i> {{ config('app.business.address') }}
                        </div>
                        <div class="email">
                            <i class="fas fa-at"></i> <a href="{{ route('contact') }}">Send us an email</a>
                        </div>
                    </div>
                    <h4>Hours of Operation</h4>
                    <div class="wrapper">
                        <div class="hours">7:00 AM - 2:00 PM<br>Everyday</div>
                    </div>
                </div>
                <div class="col-md-4 twitter">
                    <h4>Latest Twitter</h4>
                    <div class="wrapper">
                        @foreach(\App\Classes\TwitterClass::feed(config('app.social.twitter.username'), 2) as $tweet)
                        <div class="tweet">
                            <div class="author">
                                <i class="fab fa-twitter"></i> <a
                                    href="https://twitter.com/{{ config('app.social.twitter.username') }}"
                                    target="_blank">{{ config('app.social.twitter.username') }}</a>
                            </div>
                            <div class="text">{{ $tweet["text"] }}</div>
                            <div class="date">{{ $tweet["date"] }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-none d-lg-block">
                        <h4>Gallery</h4>
                        <div class="gallery">
                            @foreach(\App\Photo::orderBy('order', 'ASC')->limit(9)->get() as $i => $photo)
                            <div class="col mb-4">
                                <a href="/img/photos/{{ $photo->id }}_xl.{{ $photo->ext }}" data-toggle="lightbox"
                                    data-gallery="gallery">
                                    <img src="/img/photos/{{ $photo->id }}_s.{{ $photo->ext }}" class="img-fluid"
                                        alt="{{ $photo->seo_text }}" />
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="social-copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="social">
                        <a href="https://facebook.com/{{ config('app.social.facebook.username') }}" target="_blank" class="fab fa-facebook"></a>
                        <a href="https://twitter.com/{{ config('app.social.twitter.username') }}" target="_blank" class="fab fa-twitter"></a>
                        <a href="https://instagram.com/{{ config('app.social.instagram.username') }}" target="_blank" class="fab fa-instagram"></a>
                    </div>
                </div>
                <div class="col-sm-6 copyright">
                    <div>
                        &copy; {{ date('Y') }} American Skillet.
                    </div>
                    <div class="designer">Design by <a href="https://vexcon.net" target="_blank">Jake Petty</a></div>
                </div>
            </div>
        </div>
    </div>
</footer>
