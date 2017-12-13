<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model {

	//
	protected $fillable = [
		'place',
		'info_es',
		'info_en'
	];
}
