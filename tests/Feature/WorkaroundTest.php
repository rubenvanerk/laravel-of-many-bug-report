<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WorkaroundTest extends TestCase
{
    use RefreshDatabase;
    // This test passes if you comment out line no 85-87 in vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/Concerns/CanBeOneOfMany.php
    public function test_bug_report_workaround()
    {
        $this->seed();

        $cheapestProductHack = Brand::query()->first()->cheapestProductWorkaround;

        $this->assertTrue($cheapestProductHack->category->published);
    }

    // This test passes if you comment out line no 85-87 in vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/Concerns/CanBeOneOfMany.php
    public function test_bug_report_workaround_inverted()
    {
        $this->seed();

        foreach (Category::all() as $category) {
            $category->update(['published' => !$category->published]);
        }

        $cheapestProductHack = Brand::query()->first()->cheapestProductWorkaround;

        $this->assertTrue($cheapestProductHack->category->published);
    }
}
