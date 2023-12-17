<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pouzivatel extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = 'pouzivatel';
	protected $primaryKey = 'idPouzivatel';
	public $timestamps = false;

	protected $casts = [
		'Typ' => 'int'
	];

	protected $fillable = [
		'Meno',
		'Priezvisko',
		'Email',
		'Heslo',
		'Tel_cislo',
		'Typ'
	];

	public function administratoris()
	{
		return $this->hasMany(Administratori::class, 'pouzivatel_idPouzivatel');
	}

	public function poverenizamestnancis()
	{
		return $this->hasMany(Poverenizamestnanci::class, 'pouzivatel_idPouzivatel');
	}

	public function studentis()
	{
		return $this->hasMany(Studenti::class, 'pouzivatel_idPouzivatel');
	}

	public function veducis()
	{
		return $this->hasMany(Veduci::class, 'pouzivatel_idPouzivatel');
	}

	public function zastupcafirmies()
	{
		return $this->hasMany(Zastupcafirmy::class, 'pouzivatel_idPouzivatel');
	}
}
