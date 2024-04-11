<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Channel;
use Tests\TestCase;


class ChannelsControllerTest extends TestCase
{
    use WithFaker,  WithoutMiddleware, DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();
    }

    public function testPagination()
    {
        Channel::factory()->count(10)->create();

        $response = $this->get('/channels/pagination');

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $name = "abc" . $this->faker->word;
        $data = ['name' =>  $name, "slug" => $name];

        $response = $this->post('/channels/store', $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('channels', $data);
    }

    public function testUpdate()
    {
        $channel = Channel::factory()->create();

        $name = "abc" . $this->faker->word;

        $data = ['id' => $channel->id, 'name' => $name, "slug" => $name];

        $response = $this->put("/channels/update/{$channel->id}", $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('channels', array_merge(['id' => $channel->id], $data));
    }

    public function testDestroy()
    {
        $channel = Channel::factory()->create();

        $response = $this->delete("/channels/destroy/{$channel->id}");

        $response->assertStatus(200);
    }
}
