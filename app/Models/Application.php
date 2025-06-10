<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    protected $fillable = [
        'user_id',
        'project_id',
        'status',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project() 
    {
        return $this->belongsTo(Project::class); 
    }
    
    const STATUS_PENDING = 'Pending';
    const STATUS_APPROVED = 'Approved';
    const STATUS_REJECTED = 'Rejected';
}
