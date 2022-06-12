<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PopupFactory extends Factory
{

    private function textSection(): array
    {
        return [
            "type" => "text",
            "color" => "#". $this->faker->hexColor(),
            "text" => $this->faker->sentence(),
            "size" => $this->faker->randomElement(["md", "sm", "lg"]),
        ];
    }

    private function buttonSection(): array
    {
        return [
            "type" => "button",
            "backgroundColor" => "#". $this->faker->hexColor(),
            "color" => "#". $this->faker->hexColor(),
            "label" => $this->faker->word(),
            "truncate" => $this->faker->boolean(),
            "size" => $this->faker->randomElement(["md", "sm", "lg"]),
        ];
    }

    private function inputSection()
    {
        return [
            "type" => "input",
            "backgroundColor" => "#". $this->faker->hexColor(),
            "color" => "#". $this->faker->hexColor(),
            "placeholder" => $this->faker->words(3, true),
        ];
    }

    public function definition(): array
    {
        return [
            "idem" => uniqid(),
            "data" => json_encode([
                "backgroundColor" => "#". $this->faker->hexColor(),
                "children" => [
                    $this->textSection(),
                    $this->buttonSection(),
                    $this->inputSection(),
                ]
            ]),
        ];
    }
}
