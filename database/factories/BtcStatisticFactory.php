<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BtcUsdTicker>
 */
class BtcStatisticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'mid' => rand(19194.5, 19994.5),
            'bid' => rand(19194.5, 19994.5),
            'ask' => rand(19194.5, 19994.5),
            'last_price' => rand(19194.5, 19994.5),
            'low' => rand(19194.5, 19994.5),
            'high' => rand(19194.5, 19994.5),
            'volume'  => rand(3081.4621091200000002, 3281.4621091200000002)
        ];
    }
}
