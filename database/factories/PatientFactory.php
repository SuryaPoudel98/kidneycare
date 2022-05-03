<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;
use Illuminate\Support\Str;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     *
     * @return array
     */

    protected $model = Patient::class;

    public function definition()
    {
        return [

            //
            
            'name'=> $this->faker->title,
            'address'=> $this->faker->address,
            'phone_no'=> $this->faker->string,
            'email'=> $this->faker->email,
            'dob'=> $this->faker->dob,
           

           


        ];
    }
}
