<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomImages =[
            'https://m.media-amazon.com/images/I/41WpqIvJWRL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61ghDjhS8vL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61c1QC4lF-L._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/710VzyXGVsL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61EPT-oMLrL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71r3ktfakgL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61CqYq+xwNL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71cVOgvystL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71E+oh38ZqL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61uSHBgUGhL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71nDK2Q8HAL._AC_UL640_QL65_.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/16-kg-washing-machine-13375-8380.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/4t-c70al1x1785-1727.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sharp-microwave-oven-r-92a0v-price-in-bd-1000x10003696-2527.jpg',
            'https://static-01.daraz.com.bd/p/b7727b8dc0706d188179397b08826a34.jpg',
            'https://static-01.daraz.com.bd/p/7fbe4901178576bbf04907275a1dfe28.jpg',
            'https://static-01.daraz.com.bd/p/7126e45345f95b6344644bb2423d2bba.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sharp-chest-freezer-sjc-118-wh-price-in-bd-1000x10003198-5987.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sharp-microwave-oven-r-94a0v-price-in-bd-1000x1000920-2527.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sm-3006-toaster-waffle-maker-grill-morphy-richards-22487-0672.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/aero-new3494-8501.jpg'
        ];

        $product_name=$this->faker->unique(true)->words($nb=3,$asText=True);
        $slug=Str::slug($product_name,'-');
        return [
            'name'=>$product_name,
            'slug'=>$slug,
            'short_description'=>$this->faker->text(200),
            'description'=>$this->faker->text(350),
            'regular_price'=>$this->faker->numberBetween(10,50000),
            'sale_price'=>$this->faker->numberBetween(5000,50000),
            'sku'=>'PRO'.$this->faker->unique()->numberBetween(100,500),
            'quantity'=>$this->faker->numberBetween(10,50),
            'image'=>$randomImages[rand(0, 20)],
            'category_id'=>$this->faker->numberBetween(1,7),
        ];
    }
}
