<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable=[
        'company_name','employee_count'
    ];

    public function jobs()
    {
        return $this->hasMany(Jobs::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
