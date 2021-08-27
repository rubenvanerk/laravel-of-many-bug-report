<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $brand = Brand::factory()->create();

        $publishedCategory = Category::factory()
            ->state(function (array $attributes) {
                return ['published' => true];
            })->create();

        Product::factory()
            ->state(function (array $attributes) use ($publishedCategory, $brand) {
                return [
                    'name' => 'Rubber duck',
                    'price' => 50,
                    'category_id' => $publishedCategory->id,
                    'brand_id' => $brand->id
                ];
            })->create();

        Product::factory()
            ->state(function (array $attributes) use ($publishedCategory, $brand) {
                return ['price' => 60, 'category_id' => $publishedCategory->id, 'brand_id' => $brand->id];
            })->create();

        Product::factory()
            ->state(function (array $attributes) use ($publishedCategory, $brand) {
                return ['price' => 70, 'category_id' => $publishedCategory->id, 'brand_id' => $brand->id];
            })->create();

        $unpublishedCategory = Category::factory()->create();

        Product::factory()
            ->state(function (array $attributes) use ($unpublishedCategory, $brand) {
                return [
                    'name' => 'Baseball',
                    'price' => 50,
                    'category_id' => $unpublishedCategory->id,
                    'brand_id' => $brand->id
                ];
            })->create();

        Product::factory()
            ->state(function (array $attributes) use ($unpublishedCategory, $brand) {
                return ['price' => 60, 'category_id' => $unpublishedCategory->id, 'brand_id' => $brand->id];
            })->create();

        Product::factory()
            ->state(function (array $attributes) use ($unpublishedCategory, $brand) {
                return ['price' => 70, 'category_id' => $unpublishedCategory->id, 'brand_id' => $brand->id];
            })->create();

        foreach (Category::all() as $category) {
            $category->update(['published' => !$category->published]);
        }
    }
}
