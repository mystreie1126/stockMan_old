
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Printing</title>
        <!-- Latest compiled and minified CSS -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" rel="stylesheet">

		
    </head>
    <body>
        <div class="container">
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
</html>



