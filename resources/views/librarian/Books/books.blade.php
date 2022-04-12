@extends('templates.admin_layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Books</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title w-100">
                                     Books
                                    <span class="float-right">
                                        <a href="{{ route('librarian.books.create') }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-plus-circle"></i> Add Book
                                        </a>
                                    </span>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Library Name</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Control</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($books as $k=>$book)
                                        <tr>
                                            <td>{{ (++$k) }}</td>
                                            <td>{{ $book->name }}</td>
                                            <td>{{ $book->library->name }}</td>
                                            <td>{{ $book->price }}</td>
                                            <td>{{ $book->stock }}</td>
                                            <td>
                                                <a href="{{ route('librarian.books.edit', $book->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ route('librarian.books.destroy', $book->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@endsection
