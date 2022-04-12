@extends('templates.admin_layout')
@section('title', 'Edit Library')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Library</h1>
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
                                <h3 class="card-title">Edit a New Library</h3>
                            </div>
                            @include('templates.errors')
                            <form role="form" action="{{ route('admin.libraries.update', $library->id) }}" method="post">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="card-body col-6">
                                    <div class="form-group">
                                        <label for="name_en">Name</label>
                                        <input type="text" id="name_en" class="form-control"
                                               placeholder="Enter Library Name" name="name_en"
                                               value="{{ $library->name_en}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en">Description</label>
                                        <textarea id="description_en" class="form-control"
                                                  placeholder="Enter Library Email" name="description_en" required>
                                            {{$library->description_en}}
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="librarian_id">Librarian</label>
                                        <select class="form-control" id="librarian_id"
                                                name="librarian_id"
                                                required>
                                            @foreach($librarians as $librarian)
                                                @if ($librarian->id == $library->librarian_id)
                                                    <option value="{{ $librarian->id }}" selected>{{ $librarian->name }}</option>
                                                    @continue
                                                @endif
                                                <option value="{{ $librarian->id }}">{{ $librarian->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success btn-block">Edit Library</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

