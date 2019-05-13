@extends('layouts.frontend')
@section('title')
About Us | {{ config('app.name') }}
@endsection
@section('content')
<section class="page-title parallax" data-parallax="scroll" data-image-src="/img/1556311252_breakfast.jpg">
    <div class="container">
        <h1>About Us</h1>
    </div>
</section>
<section id="about">
    <div class="container">
        <header>
            <p>Traditional Restaurant</p>
            <h2>Our Story</h2>
        </header>
        <p>Lidia, Naim, and Tony Kassouf would like to welcome you to American Skillet's web page. We hope you find our
            site easy to navigate, and find answers to all of your questions. American Skillet is a small breakfast
            diner located on the SW side of Cedar Rapids on Johnson Ave., off of Edgewood Road. We first opened in 1994,
            and with a passionate commitment to the community, have been serving traditional Midwestern breakfast and
            lunch for over 12 years. </p>

        <p>For the many years that lead up to opening the doors, Lidia, then a homemaker, had envisioned a partnership
            with her son Tony. They sought inspiration from Tony's grandparents who owned a neighborhood restaurant, now
            owned by Tony's uncle George, called the Breakfast House. We will never forget our very first customer, who
            is still one of our loyal patrons, was also our second customer the very next day! We had worked 360 days
            out of the year, along with bringing in Tony's younger brother Eli to help bus tables. Lidia ran the
            prepping stations and prepared her famous homemade soups, while Tony cooked and waited tables.</p>

        <p>Because of demand from our NW side customers, the time came in 2005 to open an American Skillet on the other
            side of town. In the late 90's, Tony had also opened Tony's Grill in Iowa City, which was later destroyed by
            the great tornado of '96. Instead of revamping the grill, Lidia and Tony moved their work to the new
            location, and Tony's father Naim, then working in construction, took over the diner. And it wasn't long
            before American Skillet on the NW side soon evolved into an upscale restaurant and lounge called Cibo
            Fusion!</p>

        <p>Lidia's vision of working with her son came through, and since then, the family of American Skillet has
            continued to reinvent themselves and they have made substantial contributions to the local community, making
            it a priority to buy local and kept menu costs down. We greatly appreciate all of our loyal patrons
            throughout the years, and we look forward to meeting many more. For additional information, we invite you to
            contact Tony here or email: <strong>tony@cibofusion.com</strong></p>
    </div>
</section>
<section class="section parallax" style="height:35%" data-parallax="scroll"
    data-image-src="/img/1556311252_breakfast.jpg"></section>
<section id="staff">
    <div class="container">
        <header>
            <p>Meet Our</p>
            <h2>Team</h2>
        </header>
        <div class="row row-eq-height">
            @foreach($employees as $employee)
            <div class="col-md-4">
                <div class="member">
                    <div class="avatar">
                        <img src="/img/employees/{{ $employee->id }}_s.{{ $employee->ext }}" class="img-fluid">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <header>
                                <h4>{{ $employee->name }}</h4>
                                <div>{{ $employee->title }}</div>
                            </header>
                            <p>
                                {{ $employee->caption }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
