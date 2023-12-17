<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poverenizamestnanci extends Model
{
    use HasFactory;
	protected $table = 'poverenizamestnanci';
	protected $primaryKey = 'idPovereni';
	public $timestamps = false;

	protected $casts = [
		'pracoviska_idPracoviska' => 'int',
		'pouzivatel_idPouzivatel' => 'int'
	];

	protected $fillable = [
		'pracoviska_idPracoviska',
		'pouzivatel_idPouzivatel'
	];

	public function pouzivatel()
	{
		return $this->belongsTo(Pouzivatel::class, 'pouzivatel_idPouzivatel');
	}

	public function pracoviska()
	{
		return $this->belongsTo(Pracoviska::class, 'pracoviska_idPracoviska');
	}
}
