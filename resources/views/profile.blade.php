@extends('layouts.app')
@section('title', 'Edit Profile')

@section('content')

    <!-- ======= About Section ======= -->

    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Profile</h2>
                <p>Edit Profile</p>
            </div>

            <div class="row content" data-aos="fade-up">
                <form action="{{ route('profile.edit') }}" method="post" class="">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control"
                               placeholder="Enter User Name" name="name"
                               value="{{ auth('users')->user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control"
                               placeholder="Enter User Email" name="email"
                               value="{{ auth('users')->user()->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" class="form-control" name="image">
                    </div>

                    <div class="form-group">
                        <label for="password">User Password</label>
                        <input type="password" class="form-control" id="password"
                               placeholder="User Password" name="password"
                               required>
                    </div>
                    <div class="form-group">
                        <label
                            for="confirm_password">Re-enter User Password</label>
                        <input type="password" class="form-control" id="confirm_password"
                               placeholder="Re-enter User Password"
                               name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section><!-- End About Section -->
@endsection
