<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'mfa_enabled',
        'last_login_at',
    ];

    protected $casts = [
        'mfa_enabled' => 'boolean',
        'last_login_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('context_scope');
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }
}
