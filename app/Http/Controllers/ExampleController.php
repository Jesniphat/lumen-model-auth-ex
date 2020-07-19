<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function first() {
      return response()->json([
        'status' => true,
        'data' => 'YES'
      ], 200);
    }
}
