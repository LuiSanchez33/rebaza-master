<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotes extends Model {

    use SoftDeletes;

    protected $fillable = [
        'name',
        'rol_es',
        'rol_en',
        'message_es',
        'message_en',
    ];

    protected $dates = ['deleted_at'];
}
