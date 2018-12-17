@extends('_layout')
@section('content')
    <div class="wrap">
        <div class="show-album">

            <h1 class="h1"> {{ $album->name }}</h1>

            <div class="top">
                <div class="left">
                    <div class="cover">
                        <img class="img-db" src="{{ url( $album->cover ) }}" alt="">
                    </div>
                </div>

                <div class="right">
                    <span class="info">Author:
                       <span> <a href="{{ url('authors/'.$album->author->id) }}">{{ $album->author->name }}</a></span> </span>
                    <span class="info">Released: <span>{{ $album->released }}</span></span>
                    <span class="info">Producer: <span>{{ $album->producer }}</span></span>
                    <span class="info">Type of album: <span>{{ $album->type }}</span></span>
                    <span class="info">Genre: <span> <a
                                    href=" {{ url($album->genres) }}"> {{ $album->genres }}</a></span></span>
                    <span class="info">Amount of songs: <span>{{ count($songs) }}</span></span>


                </div>

            </div>
            <div class="bottom bottom-songs">
                <h2 class="h2">Songs from album</h2>


                @if(count( $songsFromThisAlbum)  > 0)
                    @foreach ($songsFromThisAlbum as $song)

                        <div class="song">
                            <span class="title">{{ $song->title }}</span>

                            <audio controls>
                                <source src="{{ url( $song->song ) }}" type="audio/ogg">
                                <source src="{{ url( $song->song ) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>

                    @endforeach
                @endif


            </div>


            <div class="bottom bottom-songs">
                <h2 class="h2">Other songs by this author</h2>

                @foreach($allSongsFromAuthor as $song)

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

            <div class="bottom bottom-songs">
                <h2 class="h2">Other albums</h2>

                @foreach($allAlbums as $album)
                    <a href="{{ url('albums/'.$album->id) }}" class="album">
                        <div class="left">
                            <div class="cover">
                                <img src="{{ url( $album->cover ) }}" alt="">
                            </div>
                        </div>

                        <span class="right">
                                        {{--<span class="h2">{{ $album->name }}</span>--}}
                            <span class="h2">  {{ str_limit($album->name, $limit = 12, $end = '...') }}</span>
                   <span class="details">
                     <span class="author" href="{{ url('authors/'.$album->author->id) }}">{{ $album->author->name }}</span>
                    <span class="date">  {{ $album->released }}</span>
                   </span>

                </span>


                    </a>

                @endforeach

            </div>


            <a href="{{ url("albums/$album->id/delete") }}" class="delete"> &#x2718;</a>
            <a href="{{ url("albums/$album->id/edit") }}" class="edit"> edit</a>


        </div>
    </div>

@endsection