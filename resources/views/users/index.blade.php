@extends('app')

@section('content')
	<div class="row" style="margin-top: 100px;">
		<div class="col-lg-12">
			<section class="panel panel-default">
				<div class="panel-heading">
					<a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Add</a>
				</div>
				<div class="panel-body">

					@include('vendor.flash.message')

					<table class="table table-striped">
						<thead>
						<tr>
							<td>No</td>
							<td>Email</td>
							<td>Name</td>
							<td>Phone</td>
							<td>Address</td>
							<td>Actions</td>
						</tr>
						</thead>
						<tbody>
						<?php $no=1; ?>
						@foreach($collection as $user)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->phone }}</td>
								<td>{{ $user->address }}</td>
								<td>
									<a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-warning">Edit</a>
									<a href="{{ route('users.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Delete</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>
@endsection