<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendMail;

class EmailController extends Controller
{
    public function sendMail()
    {
        $job = new SendMail();
        dispatch($job)->onQueue('default');
    }
}
