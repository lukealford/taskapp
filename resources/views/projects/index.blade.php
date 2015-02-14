<!-- /resources/views/projects/index.blade.php -->
@extends('app')
 
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
		    <h2>Projects</h2>
		 		<p>
		        {!! link_to_route('projects.create', 'Create Project') !!}
		    </p>
		    @if ( !$projects->count() )
		        You have no projects
		    @else

		        <ul id="project-list" class="list-group ">
		            @foreach( $projects as $project )
		                <li class="list-group-item col-md-3">
		                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.destroy', $project->slug))) !!}
		                       		<div class="pull-left">
		                        		<a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a>
		                        	</div>

		                        		<div id="project-info" class="pull-right">
		                        			<p>{{ $project->tasks->count() }} tasks to complete</p>
			            
											            <div class="btn btn-sm btn-info">
			                            	{!! link_to_route('projects.edit', '', array($project->slug, $project->slug), array('class' => 'fa fa-pencil')) !!}
																	</div>
																	<button type="submit" class="btn btn-sm btn-danger">
														      	<i class="fa fa-trash-o"></i>
														      </button>
											          </div>
		                        
		                    {!! Form::close() !!}
		                </li>
		            @endforeach
		        </ul>
		    @endif
		 
		    
		  </div>
		</div>
	</div>

@endsection

@stop