<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Factory;
use Tests\TestCase;

class FactoryApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    protected $user;

    public function setUp():void
    {
        parent::setUp();

        //$this->user = factory(User::class)->create();

        //$this->actingAs($user, 'api');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_list_factories()
    {
        $this->json('GET', 'api/settings/factories/')->assertStatus(200);
    }

    public function factory_input()
    {
        $formData = [
            'name' => 'Milon Data dfh gfg',
            'address' => 'Uttara, Dhaka',
            'responsible_person' => 'Atik',
            'email' => 'atik@gmail',
            'mobile_no' => '28356824',
            'group_id' => 1
        ];
        return $formData;
    }

    public function test_can_create_factory()
    {
        $this->json('POST', 'api/settings/factories', $this->factory_input())
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_show_factory()
    {
        $factory = Factory::create($this->factory_input());
        $this->json('GET', 'api/settings/factories/'. $factory->id)->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_delete_factory()
    {
        $factory = Factory::create($this->factory_input());
        $this->json('DELETE', 'api/settings/factories/'. $factory->id)->assertStatus(200);
    }
}
