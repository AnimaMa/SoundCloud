@extends('_layout')
@section('content')

    <table class="album-table ">
        <tr>
            <th class=" ">Name</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Delete the album</th>
            <th>Edit the album</th>
        </tr>
        @foreach($authors as $author)

            <tr>
                <td>
                    <a href="{{ url('authors/'.$author->id) }}" class="album-name">
                        {{ $author->name }}
                    </a>
                </td>

                <td>
                    {{ $author->description }}
                </td>

                <td>
                    <img class="img-db" src="{{ $author->photo}}" alt="">
                </td>


                <td>
                    <a href="{{ url("authors/$author->id/delete") }}" class="delete"> &#x2718;</a>
                </td>

                <td>
                    <a href="{{ url("authors/$author->id/edit") }}" class="edit"> edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection