<!-- /resources/views/projects/show.blade.php -->
@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p>
	        {!! link_to_route('projects.index', 'Back to Projects') !!} |
	        {!! link_to_route('projects.tasks.create', 'Create Task', $project->slug) !!}
	    </p>
		</div>
		<div class="col-md-8">
			<h2>Current Task's for {{ $project->name }}</h2>
			<p>You currently have <span class="badge">{{ $project->tasks->count() }}</span> tasks to complete.
		  @if ( !$project->tasks->count() )
		        Your project has no tasks.
		  @else
        <ul class="list-unstyled">
            @foreach( $project->tasks as $task )
                <li data-id="{{ $task->id }}">
                		<div class="panel panel-default">
                    	<div class="panel-body">
                    	{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $project->slug, $task->slug))) !!}  			
												
                       	<p class="pull-left">

													<a href="{{ route('projects.tasks.show', [$project->slug, $task->slug]) }}">{{ $task->name }}</a><br>
													{{ str_limit($task->description, $limit = 200, $end = '...') }}<br>
                       		Due: XX days
                       	</p>
                        <div id="project-info" class="pull-right">
                        		<div class="btn btn-sm btn-info">
                            	{!! link_to_route('projects.tasks.edit', '', array($project->slug, $task->slug), array('class' => 'fa fa-pencil')) !!}
														</div>
														<button type="submit" class="btn btn-sm btn-success">
											      	<i class="fa fa-check"></i>
											      </button>
											      

								        </div>
                   		{!! Form::close() !!}
                   		{!! Form::open(array('class' => 'form-inline task-timer', 'method' => 'PUT', 'route' => array('projects.tasks.update', $project->slug, $task->slug))) !!}  			
												<input type="text" id='Task{{ $task->id }}' type="timer"name="timer" class="form-control timer" placeholder="0 sec">
														
															<div class="btn btn-sm btn-warning start-timer-btn" data-id='Task{{ $task->id }}'><i class="fa fa-clock-o"></i></div>
															<div class="btn btn-sm btn-primary resume-timer-btn hidden" data-id='Task{{ $task->id }}'><i class="fa fa-clock-o"></i></div>
															<div class="btn btn-sm btn-warning pause-timer-btn hidden" data-id='Task{{ $task->id }}'><i class="fa fa-pause"></i></div>
															<button type="submit" class="btn btn-sm btn-danger remove-timer-btn hidden save-task-time" data-id='Task{{ $task->id }}'>Save Timer</button>
                   		{!! Form::close() !!}
                    </div>
                </li>
            @endforeach
        </ul>
    	@endif
  	</div>
  	<div class="col-md-4">
		<h2>Recent activity</h2>
  	</div>
</div>
@endsection


@stop