<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Notification;
use Tests\TestCase;


class NotificationsControllerTest extends TestCase
{
    use WithFaker,  WithoutMiddleware, DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();
    }

    public function testPagination()
    {
        Notification::factory()->count(1)->create();

        $response = $this->get('/notifications/pagination');

        $response->assertStatus(200);
    }

    public function testStore()
    {
        // Crear una categoría de prueba
        $data = ['title' =>  "abc" . $this->faker->word, 'message' => $this->faker->paragraph(1), 'category_id' => $this->faker->numberBetween(1, 3)];

        $response = $this->post('/notifications/store', $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('notifications', $data);
    }
}
