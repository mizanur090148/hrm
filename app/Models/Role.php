<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
	
    protected $fillable = [
    	'name',
    	'slug'    
    ];

    protected $dates = [
    	'deleted_at'
    ];
}
