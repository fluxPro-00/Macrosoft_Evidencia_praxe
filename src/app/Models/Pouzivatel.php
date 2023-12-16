<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pouzivatel extends Model
{
    use HasFactory;
	protected $table = 'pouzivatel';
	protected $primaryKey = 'idPouzivatel';
	public $timestamps = false;

	protected $casts = [
		'Typ' => 'int'
	];

	protected $fillable = [
        'Email',
        'Heslo',
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

	public function zastupcafirmies()
	{
		return $this->hasMany(Zastupcafirmy::class, 'Pouzivatel_idPouzivatel');
	}
}
