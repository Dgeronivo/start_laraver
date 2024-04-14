<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class HelloController extends Controller
{
    public function test(Request $request, int $id): array
    {
        $uri = \route('test-id', ['id' => 33, 'additional' => 'hello']);
        return ["test", $id, $uri,];
    }

    public function getOrder(): Response
    {
        return new Response('get Order');
    }

    public function createOrder(): Response
    {
        return new Response('create Order');
    }
}
