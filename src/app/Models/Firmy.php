<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firmy extends Model
{
    use HasFactory;
	protected $table = 'firmy';
	protected $primaryKey = 'idFirmy';
	public $timestamps = false;

	protected $fillable = [
		'Nazov',
		'Adresa'
	];

	public function praxes()
	{
		return $this->hasMany(Praxe::class, 'Firmy_idFirmy');
	}

	public function zastupcafirmies()
	{
		return $this->hasMany(Zastupcafirmy::class, 'Firmy_idFirmy');
	}
}
