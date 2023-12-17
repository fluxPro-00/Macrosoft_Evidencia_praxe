<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reportadmin extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = 'reportadmin';
	protected $primaryKey = 'idreportadmin';
	public $timestamps = false;

	protected $casts = [
		'administratori_idAdministratori' => 'int'
	];

	protected $fillable = [
		'Obsah',
		'administratori_idAdministratori'
	];

	public function administratori()
	{
		return $this->belongsTo(Administratori::class, 'administratori_idAdministratori');
	}
}
