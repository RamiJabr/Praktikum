<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'company_id';

    protected $fillable=[
        'company_name','employee_count','creator','company_logo'
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
