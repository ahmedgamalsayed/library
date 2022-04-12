@extends('templates.admin_layout')
@section('title', 'Edit Librarian')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Librarian</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Edit a New Librarian</h3>
                            </div>
                            @include('templates.errors')
                            <form role="form" action="{{ route('admin.librarians.update', $user->id) }}" method="post">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="card-body col-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control"
                                               placeholder="Enter Librarian Name" name="name"
                                               value="{{$user->name}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control"
                                               placeholder="Enter Librarian Email" name="email"
                                               value="{{$user->email}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Librarian Password</label>
                                        <input type="password" class="form-control" id="password"
                                               placeholder="Librarian Password" name="password"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="confirm_password">Re-enter Librarian Password</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                               placeholder="Re-enter Librarian Password"
                                               name="password_confirmation" required>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success btn-block">Edit Librarian</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

