<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studenti extends Model
{
	protected $table = 'studenti';
	protected $primaryKey = 'idStudenti';
	public $timestamps = false;

	protected $casts = [
		'StudijneProgramy_idStudijneProgramy' => 'int',
		'Pouzivatel_idPouzivatel' => 'int'
	];

	protected $fillable = [
		'Meno',
		'Priezvisko',
		'Email',
		'Heslo',
		'Tel_cislo',
		'StudijneProgramy_idStudijneProgramy',
		'Pouzivatel_idPouzivatel'
	];

	public function pouzivatel()
	{
		return $this->belongsTo(Pouzivatel::class, 'Pouzivatel_idPouzivatel');
	}

	public function studijneprogramy()
	{
		return $this->belongsTo(Studijneprogramy::class, 'StudijneProgramy_idStudijneProgramy');
	}

	public function praxes()
	{
		return $this->belongsToMany(Praxe::class, 'studenti_has_praxe', 'Studenti_idStudenti', 'Praxe_idPraxe');
	}
}
