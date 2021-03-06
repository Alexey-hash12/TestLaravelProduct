<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DictationModel;
use App\Models\DictationResultModel;
use App\User;
use Carbon\Carbon;

class MainController extends Controller
{
    public function main() {
    	return view('main');
    }

    public function dictation($res_id) {
    	$data = DictationResultModel::where('id', '=', $res_id)->first();
    	$dict = DictationModel::where('title', '=', $data->title_of_dictation)->first();
    	return view('dictation', ["data" => $data, 'dict' => $dict]);
    }

    public function error() {
    	return view('errors/validation_error');
    }

    public function check(Request $request) {
    	$res = new DictationResultModel();
    	if ($res->where('user_email', auth()->user()->email)->count() == 0) {
    		$res->user_name = auth()->user()->name;
            $res->user_email = auth()->user()->email;
            $res->title_of_dictation = $request->data;
    		$res->text = $request->text;
    		$res->input_at = new Carbon();
    		$res->save();
    		return redirect('dictation/'.$res->id);
    	}
    	else {
    		return redirect(route("error"));
    	}
    }
}
