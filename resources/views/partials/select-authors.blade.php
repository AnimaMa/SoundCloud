<select name="author_id" class="nav-categ" id="">
    @if(Request::is('albums/add') )
        <option value="0">---</option>
    @else
        <option value="{{ $album->author->name }}">{{ $album->author->name }}</option>
    @endif

    @foreach($authors as $author )
        <option value="{{ $author->id }}">{{  $author->name }}</option>
    @endforeach
</select>