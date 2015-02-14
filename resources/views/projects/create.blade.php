@extends('app')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
    <h2>Create Project</h2>

    {!! Form::model(new App\Project, ['route' => ['projects.store']]) !!}
        @include('projects/partials/_form', ['submit_text' => 'Create Project'])
    {!! Form::close() !!}
  </div>
</div>
@endsection
@stop