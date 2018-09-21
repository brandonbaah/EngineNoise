@extends('layouts.app')

@section('content')
	<div class="col-xs-4">
	<form action="/submissions" method="POST">
		  <div class="form-group">
		    <input type="text" class="form-control" name="address" aria-describedby="addressHelp" placeholder="Enter Property Address">
		    <small id="addressHelp" class="form-text text-muted">Please make sure to double check address for accuracy and proper recording.</small>
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" name="city" placeholder="City">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" name="state" placeholder="State">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" name="zip" placeholder="Zip">
		  </div>
		  <div class="form-group">
		    <input type="number" class="form-control" name="list_price" placeholder="List Price">
		  </div>
		  <div class="form-group">
		    <input type="number" class="form-control" name="offer_price" placeholder="Offer Price">
		  </div>
		  <div class="form-group">
		    <input type="number" class="form-control" name="market_value" placeholder="Market Value">
		  </div>
		  <input type="hidden" name="_token" value="{{ csrf_token() }}">

		  <div align='center'><button type="submit" class="btn btn-primary">Submit</button></div>
	</form>
	</div>
@endsection
