@extends('template')
@section('content')
@include('_includes.top.header')
<form action="/sales" method="POST">
	<h1 class="cyan-text">hey what's up</h1>
	<div class="input-field">
		<select name="shop_id">
			<option value="" disabled selected>Choose the Branch</option>
			@foreach($shops as $shop)
				<option value="{{$shop->id_shop}}">{{$shop->name}}</option>
			@endforeach
		</select>
	</div>

	<div class="input-field">
		<input type="text" class="datepicker" id="date" name="dateStart">
		<label for="date">Choose the start date:</label>
	</div>

	<div class="input-field">
		<input type="text" class="datepicker" id="date" name="dateEnd">
		<label for="date">Choose the end date</label>
	</div>
	<input type="submit" value="submit" class="btn waves-effect waves-light">
	{{csrf_field()}}
</form>
@endsection
