<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spatnavazbazastupca extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = 'spatnavazbazastupca';
	protected $primaryKey = 'idspatnavazbazastupca';
	public $timestamps = false;

	protected $casts = [
		'zastupcafirmy_idZastupcaFirmy' => 'int',
		'veduci_idVeduci' => 'int',
		'praxe_idPraxe' => 'int'
	];

	protected $fillable = [
		'Obsah',
		'zastupcafirmy_idZastupcaFirmy',
		'veduci_idVeduci',
		'praxe_idPraxe'
	];

	public function zastupcafirmy()
	{
		return $this->belongsTo(Zastupcafirmy::class, 'zastupcafirmy_idZastupcaFirmy');
	}

	public function praxe()
	{
		return $this->belongsTo(Praxe::class, 'praxe_idPraxe');
	}

	public function veduci()
	{
		return $this->belongsTo(Veduci::class, 'veduci_idVeduci');
	}
}
