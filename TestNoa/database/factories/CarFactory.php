<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Companies;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $c = null;
        if (Companies::all()->count() == 0) {
            $c = new Companies();
            $c->name = 'Hyundai';
            $c->save();
        }else{
            $c = Companies::first();
        }

        return [
            'image'=> $this->faker->name(),
            'name' => $this->faker->name(),
            'company_id' => $c->id,
            'price' => 3000,
            'year' => 2021,
            'type' => '세단',
            'style' => 'SUV',
        ];
    }
}
