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
        {{--@foreach($authors as $author)--}}

            <tr>
                <td>
                    <p class="album-name">
                        {{ $author->name }}
                    </p>
                </td>

                <td>
                    {{ $author->description }}
                </td>


                <td>
                    <img class="img-db" src="{{ url($author->photo)}}" alt="">
                </td>

                <td>
                    <a href="{{ url("authors/$author->id/delete") }}" class="delete"> &#x2718;</a>
                </td>



                <td>
                    <a href="{{ url("authors/$author->id/edit") }}" class="edit"> edit</a>
                </td>
            </tr>
        {{--@endforeach--}}
    </table>
@endsection