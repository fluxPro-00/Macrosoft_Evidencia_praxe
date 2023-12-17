<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Veduci extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = 'veduci';
	protected $primaryKey = 'idVeduci';
	public $timestamps = false;

	protected $casts = [
		'pouzivatel_idPouzivatel' => 'int'
	];

	protected $fillable = [
		'pouzivatel_idPouzivatel'
	];

	public function pouzivatel()
	{
		return $this->belongsTo(Pouzivatel::class, 'pouzivatel_idPouzivatel');
	}

	public function pracoviskas()
	{
		return $this->hasMany(Pracoviska::class, 'veduci_idVeduci');
	}

	public function reportpracoviskos()
	{
		return $this->hasMany(Reportpracovisko::class, 'veduci_idVeduci1');
	}

	public function spatnavazbazastupcas()
	{
		return $this->hasMany(Spatnavazbazastupca::class, 'veduci_idVeduci');
	}
}
