@extends('layouts.app')

@section('content')


<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
	    Address
	    <span class="badge">Offered Price</span>
	  </li>
	@foreach($submissions as $submission)
	  <li class="list-group-item d-flex justify-content-between align-items-center">
	    {{$submission->address}}
	    <span class="badge badge-primary badge-pill">{{$submission->offer_price}}</span>
	  </li>
	@endforeach
</ul>

@endsection