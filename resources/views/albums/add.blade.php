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
            <label for="cover">Cover of album</label>
            <input name="cover" type="file" class="form-control" id="cover" placeholder="cover">
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="name" value="">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
           Vyber autora: @include('partials.select-authors')
        </div>
        <br>
        <div class="form-group">
            alebo vytvor noveho:
            <input name="author" type="text" class="form-control" id="author" placeholder="author">
            <br>
            <br>
            <label for="photo">Photo of author</label>
            <input name="photo" type="file" class="form-control" id="photo" placeholder="photo">
            <br>
            <br>
            <label for="description">Description</label>
            <input name="description" type="text" class="form-control" id="description" placeholder="description">
        </div>
        <br>


        <div class="form-group">
            <label for="producer">Producer</label>
            <input name="producer" type="text" class="form-control" id="producer" placeholder="producer">
        </div>

        <div class="form-group">
            <label for="genres">Genres</label>
            <input name="genres" type="text" class="form-control" id="genres" placeholder="genres">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <input name="type" type="text" class="form-control" id="type" placeholder="type">
        </div>

        <div class="form-group">
            <label for="amount_songs">Amount songs</label>
            <input name="amount_songs" type="text" class="form-control" id="amount-songs" placeholder="amount songs">
        </div>

        <div class="form-group">
            <label for="released">Released</label>
            <input name="released" type="text" class="form-released" id="title" placeholder="released">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-default">Publish</button>

        </div>

        <div class="form-group">
            <label for="song">Photo of author</label>
            <input name="song" type="file" class="form-control" id="song" placeholder="song">

        </div>
    </form>

@endsection