<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Studijneprogramy extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = 'studijneprogramy';
	protected $primaryKey = 'idStudijneProgramy';
	public $timestamps = false;

	protected $fillable = [
		'Nazov',
		'Skratka'
	];

	public function praxes()
	{
		return $this->hasMany(Praxe::class, 'studijneprogramy_idStudijneProgramy');
	}

	public function studentis()
	{
		return $this->hasMany(Studenti::class, 'studijneprogramy_idStudijneProgramy');
	}
}
