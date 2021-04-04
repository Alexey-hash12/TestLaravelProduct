<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DictationModel;
use App\DictationResult;
use App\User;

class MainController extends Controller
{
    public function main() {
    	return view('main');
    }

    public function dictation($res_id) {
    	// echo $res_id;
    	$data = new DictationResult();
    	$data = $data->where('id', '=', $res_id)->first();
    	$dict = new DictationModel();
    	$dict = $dict->where('id', '=', $data->dictation_id)->first();
    	return view('dictation', ["data" => $data, 'dict' => $dict]);
    }

    public function error() {
    	return view('errors/validation_error');
    }

    public function check(Request $request) {
    	$res = new DictationResult();
    	if ($res->where('user_id', auth()->user()->id)->count() == 0) {
    		$res->user_id = auth()->user()->id;
    		$res->dictation_id = $request->data;
    		$res->text = $request->text;
    		$res->input_at = date('Y-m-d H:i:s');
    		$res->save();
    		return redirect('dictation/'.$res->id);
    	}
    	else {
    		return redirect("error");
    	}
    }
}
