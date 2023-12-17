<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administratori extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = 'administratori';
	protected $primaryKey = 'idAdministratori';
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
		return $this->hasMany(Pracoviska::class, 'administratori_idAdministratori');
	}

	public function reportadmins()
	{
		return $this->hasMany(Reportadmin::class, 'administratori_idAdministratori');
	}
}
