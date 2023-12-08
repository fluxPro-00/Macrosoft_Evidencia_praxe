<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praxpracoviska extends Model
{
    use HasFactory;
	protected $table = 'praxpracoviska';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Praxe_idPraxe' => 'int',
		'Pracoviska_idPracoviska' => 'int'
	];

	protected $fillable = [
		'Praxe_idPraxe',
		'Pracoviska_idPracoviska'
	];

	public function pracoviska()
	{
		return $this->belongsTo(Pracoviska::class, 'Pracoviska_idPracoviska');
	}

	public function praxe()
	{
		return $this->belongsTo(Praxe::class, 'Praxe_idPraxe');
	}
}
