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
		'praxe_idPraxe' => 'int',
		'pracoviska_idPracoviska' => 'int'
	];

	protected $fillable = [
		'praxe_idPraxe',
		'pracoviska_idPracoviska'
	];

	public function pracoviska()
	{
		return $this->belongsTo(Pracoviska::class, 'pracoviska_idPracoviska');
	}

	public function praxe()
	{
		return $this->belongsTo(Praxe::class, 'praxe_idPraxe');
	}
}
