<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masukan extends Model
{
	protected $table = 'masukan';

	protected $fillable = [
		'isi',
		'user_id',
	];

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
}
