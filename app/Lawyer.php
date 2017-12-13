<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lawyer extends Model {

    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'image',

        'download_cv_es',
        'download_cv_en',

        'download_txt_es',
        'download_txt_en',

        'job_es',
        'job_en',

        'type',

        'info_es',
        'info_en',

        'list_es',
        'list_en',

        'text_es',
        'text_en'
    ];

    protected $dates = ['deleted_at'];
}
