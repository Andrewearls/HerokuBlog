@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-9 card">
		<div class="card-body">
			@yield('page-content')
		</div>
	</div>
</div>
@endsection