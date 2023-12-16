<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praxe extends Model
{
    use HasFactory;
	protected $table = 'praxe';
	protected $primaryKey = 'idPraxe';
	public $timestamps = false;

	protected $casts = [
		'Firmy_idFirmy' => 'int',
        'StudijneProgramy_idStudijneProgramy' => 'int',
		'Začiatok' => 'datetime',
		'Koniec' => 'datetime'
	];

	protected $fillable = [
		'Firmy_idFirmy',
        'StudijneProgramy_idStudijneProgramy',
		'Pozícia',
		'Začiatok',
		'Koniec',
		'Stav',
		'Hodnotenie',
        'TypZmluvy'
	];

    public function firmy()
    {
        return $this->belongsTo(Firmy::class, 'Firmy_idFirmy');
    }
    public function studijneprogramy()
    {
        return $this->belongsTo(Studijneprogramy::class, 'StudijneProgramy_idStudijneProgramy');
    }
	public function archivovanes()
	{
		return $this->hasMany(Archivovane::class, 'Praxe_idPraxe');
	}

	public function praxpracoviska()
	{
		return $this->hasOne(Praxpracoviska::class, 'Praxe_idPraxe');
	}

	public function studentis()
	{
		return $this->belongsToMany(Studenti::class, 'studenti_has_praxe', 'Praxe_idPraxe', 'Studenti_idStudenti');
	}
}
