	@extends('template')

@section('content')
	@include('_includes.top.header')
	<a href="/" class="btn waves-effect waves-light">Back to Home</a>
	<p class="flow-text">Branch: <span class="cyan-text">{{$condition['shop_name']}}</span></p>
		<p class="flow-text">Products Selling Record from: <span class="cyan-text">{{$condition['start_date']}}</span> to <span class="cyan-text">{{$condition['end_date']}}</span>
		</p>
		<p class="flow-text"> <span class="cyan-text">{{count($sales_products)}}</span> different products in total</p>
		<form action="/send" method="POST">
			{{csrf_field()}}
			@if($collect->count() == 0)
				<p class='flow-text indigo-text'>No Online Order Collection for this shop</p>
			@else
						<p class='indigo-text flow-text'>Replenishing through PickUp in Store:</p>
					<ul class="collection">
						@foreach ($collect as $c)
								<li class="collection-item">
									<span class='cyan-text'>{{$c->product_reference}}</span>
									<span>{{$c->product_name }}</span>
									<div class="secondary-content">
										<span class='cyan-text'>Collected quantity:</span>
										<span class='indigo-text' style="font-weight: bolder;">{{$c->qty}}</span>
									</div>
								</li>
						@endforeach
				</ul>
			@endif

				<p class='orange-text flow-text'>Replenishing through General Sale:</p>
			<ul class="collection">
				@foreach($sales_products as $sales_product)
				{{-- @foreach($results as $result)		 --}}
				<li class="collection-item">
					<span style="font-weight: bolder;">{{$sales_product->product_name}}</span><br>
					{{$sales_product->product_reference}}<br>
					<p style="display:none" class="red-text">{{$sales_product->product_id}}</p>
					<input type="hidden" name="id_product[]" value="{{$sales_product->product_id}}">

					<input type="hidden" name="id_shop[]" value="{{$sales_product->id_shop}}">

					<input type="hidden" name="time[]" value="{{date('Y-m-d H:i:s')}}">
				 	<span>Sold:</span><span class="cyan-text">{{$sales_product->quantity}}</span>
					<div class="input-field secondary-content" style="margin-top: -20px;">

						<input type="number" name="qty[]" id="send-quantity">
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
