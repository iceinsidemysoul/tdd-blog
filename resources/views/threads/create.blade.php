@extends('layouts.app')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Forum Threads</div>
					<div class="panel-body">
						<form method="POST" action="/threads">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="title">Title:</label>
								<input name="title" id="title" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="body">Body:</label>
								<textarea name="body" id="body" rows="8" class="form-control"></textarea>
							</div>

							<button class="btn btn-primary" type="submit">Publish</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection