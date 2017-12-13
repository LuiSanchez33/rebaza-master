<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model {

    use SoftDeletes;

    protected $fillable = [
        'name_es',
        'name_en',
        'page_slug',
        'type',
        'image',
        'text_es',
        'text_en',
    ];

    protected $dates = ['deleted_at'];
}
