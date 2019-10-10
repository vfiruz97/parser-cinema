<?php

namespace App;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class ScheduleCinema extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'title',
    	'price',
    	'start_at',
    	'end_at'
    ];
}
