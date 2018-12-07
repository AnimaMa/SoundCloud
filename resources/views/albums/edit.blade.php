@extends('_layout')
@section('content')
    <table class="album-table ">
        @include('albums.th_table')

        <tr>
            <td>
                {{ $album->name }}
            </td>

            <td>
                                <a href="{{ url('authors/'.$album->author->id) }}">{{ $album->author->name }}</a>
            </td>

            <td>
                {{ $album->producer }}</td>
            <td>
                <a href=" {{ url($album->genres) }}"> {{ $album->genres }}</a>
            </td>

            <td>
                {{ $album->type }}
            </td>

            <td>
                {{ $album->amount_songs }}
            </td>

            <td>
                {{ $album->released }}
            </td>

            <td>
                <img class="img-db" src="{{ url( $album->cover ) }}" alt="">
            </td>

            <td>
                <a href="{{ url("albums/$album->id/delete") }}" class="delete"> &#x2718;</a>
            </td>
            <td>
                <a href="{{ url("albums/$album->id/edit") }}" class="edit"> edit</a>
            </td>
        </tr>

    </table>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/albums/edit" enctype="multipart/form-data">

        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        <input name="id" type="hidden" value="{{ $album->id }}">
        <hr>

        <div class="form-group">
            <label for="cover">Cover of album</label>
            <input name="cover" type="file" class="form-control" id="cover" placeholder=" cover"
                   value="{{$album->cover}}">
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="name"
                   value=" {{ $album->name }}">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            @include('partials.select-authors')
        </div>

        <div class="form-group">
            alebo vytvor noveho:
            <input name="author" type="text" class="form-control" id="author" placeholder="author"  value="">
            <br>
            <br>
            <label for="photo">Photo of author</label>
            <input name="photo" type="file" class="form-control" id="photo" placeholder="photo">
            <br>
            <br>
            <label for="description">Description</label>
            <input name="description" type="text" class="form-control" id="description" placeholder="description"value=" {{ $album->author->description}}">
        </div>
        <br>

        <div class="form-group">
            <label for="producer">Producer</label>
            <input name="producer" type="text" class="form-control" id="producer" placeholder="producer"
                   value="{{ $album->producer }}">
        </div>

        <div class="form-group">
            <label for="genres">Genres</label>
            <input name="genres" type="text" class="form-control" id="genres" placeholder="genres"
                   value="{{ $album->genres }}">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <input name="type" type="text" class="form-control" id="type" placeholder="type" value="{{ $album->type }}">
        </div>

        <div class="form-group">
            <label for="amount_songs">Amount songs</label>
            <input name="amount_songs" type="text" class="form-control" id="amount-songs" placeholder="amount songs"
                   value=" {{ $album->amount_songs }}">
        </div>

        <div class="form-group">
            <label for="released">Released</label>
            <input name="released" type="text" class="form-released" id="title" placeholder="released"
                   value=" {{ $album->released }}">
        </div>


        <div class="form-group">
            <button type="submit">Publish</button>

        </div>
    </form>
@endsection