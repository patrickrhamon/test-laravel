<?php

namespace Database\Factories;

use App\Models\Hotel;
use Faker\Provider\pt_BR\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Hotel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'address' => Address::secondaryAddress(),
            'city' => Address::citySuffix(),
            'state' => Address::state(),
            'zip_code' => Address::postcode(),
            'website' => 'http://www.google.com',
        ];
    }
}
