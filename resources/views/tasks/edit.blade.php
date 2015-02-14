<!-- /resources/views/tasks/edit.blade.php -->
@extends('app')
 
@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
    <h2>Edit Task "{{ $task->name }}"</h2>
 
    {!! Form::model($task, ['method' => 'PATCH', 'route' => ['projects.tasks.update', $project->slug, $task->slug]]) !!}
        @include('tasks/partials/_form', ['submit_text' => 'Edit Task'])
    {!! Form::close() !!}
  </div>
</div>
@endsection
@stop