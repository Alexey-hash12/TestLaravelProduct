@extends('layouts.app')

@section("title")
Profile|Page
@endsection

@section('content')
@if ($data)
<div class="container">
    <div class="row justify-content ">
        <iframe width="500" height="300" src="{{$data->link}}" frameborder="0" allowfullscreen class="dictation-video"></iframe>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Total dictation: {{$data->title}}</div>
                <div class="card-body">
                    <form action="{{ route('check') }}" method="post">
                    @csrf
                    <input type="hidden" name='data' value='{{$data->id}}' id='data'>
                     <textarea class="dictation-input form-control" name="text" placeholder="Print text here" id="text" cols="30" rows="10"></textarea>
                     <button type="submit" class='btn btn-danger dictation-btn'>Submit for review</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
No such dictation
@endif
@endsection
