@extends('layouts.app')

@section('content')
	<div style="width:900px; margin:0 auto; min-height:200px; background-color:white; border:1px solid #d3e0e9; border-radius: 3px;">
		<div style="margin:16px;">
			<h1>{{ $form->first_name }} {{ $form->last_name }}'s application</h1>
			@if($form->approved == 0)
			<span style="color:red;">Denied</span>
			@elseif($form->approved == 1)
			<span style="color:green;">Approved</span>
			@else
			<span style="color:#888;">Reviewing</span>
			@endif
			&nbsp;&nbsp;
			<a href="/uploads/{{ $form->file }}">View PDF</a>

			<table class="table">
				<thead>
					<tr>
					  	<th>Phone Number</th>
					  	<th>Address 1</th>
					  	<th>Address 2</th>
					  	<th>City/State/zip</th>
					  	<th>email</th>
					</tr>
				</thead>
			  	<tbody>
			  		<tr>
			  			<td>{{ $form->phone }}</td>
			  			<td>{{ $form->address1 }}</td>
			  			<td>{{ $form->address2 }}</td>
			  			<td>{{ $form->city }}/{{ $form->state }}/{{ $form->zip }}</td>
			  			<td>{{ $form->email }}</td>
			  		</tr>
			  	</tbody>
			</table>




			<h3>Company information</h3>
			<table class="table">
				<thead>
					<tr>
					  	<th>Company Name</th>
					  	<th>Address</th>
					  	<th>City</th>
					  	<th>Phone Number</th>
					</tr>
				</thead>
			  	<tbody>
			  		<tr>
			  			<td>{{ $form->company_name }}</td>
			  			<td>{{ $form->company_address }}</td>
			  			<td>{{ $form->company_city }}</td>
			  			<td>{{ $form->company_phone }}</td>
			  		</tr>
			  	</tbody>
			</table>

			<a href="/change_status/{{ $form->id }}/approve"><button class="btn btn-primary" style="margin-right:20px;">Approve</button></a>
			<a href="/change_status/{{ $form->id }}/deny"><button class="btn btn-danger">Deny</button></a>
			
		</div>
	</div>
@endsection