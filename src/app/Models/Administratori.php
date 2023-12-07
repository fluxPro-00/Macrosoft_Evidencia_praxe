<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administratori extends Model
{
    use HasFactory;
	protected $table = 'administratori';
	protected $primaryKey = 'idAdministratori';
	public $timestamps = false;

	protected $casts = [
		'Pouzivatel_idPouzivatel' => 'int'
	];

	protected $fillable = [
		'Meno',
		'Priezvisko',
		'Email',
		'Heslo',
		'Tel_cislo',
		'Pouzivatel_idPouzivatel'
	];

    public function pouzivatel()
	{
		return $this->belongsTo(Pouzivatel::class, 'Pouzivatel_idPouzivatel');
	}

	public function pracoviskas()
	{
		return $this->belongsToMany(Pracoviska::class, 'administratoripracoviska', 'Administratori_idAdministratori', 'Pracoviska_idPracoviska');
	}
}
