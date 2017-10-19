@extends('layouts.app')

@section('content')

	<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4> 
								<a href="{{ $thread->path() }}">
									{{ $thread->title }} 
								</a>
							</h4>
						</div>
						<div class="panel-body">
							<article>
								<div class="body"> {{ $thread->body }} </div>
							</article>
							<hr>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					@foreach ($thread->replies as $reply)

						@include('threads.reply')
		
					@endforeach
				</div>
			</div>

			@if (auth()->check())
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<form action="{{ $thread->path() . '/replies' }}" method="POST">

							{{ csrf_field() }}

							<div class="form-group">
								<textarea name="body" id="body" class="form-control" placeholder="Have something to say..."></textarea>
							</div>

							<button type="submit" class="btn btn-default"> Reply </button>
						</form>	
					</div>
				</div>
			@else
				<p class="text-center"> Please <a href="{{ route('login') }}"> Sing in </a> to participate in this discussion </p>
			@endif

		</div>

@endsection