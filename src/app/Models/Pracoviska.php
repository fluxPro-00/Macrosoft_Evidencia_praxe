<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pracoviska extends Model
{
	protected $table = 'pracoviska';
	protected $primaryKey = 'idPracoviska';
	public $timestamps = false;

	protected $casts = [
		'Veduci_idVeduci' => 'int'
	];

	protected $fillable = [
		'Nazov',
		'Adresa',
		'Veduci_idVeduci'
	];

	public function veduci()
	{
		return $this->belongsTo(Veduci::class, 'Veduci_idVeduci');
	}

	public function administratoris()
	{
		return $this->belongsToMany(Administratori::class, 'administratoripracoviska', 'Pracoviska_idPracoviska', 'Administratori_idAdministratori');
	}

	public function poverenizamestnancis()
	{
		return $this->hasMany(Poverenizamestnanci::class, 'Pracoviska_idPracoviska');
	}

	public function praxpracoviska()
	{
		return $this->hasOne(Praxpracoviska::class, 'Pracoviska_idPracoviska');
	}
}
