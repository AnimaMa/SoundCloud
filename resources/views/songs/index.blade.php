@extends('_layout')
@section('content')

    <table class="album-table ">
        <tr>
            <th class=" ">title</th>
            <th>Album</th>
            <th>Author</th>
            <th>Edit</th>
            <th>Song</th>

        </tr>
        @foreach($songs as $song)

            <tr>
                {{--<td>--}}
                {{--<a href="{{ url('authors/'.$author->id) }}" class="album-name">--}}
                {{--{{ $author->name }}--}}
                {{--</a>--}}
                {{--</td>--}}

                <td>
                    {{ $song->title }}
                </td>

                <td>
                    {{ $song->album_id }}
                </td>

                <td>
                    {{ $song->author_id }}
                    {{--{{ $album->author->id }}--}}

                </td>


                <td>
                <a> &#x2718;</a>
                {{--<a href="{{ url("authors/$author->id/delete") }}" class="delete"> &#x2718;</a>--}}
                </td>

                <td>
                <a > edit</a>
                {{--<a href="{{ url("authors/$author->id/edit") }}" class="edit"> edit</a>--}}
                </td>

                <td>
                    <audio controls>
                        <source src="{{ url( $song->song ) }}" type="audio/ogg">
                        <source src="{{ url( $song->song ) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </td>
            </tr>
        @endforeach
    </table>
@endsection