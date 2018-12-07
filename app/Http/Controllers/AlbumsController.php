<?php

namespace App\Http\Controllers;

use App\Album;
use App\Author;
use App\Http\Requests\StoreAlbum;
use App\Http\Requests\UpdateAlbum;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {

        $albums = Album::get()->all();

        return view('albums.index')->with('albums', $albums);

    }

    public function store(StoreAlbum $request)
    {

        $path = request()->file('cover')->store('covers');
        $path2 = request()->file('photo')->store('profile_uploads');
//        Album::create([
//            'name' => request('name'),
//            'author' => request('author'),
//            'producer' => request('producer'),
//            'genres' => request('genres'),
//            'type' => request('type'),
//            'amount_songs' => request('amount_songs'),
//            'released' => request('released'),
//            'cover' => 'uploads/' . $path
//        ]);
        if (request('author_id') != 0) { // ak sme vybrali autora z DB
            Album::create([
                'name' => request('name'),
                'author_id' => request('author_id'),
                'producer' => request('producer'),
                'genres' => request('genres'),
                'type' => request('type'),
                'amount_songs' => request('amount_songs'),
                'released' => request('released'),
                'cover' => 'uploads/' . $path
            ]);
        } else { // ak sme vytvorili noveho autora a nevybrali sme z DB

            //vytvorit noveho authora
            $newAuthor = Author::create([
                'name' => request('author'),
                'description' => request('description'),
                'photo' => 'uploads/' . $path2
            ]);

            //vytvorit novy album s tym novym autorom
            Album::create([
                'name' => request('name'),
                'author_id' => $newAuthor->id,
                'producer' => request('producer'),
                'genres' => request('genres'),
                'type' => request('type'),
                'amount_songs' => request('amount_songs'),
                'released' => request('released'),
                'cover' => 'uploads/' . $path
            ]);

        }

        return redirect('albums');

    }


    public function show($id)
    {
        $album = Album::where('id', $id)->first();

        return view('albums.show')->with('album', $album);

    }

    public function add()
    {
        $authors = Author::get()->all();

        return view('albums.add')->with('authors', $authors);

    }

    public function destroy($id)
    {

        Album::where('id', $id)->delete();

        return redirect('albums');

    }

    public function edit($id)
    {

        $album = Album::where('id', $id)->first();
        $authors = Author::get()->all();

        return view('albums.edit')->with('album', $album)
            ->with('authors', $authors);

    }

    public function update(UpdateAlbum $request)
    {

        $id = $request->get('id'); //to ktore prislo z hidden inputu
        $data = $request->except('_method', 'id', '_token');


        if ($request->has('cover')) {
            $path = request()->file('cover')->store('covers');
            $data['cover'] = 'uploads/' . $path;
        }
        $path2 = request()->file('photo')->store('profile_uploads');

        if (request('author_id') == 0) { // ak sme vybrali autora z DB
//            Album::create([
//                'name' => request('name'),
//                'author_id' => request('author_id'),
//                'producer' => request('producer'),
//                'genres' => request('genres'),
//                'type' => request('type'),
//                'amount_songs' => request('amount_songs'),
//                'released' => request('released'),
//                'cover' => 'uploads/' . $path
//            ]);
          // ak sme vytvorili noveho autora a nevybrali sme z DB

            //vytvorit noveho authora
            $newAuthor = Author::create([
                'name' => request('author'),
                'description' => request('description'),
                'photo' => 'uploads/' . $path2
            ]);

            //vytvorit novy album s tym novym autorom
            Album::create([
                'name' => request('name'),
                'author_id' => $newAuthor->id,
                'producer' => request('producer'),
                'genres' => request('genres'),
                'type' => request('type'),
                'amount_songs' => request('amount_songs'),
                'released' => request('released'),
                'cover' => 'uploads/' . $path
            ]);   }

        Album::where('id', $id)->update($data);

        return redirect('albums/' . $id);

    }


}
