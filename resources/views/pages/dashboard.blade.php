@extends('layouts.app')


@section('content')
	<div style="width:900px; margin:0 auto; min-height:200px; background-color:white; border:1px solid #d3e0e9; border-radius: 3px;">
		
		<div style="margin:16px">
			<h1 style="text-align:center;">Admin Dashboard</h1>

			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
					  	<th>Company</th>
					  	<th>Status</th>
					  	<th>View</th>
					</tr>
				</thead>
			  	<tbody>
			  		@foreach($forms as $form)
			  		<tr>
			  			<td>{{ $form->first_name }} {{ $form->last_name }}</td>
			  			<td>{{ $form->company_name }}</td>
			  			<td>
			  			@if($form->approved == 0)
			  				<span style="color:red;">Denied</span>
			  			@elseif($form->approved ==1)
			  				<span style="color:green;">Approved</span>
			  			@else
			  				<span style="color:#888888;">Review</span>
			  			@endif
			  			</td>
			  			<td><a href="review_form/{{ $form->id }}">View application</a></td>
			  		</tr>
			  		@endforeach
			  	</tbody>
			</table>
		</div>
	</div>

@endsection