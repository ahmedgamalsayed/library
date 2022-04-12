@extends('layouts.app')
@section('title', 'Search')

@section('content')

    <section id="search" class="about">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Search</h2>
                <p>For: "{{ $search }}" {{ ucfirst($type) }}</p>
            </div>

            <div class="row">
                <form action="{{ route('search') }}" method="post" class="form-inline col-12 mb-5">
                    @csrf

                    <div class="col-4 form-group">
                        <input class="form-control w-100" type="text" placeholder="Enter Search Keyword" name="search">
                    </div>

                    <div class="col-4 form-group">
                        <select name="type" class="form-control w-100">
                            <option value="1">Book Name</option>
                            <option value="2">Library Name</option>
                        </select>
                    </div>

                    <div class="col-4 form-group">
                        <button type="submit" class="btn btn-success btn-block">
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <div class="row content">
                @foreach($books as $book)
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
