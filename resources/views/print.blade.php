@extends('template')

@section('content')
<div class="container">
		{{-- @include('_includes.top.header') --}}
			
		
			<div class="container">
				<h6>To {{$results[0]->shopname}} Branch, Sending at {{date(date("Y-m-d",time()))}}</h6>
				<table>
					<thead>
						<th>Barcode</th>
						<th>Name</th>
						<th>Send Quantity</th>
					</thead>
					<tbody>
						<form action="/update-stock" method="post">
							{{csrf_field()}}
							@foreach($results as $result)
								<tr>								
									<th>{{$result->reference}}</th>
									<th>{{$result->name}}</th>
									<th>{{$result->send_quantity}}</th>
								</tr>
								<input type="hidden" name="id_product[]" value="{{$result->id_product}}">
								<input type="hidden" name="id_shop[]" value="{{$result->id_shop}}">
								<input type="hidden" name="qty[]" value="{{$result->send_quantity}}">
							@endforeach
							<input type="submit" value="update the stock">
						</form>
					</tbody>
				</table>
           </div>

      


       </div>


@endsection