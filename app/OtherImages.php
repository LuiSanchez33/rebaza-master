<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherImages extends Model {

	protected $fillable = [
		'image',
		'link',
		'type'
	];

}
