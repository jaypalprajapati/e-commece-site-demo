<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'hobbies',
        'gender',
        'password',
        'type'
    ];


    public function setHobbiesAttribute($Admin)
    {
        $this->attributes['hobbies'] = implode(',', $Admin);
    }

    public function getHobbiesAttribute($Admin)

    {
        return $this->attributes[''] = explode(',', $Admin);
    }
}
