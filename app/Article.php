<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = [
		'id',
		'title_es',
		'title_en',
		'imagen',
		'desc_es',
		'desc_en',
		'status'
	];

}
