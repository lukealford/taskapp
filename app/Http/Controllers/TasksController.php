<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Project;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TasksController extends Controller {

	protected $rules = [
		'name' => ['required', 'min:3'],
		'slug' => ['required'],
		'description' => ['required'],
	];
 

	/**
	 * Display a listing of the resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function index(Project $project)
	{
		

		return view('tasks.index', compact('project', 'activity'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function create(Project $project)
	{
		return view('tasks.create', compact('project'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Project $project
	 * @param \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function store(Project $project, Request $request)
	{
		$this->validate($request, $this->rules);
 
		$input = Input::all();
		$input['project_id'] = $project->id;
		Task::create( $input );
 
		return Redirect::route('projects.show', $project->slug)->with('Task created.');
	}
 

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function show(Project $project, Task $task)
	{
		return view('tasks.show', compact('project', 'task'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function edit(Project $project, Task $task)
	{
		return view('tasks.edit', compact('project', 'task'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @param \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function update(Project $project, Task $task, Request $request)
	{
		$this->validate($request, $this->rules);
 
		$input = array_except(Input::all(), '_method');
		$task->update($input);
 
		return Redirect::route('projects.tasks.show', [$project->slug, $task->slug])->with('message', 'Task updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function destroy(Project $project, Task $task)
	{
		$task->delete();

		return Redirect::route('projects.show', $project->slug)->with('message', 'Task Complete or Removed.');
	}

	 public function upload()
    {
        $file = Input::file('file');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = Validator::make($input, $rules);
        if ( $validator->fails()) {
            return Response::json(array('success' => false, 'errors' => $validator->getMessageBag()->toArray()));
        }
 
        $fileName = time() . '-' . $file->getClientOriginalName();
        $destination = public_path() . '/uploads/';
        $file->move($destination, $fileName);
 
        echo url('/uploads/'. $fileName);
    }

}