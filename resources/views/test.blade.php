@extends('template')


@section('content')
	<p class="flow-text">Branch:</p>
	<p class="flow-text">Products Selling from a to b</p>
	<form action="#" method="POST">
		{{csrf_field()}}
		<ul class="collection">
			@foreach($results as $result)		
			<li class="collection-item">	
				{{$result->product_name}}<br>
				{{$result->product_reference}}<br>
				<p style="display:none" class="red-text">{{$result->product_id}}</p>
			 	<span>Sold:</span><span class="cyan-text">{{$result->quantity}}</span>		
				<div class="input-field secondary-content" style="margin-top: -20px;">
					<input type="number" name="send-quantity[]" id="send-quantity">
					<label for="send-quantity">Sending</label>
				</div>
					
				
			</li>	
			@endforeach
		</ul>
		<input type="submit" value="submit">
	</form>
@endsection











