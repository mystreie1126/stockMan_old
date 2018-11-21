@extends('template')

@section('content')
	<a href="/" class="btn waves-effect waves-light">Back to Home</a>
	<p class="flow-text">Branch: <span class="cyan-text">{{$condition['shop_name']}}</span></p>
		<p class="flow-text">Products Selling Record from: <span class="cyan-text">{{$condition['start_date']}}</span> to <span class="cyan-text">{{$condition['end_date']}}</span>
		</p>
		<p class="flow-text">{{count($sales_products)}} different products in total</p>
		<form action="/send" method="POST">
			{{csrf_field()}}
			<ul class="collection">
				@foreach($sales_products as $sales_product)
				{{-- @foreach($results as $result)		 --}}
				<li class="collection-item">	
					<span style="font-weight: bolder;">{{$sales_product->product_name}}</span><br>
					{{$sales_product->product_reference}}<br>
					<p style="display:none" class="red-text">{{$sales_product->product_id}}</p>
					<input type="hidden" name="id_product[]" value="{{$sales_product->product_id}}">
					<input type="hidden" name="id_shop[]" value="{{$sales_product->id_shop}}">
				 	<span>Sold:</span><span class="cyan-text">{{$sales_product->quantity}}</span>		
					<div class="input-field secondary-content" style="margin-top: -20px;">
						<input type="number" name="send_quantity[]" id="send-quantity">
						<label for="send-quantity">Sending</label>
					</div>
						
					
				</li>	
				@endforeach
			</ul>
		{{-- 	@foreach($sales_products as $product)
				
				
			@endforeach --}}
			<input type="submit" value="submit" class="btn waves-effect waves-light">
		</form>

@endsection 