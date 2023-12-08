<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    use HasFactory;
	protected $table = 'personal_access_tokens';

	protected $casts = [
		'tokenable_id' => 'int',
		'last_used_at' => 'datetime',
		'expires_at' => 'datetime'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'tokenable_type',
		'tokenable_id',
		'name',
		'token',
		'abilities',
		'last_used_at',
		'expires_at'
	];
}
