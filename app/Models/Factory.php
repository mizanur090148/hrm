<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Group;

class Factory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    	'name',
    	'address',
    	'responsible_person',
    	'email',
    	'mobile_no'
    ];

    protected $dates = [
    	'deleted_at'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
