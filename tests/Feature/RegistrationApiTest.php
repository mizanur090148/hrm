<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Group;
use App\Models\Factory;


class RegistrationApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp():void
    {
        parent::setUp();

        //$this->user = factory(User::class)->create();

        //$this->actingAs($user, 'api');
    }

    public function test_new_user_can_register()
    {
        //$this->withoutExceptionHandling();
        $group = Group::factory()->create();
        //$factory = Factory::factory()->create();

        $factoryInput = [
            'name' => 'Test Factory',
            'email' => 'email@email.com',
            'address' => 'Uttara, Dhaka',
            'responsible_person' => 'Milon',
            'mobile_no' => '0173341009',
            'group_id' => $group->id
        ];
        /*try {
            $factory = $this->post('api/settings/factories', $factoryInput);
            dd($factory->name);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }*/
        $factory = Factory::create($factoryInput);

        $input =  [
            'first_name' => 'Test',
            'last_name' => 'User',
            'mobile_no' => '01733714009',
            'email' => 'ttest@gmail.com',
            'password' => '123456',
            'confirmed_password' => '123456',
            'factory_id' => $factory->id ?? '1'
        ];

        $response = $this->post('api/register', $input);
        $response->assertStatus(200);
    }
}
