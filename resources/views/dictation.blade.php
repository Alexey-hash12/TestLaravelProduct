@extends("layouts.app")

@section("title")
Dictation|Page
@endsection

@section("content")
<div class="container">
	<div class="col-md-8">
            <div class="card">
                <div class="card-header">Total dictation: {{$dict->title}}</div>
                <div class="card-body">                
                     <textarea class="dictation-input form-control" name="text" readonly="true" placeholder="{{$data->text}}" id="text" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
      <div class="ml-3 mt-2">
     <span>Dectation Date: {{$dict->started_at}} - {{$dict->finished_at}}</span>   <br>
     <span>Dectation Passed Date: {{$data->input_at}}</span>
 </div>
</div>
@endsection