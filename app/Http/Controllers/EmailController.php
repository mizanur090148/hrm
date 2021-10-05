<?php
namespace App\Http\Controllers;

use App\Jobs\MatchSendEmail;

class EmailController extends Controller
{
public function sendEmail()
{
    $emailJob = new MatchSendEmail();
    dispatch($emailJob);
}
}