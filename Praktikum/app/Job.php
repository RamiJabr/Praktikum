<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $table = 'jobs';
    protected $primaryKey = 'job_id';

    protected $fillable=[
        'jobname','employed'
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }

}
