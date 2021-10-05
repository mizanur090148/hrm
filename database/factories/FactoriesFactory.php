<?php

namespace Database\Factories;

use App\Models\Factory;
use Illuminate\Database\Eloquent\Factories\Factory as FakerFactory;

class FactoriesFactory extends FakerFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Factory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {dd(999);
        return [
            //
        ];
    }
}
