@extends('template')
@section('content')
@include('_includes.top.header')
<form action="{{route('sales')}}" method="POST">
	<h1 class="cyan-text">hey what's up</h1>
	<div class="input-field">
		<select name="shop_id">
			<option value="" disabled selected>Choose the Branch</option>
			@foreach($shops as $shop)
				<option value="{{$shop->id_shop}}">{{$shop->name}}</option>
			@endforeach
		</select>
	</div>

<div class="date-only">
	<div class="input-field input-date">
		<input type="text" class="datepicker" id="date" name="dateStart">
		<label for="date" class="cyan-text">Choose the start date:</label>
	</div>

	<div class="input-field input-date">
		<input type="text" class="datepicker" id="date" name="dateEnd">
		<label for="date" class="cyan-text">Choose the end date</label>
	</div>
</div>

<div class="time-only">
	<div class="input-field input-date">
		<input type="text" class="timepicker" id="time" name="timeStart">
		<label for="time" class="indigo-text">Choose the start time:</label>
	</div>

	<div class="input-field input-date">
		<input type="text" class="timepicker" id="time" name="timeEnd">
		<label for="time" class="indigo-text">Choose the end time</label>
	</div>
</div>

	<input type="submit" value="submit" class="btn waves-effect waves-light">
	{{csrf_field()}}
</form>
@endsection
