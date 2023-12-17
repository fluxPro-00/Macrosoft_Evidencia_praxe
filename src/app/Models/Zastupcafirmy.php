<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zastupcafirmy extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = 'zastupcafirmy';
	protected $primaryKey = 'idZastupcaFirmy';
	public $timestamps = false;

	protected $casts = [
		'firmy_idFirmy' => 'int',
		'pouzivatel_idPouzivatel' => 'int'
	];

	protected $fillable = [
		'firmy_idFirmy',
		'pouzivatel_idPouzivatel'
	];

	public function firmy()
	{
		return $this->belongsTo(Firmy::class, 'firmy_idFirmy');
	}

	public function pouzivatel()
	{
		return $this->belongsTo(Pouzivatel::class, 'pouzivatel_idPouzivatel');
	}

	public function spatnavazbazastupcas()
	{
		return $this->hasMany(Spatnavazbazastupca::class, 'zastupcafirmy_idZastupcaFirmy');
	}
}
