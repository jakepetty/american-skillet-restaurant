@extends('layouts.frontend')
@section('title')
Contact Us | {{ config('app.name') }}
@endsection
@section('content')

<section class="page-title parallax" data-parallax="scroll" data-image-src="/img/1556311252_breakfast.jpg">
    <div class="container">
        <h1>Contact Us</h1>
    </div>
</section>
<section id="map">
    <div class="container">
        <div class="wrapper">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2966.467252460409!2d-91.7352350842436!3d41.968776767713216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87e4f96a5e51af25%3A0xb75e6d227fc00a7a!2sAmerican+Skillet!5e0!3m2!1sen!2sus!4v1557516957742!5m2!1sen!2sus"
                allowfullscreen></iframe>
        </div>
    </div>
</section>
<section id="contact">
    <div class="container">
        <header>
            <h3>Send us a message</h3>
        </header>
        <form method="POST" action="{{ route('contact.send') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="contact-name">Name</label>
                    <input id="contact-name" name="name"
                        class="form-control @error('name') is-invalid @elseif($errors->any()) is-valid @enderror"
                        placeholder="Enter your name" type="text">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="contact-email">Email</label>
                    <input id="contact-email" name="email"
                        class="form-control @error('email') is-invalid @elseif($errors->any()) is-valid @enderror"
                        placeholder="Enter your email address" type="text">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="contact-phone">Phone</label>
                    <input id="contact-phone" name="phone"
                        class="form-control @error('phone') is-invalid @elseif($errors->any()) is-valid @enderror"
                        placeholder="Enter your phone number eg. 319-555-5555" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="contact-body">Message</label>
                <textarea id="contact-body" name="body"
                    class="form-control @error('body') is-invalid @elseif($errors->any()) is-valid @enderror" rows="3"
                    placeholder="Type your message..."></textarea>
                @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center mt-5">
                <button class="btn btn-outline-dark btn-lg"><i class="fas fa-paper-plane"></i> Send Message</button>
            </div>
        </form>
    </div>
</section>
@endsection
