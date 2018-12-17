@extends('_layout')
@section('content')
<div class="wrap">

    <h2 class="h1 tac">All albums</h2>

    <div class="all-albums">
        @foreach($albums as $album)
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

</div>


@endsection