<?php

namespace Database\Factories\Models;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name,
            'last_name'  => $this->faker->name,
            'email'      => $this->faker->password(6),
            'address'    => $this->faker->address,
            'phone'      => $this->faker->phoneNumber,
            'birth_date' => $this->faker->date,
            'address_details' => $this->faker->address,
            'birth_date' => $this->faker->date,
        ];
    }
}
