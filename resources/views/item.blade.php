@extends('layouts.app')
@section('title', 'Show')

@section('content')

    <!-- ======= About Section ======= -->

    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>{{ $item->category->name }}</h2>
                <p>{{ $item->name }}</p>
            </div>

            <div class="row content" data-aos="fade-up">
                <div class="col-lg-6">
                    <p>
                        The website works to facilitate the rent of bikes and cars through the web site.
                        Bicycle's or car's owners can add their bikes or cars and add price of rent for each bikes or cars.
                        Our website provide this service (rent of bikes or cars) for users which will use our web site, each user before rent any bikes or cars will know all information about this bikes or cars which are (model of bikes or cars, price of rent/hour,
                    </p>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                         available or not, bicycle's owner name or car's owner name).
                        Our website provide this service for our users which users can search by area then our website will appear all available cars or bikes to rent.
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
@endsection
