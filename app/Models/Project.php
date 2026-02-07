<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Project extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
	protected $fillable = [
		'project_name',
		'client_id',
		'estimated_time',
		'time_spent',
		'comment',
		'start_date',
		'status',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array
	 */
	protected $casts = [
		'estimated_time' => 'decimal:2',
		'time_spent' => 'decimal:2',
		'start_date' => 'date',
		'status' => 'string',
	];

	/**
	 * Get the client (user) that owns the project.
	 */
	public function client(): BelongsTo
	{
		return $this->belongsTo(User::class, 'client_id');
	}
}

