<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\StoreAlbum;
use App\Http\Requests\StoreAuthor;
use App\Http\Requests\UpdateAuthor;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index() {
        $authors = Author::get()->all();
        return view('authors.index')->with('authors', $authors);

    }

    public function show($id) {
        $author = Author::where('id', $id)->first();
        return view('authors.show')->with('author', $author);
    }

    public function destroy($id) {
        Author::where('id', $id)->delete();
        return redirect('authors');
    }

    public function add() {
        return view('authors.add');
    }

    public function store(StoreAuthor $request) {
        $path = request()->file('photo')->store('profile_uploads');

        Author::create([
            'name' => request('name'),
            'description' => request('description'),
            'photo' => 'uploads/' . $path
        ]);

        return redirect('authors');

    }

    public function edit($id) {
        $author = Author::where('id', $id)->first();
//        $authors = Author::get($id)->all();

        return view('authors.edit')->with('author', $author);

    }

    public function update(UpdateAuthor $request)
    {
        $id = $request->get('id');
        $data = $request->except('id', '_method', '_token');

        if ($request->has('photo')) {
            $path = request()->file('photo')->store('photo_profiles');
            $data['photo'] = 'uploads/'.$path;
        }

        Author::where('id', $id)->update($data);

        return redirect('authors/'.$id);

}
}
