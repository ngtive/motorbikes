<?php

namespace Tests\Feature;

use App\Models\Bike;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class StoreBike extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $login = $this->post(route('login'), ['email' => 'admin@gmail.com', 'password' => 'password']);
        $login->assertStatus(302);
        $login->assertLocation(route('home'));

        $bikeResponse = $this->post(route('bikes.store'), [
            'name' => 'Bike Test',
            'price' => 1,
            'weight' => 1,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'color_id' => 1,
        ]);

        $bike = Bike::where('name', 'Bike Test');
        $this->assertTrue($bike->exists(), "Test bike doesn't create");
        $deleteResponse = $this->delete(route('bikes.destroy', ['bike' => $bike->latest()->first()->id]));
        $this->assertTrue($bike->doesntExist(), 'Test bike deleting failed!');
    }
}
