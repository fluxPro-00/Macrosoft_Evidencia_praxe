<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studijneprogramy extends Model
{
	protected $table = 'studijneprogramy';
	protected $primaryKey = 'idStudijneProgramy';
	public $timestamps = false;

	protected $fillable = [
		'Nazov',
		'Skratka'
	];

	public function studentis()
	{
		return $this->hasMany(Studenti::class, 'StudijneProgramy_idStudijneProgramy');
	}
}
