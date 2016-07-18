@extends('app')

@section('content')
	<div class="row" style="margin-top: 100px;">
		<div class="col-lg-8">
			<section class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add new category</h3>
				</div>
				<div class="panel-body">
					@include('vendor.flash.message')
					<form class="form-horizontal" action="{{ route('users.update', ['id' => $user->id]) }}" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="put">

						<div class="form-group">
							<label class="control-label col-md-2">Email</label>
							<div class="col-md-7">
								<input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">name</label>
							<div class="col-md-7">
								<input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">phone</label>
							<div class="col-md-7">
								<input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Address</label>
							<div class="col-md-7">
								<input type="text" name="address" class="form-control" value="{{ $user->address }}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-5 col-md-offset-2">
								<button type="submit" class="btn btn-sm btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>
@endsection