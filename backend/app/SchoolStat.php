<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolStat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number_of_schools', 'updated_at'
    ];
}
