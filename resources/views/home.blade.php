@extends('app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<div class="panel-body">
					<div class="well well-lg">
						<h2 class="text-center">Welcome aboard {{ auth()->user()->email }}</h2>
					</div>
				</div>
			</section>
		</div>
	</div>
@endsection