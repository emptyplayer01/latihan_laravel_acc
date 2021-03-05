<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class BlogUpdateRequest extends FormRequest
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
            'id'=>'required',
            'title'=>'required|max:255',
            'content'=>'required',
            'flag_active'=>'required|in:1,0'
        ];
    }

    public function messages()
    {
        return[
            'id.required'=>'terjadi masalah',
            'title.required'=>'judul tidak boleh kosong',
            'title.max'=>'panjang max 255 karakter',
            'content.required'=>'content tidak boleh kosong',
            'flag_active.required'=>'status tidak boleh kosong',
            'flag_active.in'=>'status wajib di isi'
        ];
    }
}
