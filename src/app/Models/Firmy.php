<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Firmy extends Model
{
	protected $table = 'firmy';
	protected $primaryKey = 'idFirmy';
	public $timestamps = false;

	protected $fillable = [
		'Nazov',
		'Adresa'
	];

	public function praxes()
	{
		return $this->hasMany(Praxe::class, 'Firmy_idFirmy');
	}

	public function zastupcacafirmies()
	{
		return $this->hasMany(Zastupcacafirmy::class, 'Firmy_idFirmy');
	}
}
