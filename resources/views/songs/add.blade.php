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


        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="title" value="">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            Vyber autora: @include('partials.select-authors', ['isNew' => true])
        </div>

        <div class="form-group">
            <label for="author">Album</label>
            {{--Vyber autora: @include('partials.select-albums')--}}
{{--            <option value="{{ $album->author  }}">{{ $album->author  }}</option>--}}
        </div>
        <br>

        <br>

        <div class="form-group">
            <label for="song">Song</label>
            <input name="song" type="file" class="form-control" id="song" placeholder="song">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Publish</button>

        </div>

    </form>

@endsection