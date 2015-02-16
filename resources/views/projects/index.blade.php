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
		                       		<a href="{{ route('projects.show', $project->slug) }}">
		                       			<img data-src="holder.js/100%x200" alt="100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjkzIiB5PSIxMDAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTFwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4yNDJ4MjAwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
		                       		</a>
		                       		<div class="pull-left">

		                        		<h2><small><a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a></small></h2>
		                        		<p>{{ $project->tasks->count() }} tasks to complete</p>
		                        	</div>

		                        		<div id="project-info" class="pull-right">
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