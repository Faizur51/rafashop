<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $coupon_code=$this->faker->unique()->words($nb=2,$asText=True);
        $slug=Str::slug($coupon_code,'-');

        $type=$this->faker->randomElement(['fixed','percent']);
        return [
            'code'=>$coupon_code,
            'slug'=>$slug,
            'type'=>$type,
            'value'=>100,
            'cart_value'=>1200,
            'expiry_date'=>date("Y-m-d"),
        ];
    }
}
