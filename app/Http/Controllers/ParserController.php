<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParseUrlRequest;

class ParserController extends Controller
{
    public function index()
    {
        return view('parser.index');
    }

    public function add(ParseUrlRequest $request)
    {
        
    }
}
