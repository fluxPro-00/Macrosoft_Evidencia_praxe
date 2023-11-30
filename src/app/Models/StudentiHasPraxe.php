<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentiHasPraxe extends Model
{
	protected $table = 'studenti_has_praxe';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Studenti_idStudenti' => 'int',
		'Praxe_idPraxe' => 'int'
	];

	protected $fillable = [
		'Studenti_idStudenti',
		'Praxe_idPraxe'
	];

	public function praxe()
	{
		return $this->belongsTo(Praxe::class, 'Praxe_idPraxe');
	}

	public function studenti()
	{
		return $this->belongsTo(Studenti::class, 'Studenti_idStudenti');
	}
}
