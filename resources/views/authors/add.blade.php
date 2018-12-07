@extends('_layout')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="add" enctype="multipart/form-data">

        {{ csrf_field() }}
        <hr>

        <div class="form-group">
            <label for="photo">Photo of author</label>
            <input name="photo" type="file" class="form-control" id="photo" placeholder="photo">
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="name">
        </div>


        <div class="form-group">
            <label for="description">Description</label>
            <input name="description" type="text" class="form-control" id="description" placeholder="description">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-default">Publish</button>

        </div>
    </form>

@endsection