<?php

namespace Tests\Unit;

use App\Mail\TestMail;
use App\Models\Factory;
use App\Models\User;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Mockery;
use Tests\TestCase;

class SendMailTest extends TestCase
{

    /** @test */
    public function user_should_receive_order_shipped_email()
    {
        Mail::fake();
        $factoryInput = [
            'name' => 'Test Factory',
            'email' => 'email@email.com',
            'address' => 'Uttara, Dhaka',
            'responsible_person' => 'Milon',
            'mobile_no' => '0173341009',
            'group_id' => $group->id ?? 1
        ];
        Factory::create($factoryInput);
        $user = User::factory()->create();
        $recipient = 'mizanur090148@gmail.com';
        $subject = 'This test mail';

        Mail::shouldReceive('send')
            ->with(
                'emails.emails.send_test_mail',
                Mockery::type('array'),
                Mockery::on(function (\Closure $closure) use ($subject, $recipient) {
                    $mock = Mockery::mock(Message::class);
                    $mock->shouldReceive('to')->once()->with($recipient)->andReturn($mock);
                    $mock->shouldReceive('subject')->once()->with($subject);

                    $closure($mock);

                    return true;
                }),
            )
            ->times(1);

        Mail::to('mizanur090148@gmail.com')->send(new TestMail('Body of the email'));
    }
}
