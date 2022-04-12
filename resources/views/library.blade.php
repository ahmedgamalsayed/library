@extends('layouts.app')
@section('title', 'Search')

@section('content')

    <section id="category" class="about">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Library</h2>
                <p>{{ ($library->name ?? '') }}</p>
            </div>

            <div class="row content">
                @foreach($library->books as $book)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-car2">
                        <a href="{{ route('books.show', $book->id) }}">
                            <div class="portfolio-img">
                                <img src="{{ $book->image }}" class="img-fluid" alt="">
                            </div>
                            <div class="portfolio-info">
                                <h4>{{ $book->name }}</h4>
                                <p>{{ \Illuminate\Support\Str::limit($book->description_en, 50) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End About Section -->
@endsection
