<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Laravel\Sanctum\HasApiTokens;

class Pouzivatel extends Model implements Authenticatable
{
    use HasFactory, SoftDeletes, HasApiTokens, AuthenticatableTrait;
	protected $table = 'pouzivatel';
	protected $primaryKey = 'idPouzivatel';
	public $timestamps = false;

	protected $casts = [
		'Typ' => 'int'
	];

    protected $guarded = [
        'idPouzivatel'
    ];

    protected $hidden = [
        'Heslo',
        'deleted_at',
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
