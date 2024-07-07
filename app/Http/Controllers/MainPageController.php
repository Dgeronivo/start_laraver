<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MainPageController extends Controller
{
    public function index(Request $request)
    {
        return view('index', ['name' => $request->get('name')]);
    }
}
