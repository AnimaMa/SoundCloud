<select name="author_id" class="nav-categ" id="">
    @if(isset($isNew) && $isNew)
        <option value="0">---</option>
    @else
        <option value="{{ $song->author->name }}">{{ $song->author->name }}</option>
    @endif

    @foreach($authors as $author )
        <option value="{{ $author->id }}">{{  $author->name }}</option>
    @endforeach
</select>