<?php

namespace Database\Factories\Settings;

use App\Models\Settings\Leave;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'casual' => 12,
            'sick' => 8,
            'annual' => 7,
            'maternity' => 45,
            'paternity' => 3,
            'others' => 0,
            'unpaid' => 0,
            'year' => date('Y'),
            'factory_id' => Leave::first()->id ?? 1
        ];
    }
}
