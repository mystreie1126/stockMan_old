@extends('template')

@section('content')
<div class="container">
		@include('_includes.top.header')
			<h6>Branch:{{$results[0]->shopName}}</h6>
			<h6>Sending at {{date(date("Y-m-d",time()))}}</h6>
		
			<div class="container">
				<table>
					<thead>
						<th>Name</th>
						<th>Barcode</th>
						<th>Send Quantity</th>
					</thead>
					<tbody>
						@foreach($results as $result)
						<tr>
							<th>{{$result->name}}</th>
							<th>{{$result->reference}}</th>
							<th>{{$result->send_quantity}}</th>
						</tr>
						@endforeach
					</tbody>
				</table>
           </div>

           <a href="{{route('up')}}" class="btn waves-effect waves-light">Update the Record</a>



       </div>


@endsection