<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Wp;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

class EnglishController extends Controller
{

    public function index()
    {
        return 'Hello World!';
    }

    public function detail()
    {

    }
}
