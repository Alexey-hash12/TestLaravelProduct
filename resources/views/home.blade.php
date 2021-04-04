@extends('layouts.app')

@section("title")
Profile|Page
@endsection

@section('content')
@if ($data)
<div class="container">
    <div class="row justify-content" style="margin-right: 100px;">
        <iframe width="500" height="300" src="{{$data->link}}" frameborder="0" allowfullscreen style="position: absolute; right: 100px;"></iframe>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Total dictation: {{$data->title}}</div>
                <div class="card-body">
                    <form action="{{ route('check') }}" method="post">
                    @csrf
                    <input type="hidden" name='data' value='{{$data->id}}' id='data'>
                     <textarea class="form-control" style="resize:none;" name="text" placeholder="Print text here" id="text" cols="30" rows="10"></textarea>
                     <button type="submit" style="position: absolute; margin-top: 34px;" class='btn btn-danger'>Submit for review</button>
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
