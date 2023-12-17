<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studenti extends Model
{
    use HasFactory;
	protected $table = 'studenti';
	protected $primaryKey = 'idStudenti';
	public $timestamps = false;

	protected $casts = [
		'RokStudia' => 'int',
		'SchvalenyVykaz' => 'int',
		'studijneprogramy_idStudijneProgramy' => 'int',
		'pouzivatel_idPouzivatel' => 'int'
	];

	protected $fillable = [
		'RokStudia',
		'Stupen',
		'AkademickyRok',
		'Osvedcenia',
		'SchvalenyVykaz',
		'studijneprogramy_idStudijneProgramy',
		'pouzivatel_idPouzivatel'
	];

	public function pouzivatel()
	{
		return $this->belongsTo(Pouzivatel::class, 'pouzivatel_idPouzivatel');
	}

	public function studijneprogramy()
	{
		return $this->belongsTo(Studijneprogramy::class, 'studijneprogramy_idStudijneProgramy');
	}

	public function praxes()
	{
		return $this->belongsToMany(Praxe::class, 'studenti_has_praxe', 'studenti_idStudenti', 'praxe_idPraxe');
	}
}
