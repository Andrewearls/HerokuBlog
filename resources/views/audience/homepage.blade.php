@extends('layouts.audience')

@section('page-content')
	@if(isset($team->store))
		@include('audience.shopping.store')
	@endif


@endsection