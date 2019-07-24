<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolStats extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number_of_schools',
    ];
}
