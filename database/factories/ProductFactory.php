<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$faker = $this->faker;
		$name = $faker->name;
		return [
			'name' => $name,
			'slug' => Str::slug($name),// Tên sản phẩm -> ten-san-pham
			'meta_title' => $faker->text(20),
			'meta_description' => $faker->text(500),
			'description' => $faker->text(1000),
			'price' => $faker->numberBetween(100000000, 10000000000),
			'category_id' => rand(1, 10),
			'category_1' => rand(1, 5),
			'category_2' => rand(5, 8),
			'category_3' => rand(0, 1) == 0 ? 0 : rand(8, 10),
			'brand_id' => rand(1, 10)
		];
	}
}
