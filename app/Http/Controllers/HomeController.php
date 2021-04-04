<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DictationModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dictation = new DictationModel();
        $ldate = date('Y-m-d H:i:s');
        try {
            $dictation=$dictation->first();
            if ($ldate > $dictation->started_at and $ldate < $dictation->finished_at and $dictation->status) $res = $dictation;
            else $res = null; 
            return view('home', ["data" => $res]);

        } catch(\Exception $e) {
            return view('home', ['data' => null]);
        }
    }
}
