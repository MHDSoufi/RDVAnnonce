@extends('home')
@section('message')
<div class="row">
	@include('message.users', ['users' => $users])
	<div class="col-md-9">
		<div class="card">
			<div class="card-header">{{$user->name}}</div>
			<div class="card-body conversation">
				@foreach($msg as $message)
					<div class="row">
						<div class="col-md-10 {{ $message->from->id !== $user->id ? 'offset-md-2 text-right' : ''}}">
							<p>
								<strong>{{$message->from->id !== $user->id ? 'Moi' : $message->from->name }}</strong><br/>
								{{ $message->content }}
							</p>
						</div>
					</div>
				@endforeach
				@if($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<form action="{{route('storeM', $user->id)}}" method="post">
					@csrf
					<div class="form-group">
						<textarea name="content" placeholder="Ecriver Votre message" class="form-control"></textarea>
						<button class="btn btn-primary" type="submit">Envoyer</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


@stop