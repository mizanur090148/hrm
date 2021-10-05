<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
   	use HasFactory, SoftDeletes;
	
    protected $fillable = [
    	'name',
    	'slug'    
    ];

    protected $dates = [
    	'deleted_at'
    ];
}
