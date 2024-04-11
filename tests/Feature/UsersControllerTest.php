<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use Tests\TestCase;


class UsersControllerTest extends TestCase
{
    use WithFaker,  WithoutMiddleware, DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();
    }

    public function testPagination()
    {
        User::factory()->count(10)->create();

        $response = $this->get('/users/pagination');

        $response->assertStatus(200);
    }

    public function testStore()
    {
        // Crear una categoría de prueba
        $data = [
            'name' =>  $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password,
            'channels' => [
                1,2
            ],
            'categories' => [
               2,3
            ],
        ];

        $response = $this->post('/users/store', $data);

        $response->assertStatus(200);
    }
    public function testUpdate()
    {
        $dataDB = User::factory()->create();

        $id = $dataDB->id;

        $data = [
            'id' => $id, 
            'name' =>  $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password,
            'channels' => [
                1,3
            ],
            'categories' => [
               1,2
            ],
        ];

        $response = $this->put("/users/update/{$id}", $data);

        $response->assertStatus(200);
    }

    public function testDestroy()
    {
        $dataDB = User::factory()->create();

        $response = $this->delete("/users/destroy/{$dataDB->id}");

        $response->assertStatus(200);
    }
}
