<?php

namespace Tests\Feature;

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BugReportTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_bug_report()
    {
        $this->seed();

        $cheapestProduct = Brand::query()->first()->cheapestProduct;

        $this->assertTrue($cheapestProduct->category->published);
    }
}
