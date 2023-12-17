<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Praxe extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = 'praxe';
	protected $primaryKey = 'idPraxe';
	public $timestamps = false;

	protected $casts = [
		'Zaciatok' => 'datetime',
		'Koniec' => 'datetime',
		'firmy_idFirmy' => 'int',
		'studijneprogramy_idStudijneProgramy' => 'int'
	];

	protected $fillable = [
		'Pozicia',
		'Zaciatok',
		'Koniec',
		'Stav',
		'Hodnotenie',
		'TypZmluvy',
		'firmy_idFirmy',
		'studijneprogramy_idStudijneProgramy'
	];

	public function firmy()
	{
		return $this->belongsTo(Firmy::class, 'firmy_idFirmy');
	}

	public function studijneprogramy()
	{
		return $this->belongsTo(Studijneprogramy::class, 'studijneprogramy_idStudijneProgramy');
	}

	public function archivovanes()
	{
		return $this->hasMany(Archivovane::class, 'praxe_idPraxe');
	}

	public function praxpracoviska()
	{
		return $this->hasOne(Praxpracoviska::class, 'praxe_idPraxe');
	}

	public function spatnavazbazastupcas()
	{
		return $this->hasMany(Spatnavazbazastupca::class, 'praxe_idPraxe');
	}

	public function studentis()
	{
		return $this->belongsToMany(Studenti::class, 'studenti_has_praxe', 'praxe_idPraxe', 'studenti_idStudenti');
	}
}
