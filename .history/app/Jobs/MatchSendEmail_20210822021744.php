<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\HelloEmail;

class MatchSendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $input = [
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'address' => 'Dhaka',
            'responsible_person' => 'Milon',
            'mobile_no' => '38756443'
        ];
        $i = 0;
        while($i <= 100000) {
          \DB::table('groups')->insert($input);
          $i++;
        }
       
        /* $email = new HelloEmail();
        Mail::to('test@test.com')->send($email); */
    }
}
