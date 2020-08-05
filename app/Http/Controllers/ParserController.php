<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParseUrlRequest;
use App\Jobs\ParseUrl;

class ParserController extends Controller
{
    public function index()
    {
        return view('parser.index');
    }

    public function add(ParseUrlRequest $request)
    {
        ParseUrl::dispatch($request->input('url'));

        return redirect()
            ->back()
            ->with('success', 'true');
    }
}
