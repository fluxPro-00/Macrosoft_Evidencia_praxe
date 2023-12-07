<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studijneprogramy extends Model
{
    use HasFactory;
	protected $table = 'studijneprogramy';
	protected $primaryKey = 'idStudijneProgramy';
	public $timestamps = false;

	protected $fillable = [
		'Nazov',
		'Skratka'
	];

	public function studentis()
	{
		return $this->hasMany(Studenti::class, 'StudijneProgramy_idStudijneProgramy');
	}
}
