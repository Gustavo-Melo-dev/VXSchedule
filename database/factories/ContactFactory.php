<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'cep' => $this->faker->postcode,
            'road' => $this->faker->streetAddress,
            'district' => $this->faker->streetName,
            'city' => $this->faker->city,
            'uf' => $this->faker->stateAbbr,
            'ibge' => $this->faker->latitude,
            'created_at' => null,
            'updated_at' => null,
        ];
    }
}
