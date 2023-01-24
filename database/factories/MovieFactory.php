<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;
    public function definition()
    {
        return [
            'titulo'=>$this->faker->name(),
            'descripcion'=>$this->faker->paragraph(),
            'fecha_de_estreno'=>$this->faker->date(),
            'portada'=>$this->faker->sentence(),
        ];
    }
}
