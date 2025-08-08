<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'company_website',
        'company_phone',
        'company_address',
        'company_logo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
