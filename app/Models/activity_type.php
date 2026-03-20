<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class activity_type extends Model
{
    protected $table = 'activity_types';

    protected $fillable = [
        'activity',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getStatusLabelAttribute()
    {
        return $this->status ? 'Active' : 'Inactive';
    }
}
