<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $primaryKey = 'id';
    public $timestamp = true; 

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function blog(){
        return $this->hasMany(Blog::class,'id_category','id');
    }
}
