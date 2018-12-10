<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbum extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'name' => 'required|max:255',
//        'author_id' => '',
        'producer' => 'required',
        'genres' => 'required',
        'type' => 'required',
        'amount_songs' => 'required|integer',
        'released' => 'required|integer',
        'cover' => 'required|mimes:jpeg,jpg,bmp,png',
        'song'=>'required'

    ];
    }
}
