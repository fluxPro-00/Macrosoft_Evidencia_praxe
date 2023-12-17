<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentiHasPraxe extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = 'studenti_has_praxe';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'studenti_idStudenti' => 'int',
		'praxe_idPraxe' => 'int'
	];

	protected $fillable = [
		'studenti_idStudenti',
		'praxe_idPraxe'
	];

	public function praxe()
	{
		return $this->belongsTo(Praxe::class, 'praxe_idPraxe');
	}

	public function studenti()
	{
		return $this->belongsTo(Studenti::class, 'studenti_idStudenti');
	}
}
