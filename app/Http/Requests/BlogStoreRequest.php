<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class BlogStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|max:255',
            'content'=>'required',
        ];
    }

    public function message(){
        return [
            'title.required'=>'judul tidak boleh kosong',
            'title.max'=>'maksimal panjang karakter 255',
            'content.required'=>'konten tidak boleh kosong'
        ];
    }
}
