<?php

namespace Database\Factories\Settings;

use App\Models\Settings\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' => str_replace(' ', '-', $this->faker->name) //str_slug($this->faker->name(), '-')
        ];
    }
}
