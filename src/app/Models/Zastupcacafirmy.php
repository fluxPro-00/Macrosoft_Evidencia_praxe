<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zastupcacafirmy extends Model
{
	protected $table = 'zastupcacafirmy';
	protected $primaryKey = 'idZastupcacaFirmy';
	public $timestamps = false;

	protected $casts = [
		'Firmy_idFirmy' => 'int',
		'Pouzivatel_idPouzivatel' => 'int'
	];

	protected $fillable = [
		'Meno',
		'Priezvisko',
		'Email',
		'Heslo',
		'Tel_cislo',
		'Firmy_idFirmy',
		'Pouzivatel_idPouzivatel'
	];

	public function firmy()
	{
		return $this->belongsTo(Firmy::class, 'Firmy_idFirmy');
	}

	public function pouzivatel()
	{
		return $this->belongsTo(Pouzivatel::class, 'Pouzivatel_idPouzivatel');
	}
}
