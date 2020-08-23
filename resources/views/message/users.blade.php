<div class="col-md-3">
	<div class="list-group">
		@foreach($users as $user)
			<a href="{{route('showM', $user->id)}}" class="list-group-item">{{$user->name}}</a>
		@endforeach

	</div>
	
</div>