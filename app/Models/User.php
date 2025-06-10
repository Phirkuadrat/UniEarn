<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function seeker()
    {
        return $this->hasOne(seeker::class);
    }

    public function recruiter()
    {
        return $this->hasOne(recruiter::class);
    }

    const ROLE_UNASSIGNED = 'unassigned';
    const ROLE_SEEKER = 'seeker';
    const ROLE_RECRUITER = 'recruiter';

    public function isUnassigned(): bool
    {
        return $this->role === self::ROLE_UNASSIGNED;
    }

    public function isSeeker(): bool
    {
        return $this->role === self::ROLE_SEEKER;
    }

    public function isRecruiter(): bool
    {
        return $this->role === self::ROLE_RECRUITER;
    }
}
