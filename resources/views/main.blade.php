@extends("layouts.app")

@section("title")
Main|Page
@endsection

@section("content")
@guest
<!-- Main Authorize -->
<div class="container">
	<span>Please <a href="{{ route('login') }}">Authorize</a> or <a href="{{ route('register') }}">Register</a> for working on the site </span>
</div>
<!-- End Main -->
@endguest
@endsection