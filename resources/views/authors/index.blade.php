@extends('_layout')
@section('content')

<div class="index-authors">

    @foreach ($authors as $author)

        <a class="author" href="{{ url("authors/$author->id") }}" style="background-image: url({{ url($author->photo)}})">
            <span class="name">{{$author->name}}</span>
            {{--<img class="img-db" src="{{ url($album->cover)}}" alt="">--}}

        </a>
    @endforeach

</div>



    {{--<td>--}}
        {{--<a href="{{ url("authors/$author->id/delete") }}" class="delete"> &#x2718;</a>--}}
    {{--</td>--}}

    {{--<td>--}}
        {{--<a href="{{ url("authors/$author->id/edit") }}" class="edit"> edit</a>--}}
    {{--</td>--}}
@endsection