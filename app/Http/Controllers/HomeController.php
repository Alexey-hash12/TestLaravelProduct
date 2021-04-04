<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DictationModel;
use Carbon\Carbon;

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
            $now = new Carbon();
            $dictation=DictationModel::where('status','=',1)->where('started_at', '<', $now)->where('finished_at', '>', $now)->first();
            return view('home', ["data" => $dictation]);
    }
}
