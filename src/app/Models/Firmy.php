<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Firmy extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = 'firmy';
	protected $primaryKey = 'idFirmy';
	public $timestamps = false;

	protected $fillable = [
		'Nazov',
		'Adresa'
	];

	public function praxes()
	{
		return $this->hasMany(Praxe::class, 'firmy_idFirmy');
	}

	public function zastupcafirmies()
	{
		return $this->hasMany(Zastupcafirmy::class, 'firmy_idFirmy');
	}
}
