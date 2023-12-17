<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reportpracovisko extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = 'reportpracovisko';
	protected $primaryKey = 'idreportpracovisko';
	public $timestamps = false;

	protected $casts = [
		'pracoviska_idPracoviska' => 'int',
		'veduci_idVeduci1' => 'int'
	];

	protected $fillable = [
		'Obsah',
		'pracoviska_idPracoviska',
		'veduci_idVeduci1'
	];

	public function pracoviska()
	{
		return $this->belongsTo(Pracoviska::class, 'pracoviska_idPracoviska');
	}

	public function veduci()
	{
		return $this->belongsTo(Veduci::class, 'veduci_idVeduci1');
	}
}
