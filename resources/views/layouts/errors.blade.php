@if($errors->any())
    <div class="alert alert-danger text-center">
        @foreach($errors->all() as $error)
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p> {{$error}}</p>
        @endforeach
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger text-center">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p> {{session('error')}}</p>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success text-center">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p> {{session('success')}}</p>
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info text-center">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p> {{session('info')}}</p>
    </div>
@endif
