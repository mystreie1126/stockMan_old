@extends('template')

@section('content')
<div class="container">
		@include('_includes.top.header')
			{{-- <h6>Branch:{{$results[0]->shopName}}</h6> --}}
			<h6>Sending at {{date(date("Y-m-d",time()))}}</h6>
		
			<div class="container">
				<table>
					<thead>
						<th>Name</th>
						<th>Barcode</th>
						<th>Send Quantity</th>
						<th>ddd</th>
					</thead>
					<tbody>
						@foreach($results as $result)
						<tr>
							<th>{{$result->name}}</th>
							<th>{{$result->reference}}</th>
							<th>{{$result->send_quantity}}</th>
							<th>{{$result->id}}</th>
						</tr>
						@endforeach
					</tbody>
				</table>
           </div>

      


       </div>


@endsection