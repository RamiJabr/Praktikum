<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $table = 'jobs';
    protected $primaryKey = 'job_id';

    protected $fillable=[
        'jobname','employed','user_id'
    ];


    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
