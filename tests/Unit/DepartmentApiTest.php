<?php

namespace Tests\Unit;

use App\Models\Factory;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Settings\Department;

class DepartmentApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Collection|Model|mixed
     */
    private $user;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp():void
    {
        parent::setUp();

        $input = [
            'name' => 'Test',
            'address' => 'Uttara, Dhaka',
            'responsible_person' => 'Mr Test',
            'email' => 'test@gmail.com',
            'mobile_no' => '0173300000'
        ];
        Factory::create($input);
        $this->user = User::factory()->create();

        //$this->actingAs($user, 'api');
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_list_department()
    {
        $message = Department::factory()->create();
        $response = $this->json('get','api/settings/departments');
        $response->assertSee($message->name);

    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_create_departments()
    {
        $input =  [
            'name' => 'Test',
            'slug' => 'test'
        ];
        $response = $this->json('post','api/settings/departments', $input);
        // $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'success',
            'data' => [
                'id',
                'name',
                'slug'
            ]
        ]);

    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_update_departments()
    {
       /* $input =  [
            'name' => 'Test',
            'slug' => 'test'
        ];
        $this->json('post', 'api/settings/departments', $input);*/
        $this->test_can_create_departments();
        $input =  [
            'name' => 'Test Demo',
            'slug' => str_slug('Test Demo')
        ];
        $response = $this->json('patch', 'api/settings/departments/1', $input);
        $response->assertStatus(200);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_delete_departments()
    {
        $message = Department::factory()->create();
        $response = $this->json('delete', 'api/settings/departments/' . $message->id);
        $response->assertStatus(200);
    }
}
