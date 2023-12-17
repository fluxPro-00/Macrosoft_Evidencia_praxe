<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archivovane extends Model
{
	use HasFactory, SoftDeletes;
    protected $table = 'archivovane';
	protected $primaryKey = 'idArchivovane';
	public $timestamps = false;

	protected $casts = [
		'Datum' => 'datetime',
		'praxe_idPraxe' => 'int'
	];

	protected $fillable = [
		'Datum',
		'praxe_idPraxe'
	];

	public function praxe()
	{
		return $this->belongsTo(Praxe::class, 'praxe_idPraxe');
	}
}
