@extends('_layout')
@section('content')
    <div class="show-albums">
        <table class="album-table ">
            @include('albums.th_table')
            @foreach($albums as $album)

                <tr>
                    <td>
                        <a href="{{ url('albums/'.$album->id) }}" class="album-name">
                            {{ $album->name }} </a>

                    </td>

                    <td>
                        <a href="{{ url('authors/'.$album->author->id) }}">{{ $album->author->name }}</a>

                    </td>

                    <td>     {{ $album->producer }}</td>

                    <td>
                        <a href=" {{ url($album->genres) }}">
                            {{ $album->genres }}
                        </a>
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

                    <td class="img-db">
                        <img  src="{{ url( $album->cover ) }}" alt="">
                    </td>

                    <td>
                        <a href="{{ url("albums/$album->id/delete") }}" class="delete"> &#x2718;</a>
                    </td>
                    <td>
                        <a href="{{ url("albums/$album->id/edit") }}" class="edit"> edit</a>
                    </td>
                </tr>

            @endforeach

        </table>
    </div>

@endsection