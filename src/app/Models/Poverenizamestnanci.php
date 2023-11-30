<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poverenizamestnanci extends Model
{
	protected $table = 'poverenizamestnanci';
	protected $primaryKey = 'idPovereni';
	public $timestamps = false;

	protected $casts = [
		'Pracoviska_idPracoviska' => 'int',
		'Pouzivatel_idPouzivatel' => 'int'
	];

	protected $fillable = [
		'Meno',
		'Priezvisko',
		'Email',
		'Heslo',
		'Tel_cislo',
		'Pracoviska_idPracoviska',
		'Pouzivatel_idPouzivatel'
	];

	public function pouzivatel()
	{
		return $this->belongsTo(Pouzivatel::class, 'Pouzivatel_idPouzivatel');
	}

	public function pracoviska()
	{
		return $this->belongsTo(Pracoviska::class, 'Pracoviska_idPracoviska');
	}
}
