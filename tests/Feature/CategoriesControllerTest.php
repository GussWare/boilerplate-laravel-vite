<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Category;
use Tests\TestCase;


class CategoriesControllerTest extends TestCase
{
    use WithFaker,  WithoutMiddleware, DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();
    }

    public function testPagination()
    {
        Category::factory()->count(10)->create();

        $response = $this->get('/categories/pagination');

        $response->assertStatus(200);
    }

    public function testStore()
    {
        // Crear una categoría de prueba
        $data = ['name' =>  "abc" . $this->faker->word];

        $response = $this->post('/categories/store', $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('categories', $data);
    }

    public function testUpdate()
    {
        $category = Category::factory()->create();

        $categoryId = $category->id;

        $data = ['id' => $categoryId, 'name' => "abc" . $this->faker->word];

        $response = $this->put("/categories/update/{$categoryId}", $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('categories', array_merge(['id' => $category->id], $data));
    }

    public function testDestroy()
    {
        $category = Category::factory()->create();

        $response = $this->delete("/categories/destroy/{$category->id}");

        $response->assertStatus(200);
    }
}
