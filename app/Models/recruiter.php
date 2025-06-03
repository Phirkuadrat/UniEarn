<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class recruiter extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'profile_picture',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
