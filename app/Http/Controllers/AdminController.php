<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DictationModel;
use App\Models\DictationResultModel;
use App\Filters\DictationResultFilter;
use App\User;

function getting_query($query_s,$request) {
    if($request->filled('start_date')){
        $query_s->where('id','>=',$request->start_date);
    }
    if($request->filled('finish_date')){
        $query_s->where('id','<=',$request->finish_date);
    }
    if($request->filled('sorting_id')) {
        $query_s->orderBy('id', "DESC");
    }
    return $query_s;
}

class AdminController extends Controller
{
    public function home() {
		return view('admin/home');
    }
    
    public function users(Request   $request) {
        $query_s = User::query();
        getting_query($query_s,$request);
        return view("admin/users", ["datas" => $query_s->simplePaginate(5)]);
    }
  	public function dictation(Request $request) {
        $query_s = DictationModel::query();
        getting_query($query_s,$request);
    	return view("admin/dictation",['datas' => $query_s->simplePaginate(2)]);
    }
    public function dictation_result(Request $request) {
        $query_s = DictationResultModel::query();
        getting_query($query_s,$request);
    	return view("admin/dictation_result", ["datas" =>$query_s->simplePaginate(2)]);//'filter_data' => Dictatinall()
    }
    public function update_dictation(Request $request) {
        $object = DictationModel::where('id','=',$request->input("id"))->first();
        $object->title = $request->input("title");
        $object->link = $request->input("link");
        $object->status = $request->input("status");
        $object->started_at = $request->input("started_at");
        $object->finished_at = $request->input("finished_at");
        $object->save();
        return redirect(route('admin_dictation'));
    }

    public function create_dictation(Request $request) {
        $object = new DictationModel();
        $object->title = $request->input("title");
        $object->link = $request->input("link");
        $object->status = $request->input("status");
        $object->started_at = $request->input("started_at");
        $object->finished_at = $request->input("finished_at");
        $object->description = $request->input("description");
        $object->save();
        return redirect(route("admin_dictation"));
    }

    public function users_delete(Request $request) {
        User::where('id',$request->input("id"))->delete();
        return redirect(route('admin_users'));
    }

    public function dictation_result_delete(Request $request) {
        DictationResultModel::where('id', $request->input('id'))->delete();
        return redirect(route('admin_dictation_result'));
    }

}
