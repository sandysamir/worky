<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Startup;

class RequestController extends Controller
{
    public function startup()
    {
    //  $clients=Client::select('username')->get();
    $startups=\App\Startup::with('client')->get();

    //  $startups=startup::select('description','projectName')->get();
        return view('startup',compact('startups'));
        }
}
