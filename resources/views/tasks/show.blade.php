@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
	    <h2>
	        {!! link_to_route('projects.show', $project->name, [$project->slug]) !!} -
	        {{ $task->name }}
	    </h2><hr>
	    <span class="label label-default">{{ $task->created_at }}</span>
	    
	    <p>{{ $task->description }}</p>
	  </div>
	</div>
</div>
@endsection