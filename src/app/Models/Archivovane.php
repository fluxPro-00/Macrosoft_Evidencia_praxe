<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivovane extends Model
{
    use HasFactory;
	protected $table = 'archivovane';
	protected $primaryKey = 'idArchivovane';
	public $timestamps = false;
	protected $casts = [
		'Datum' => 'datetime',
		'Praxe_idPraxe' => 'int'
	];

	protected $fillable = [
		'Datum',
		'Praxe_idPraxe'
	];

	public function praxe()
	{
		return $this->belongsTo(Praxe::class, 'Praxe_idPraxe');
	}
}
