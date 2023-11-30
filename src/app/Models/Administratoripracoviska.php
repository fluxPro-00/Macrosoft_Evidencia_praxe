<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administratoripracoviska extends Model
{
	protected $table = 'administratoripracoviska';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Pracoviska_idPracoviska' => 'int',
		'Administratori_idAdministratori' => 'int'
	];

	protected $fillable = [
		'Pracoviska_idPracoviska',
		'Administratori_idAdministratori'
	];

	public function administratori()
	{
		return $this->belongsTo(Administratori::class, 'Administratori_idAdministratori');
	}

	public function pracoviska()
	{
		return $this->belongsTo(Pracoviska::class, 'Pracoviska_idPracoviska');
	}
}
