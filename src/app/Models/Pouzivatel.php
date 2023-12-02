<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pouzivatel extends Model
{
	protected $table = 'pouzivatel';
	protected $primaryKey = 'idPouzivatel';
	public $timestamps = false;

	protected $casts = [
		'Typ' => 'int'
	];

	protected $fillable = [
		'Typ'
	];

	public function administratoris()
	{
		return $this->hasMany(Administratori::class, 'Pouzivatel_idPouzivatel');
	}

	public function poverenizamestnancis()
	{
		return $this->hasMany(Poverenizamestnanci::class, 'Pouzivatel_idPouzivatel');
	}

	public function studentis()
	{
		return $this->hasMany(Studenti::class, 'Pouzivatel_idPouzivatel');
	}

	public function veducis()
	{
		return $this->hasMany(Veduci::class, 'Pouzivatel_idPouzivatel');
	}

	public function zastupcacafirmies()
	{
		return $this->hasMany(Zastupcacafirmy::class, 'Pouzivatel_idPouzivatel');
	}
}
