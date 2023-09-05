<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_completed',
        'user_id',
        'company_id',
        'start_at',
        'expired_at'
    ];

    protected $hidden = [
        'user_id',
        'company_id',
        'created_at',
        'updated_at',
        'user',
    ];

    protected $appends = ['userName'];

    public function company () {
        return $this->belongsTo(Company::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function getUserNameAttribute()
    {
         return $this->user->name;
    }
}
