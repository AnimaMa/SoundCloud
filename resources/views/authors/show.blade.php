@extends('_layout')
@section('content')

    <div class="show-author">

        <div class="top">
            <div class="left">
                <h2 class="h2"> {{ $author->name }}</h2>
                <p> {{ $author->description }}</p>
            </div>

            <div class="right">
                <img class="img-db" src="{{ url($author->photo)}}" alt="">
            </div>


        </div>
        <a href="{{ url("authors/$author->id/delete") }}" class="delete"> &#x2718;</a>

        <a href="{{ url("authors/$author->id/edit") }}" class="edit"> edit</a>

        <div class="bottom bottom-albums">

            <h2 class="h2">Albums by author <span>( {{count($albums)}} )</span></h2>
            <div class="albums">
                @foreach ($albums as $album)

                    <a class="album" href="{{ url("albums/$album->id") }}" style="background-image: url({{ url($album->cover)}})">
                        <span class="name">{{$album->name}}</span>
                        {{--<img class="img-db" src="{{ url($album->cover)}}" alt="">--}}

                    </a>



                @endforeach
            </div>


        </div>


        <div class="bottom bottom-songs">
            <h2 class="h2">Songs from author</h2>
            @foreach ($songs as $song)

                <div class="song">
                    <span class="title">{{ $song->title }}</span>

                    <audio controls>
                        <source src="{{ url( $song->song ) }}" type="audio/ogg">
                        <source src="{{ url( $song->song ) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>

            @endforeach

        </div>
    </div>
@endsection