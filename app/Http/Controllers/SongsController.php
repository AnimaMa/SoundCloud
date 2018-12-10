<?php

namespace App\Http\Controllers;

use App\Album;
use App\Author;
use App\Http\Requests\StoreSong;
use App\Song;
use Illuminate\Http\Request;

class SongsController extends Controller
{




    public function show()
    {
        $songs= Song::get()->all();

        return view('songs.index')->with('songs', $songs);

    }


    public function store(StoreSong $request)
    {
//        $songs= Song::get()->all();
        $path = request()->file('song')->store('songs');

        Song::create([
           'title' => request('title'),
            'author_id' => request('author_id'),
            'album_id' => request('album_id'),
           'song' => 'uploads/' . $path
        ]);


        return redirect('songs');
    }


    public function add()
    {

        $songs = Album::get()->all();
        $album = Album::get()->all();
        $authors = Author::get()->all();

        return view('songs.add')->with('album', $album)
            ->with('authors', $authors)
            ->with('songs', $songs);
        }




}
