<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_profile extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'user_id',
        'gender',
        'address',
        'profile_photo',
        'birth_date'
        
    ];
    public function post()
    {
        return $this->hasOne(Post::class);
    }
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = strtoupper($value);
        //castinh
        // $this->attributes['address'] = (int)strtoupper($value);
    }
    public function getAddressAttribute($value)
    {
        return strtolower($value);
    }
    public function getFullNameAttribute()
{
    return "{$this->address} {$this->profile_photo}";
}
}
