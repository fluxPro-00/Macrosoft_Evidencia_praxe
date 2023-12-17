<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pracoviska extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = 'pracoviska';
	protected $primaryKey = 'idPracoviska';
	public $timestamps = false;

	protected $casts = [
		'administratori_idAdministratori' => 'int',
		'veduci_idVeduci' => 'int'
	];

	protected $fillable = [
		'Nazov',
		'Adresa',
		'administratori_idAdministratori',
		'veduci_idVeduci'
	];

	public function administratori()
	{
		return $this->belongsTo(Administratori::class, 'administratori_idAdministratori');
	}

	public function veduci()
	{
		return $this->belongsTo(Veduci::class, 'veduci_idVeduci');
	}

	public function poverenizamestnancis()
	{
		return $this->hasMany(Poverenizamestnanci::class, 'pracoviska_idPracoviska');
	}

	public function praxpracoviska()
	{
		return $this->hasOne(Praxpracoviska::class, 'pracoviska_idPracoviska');
	}

	public function reportpracoviskos()
	{
		return $this->hasMany(Reportpracovisko::class, 'pracoviska_idPracoviska');
	}
}
