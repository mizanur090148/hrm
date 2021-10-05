<?php

namespace App\Models\Settings;

use App\Models\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'casual',
        'sick',
        'annual',
        'maternity',
        'paternity',
        'unpaid',
        'others',
        'year'
    ];

    public function factory()
    {
        return $this->belongsTo(Factory::class);
    }
}
