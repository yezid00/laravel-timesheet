@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
		<div class="card-header">
			<h3>{{ $project->name }}</h3>

			<button class="btn btn-outline-primary btn-sm btn-task" data-toggle='modal' data-target='#addTask' name="add" value="{{ $project->id }}">Add Task</button>
		</div>

			@foreach($project->tasks as $task)
				<div class="card-body">
					<div class="breadcrumb">
						<div class="breadcrumb-item">
							<div class="row">
								<div class="col">
									{{ $task->name }}
								</div>
								<div class="col task-del">
									{!! Form::open(['action'=>['TaskController@destroy',$task->id],'method'=>'DELETE']) !!}
									{{ form::submit('Delete',['class'=>'btn btn-danger btn-sm btn-del']) }}
									{!! form::close() !!}	
								</div>
							</div>
						</div>
					</div>
					
				</div>
			@endforeach
		{{-- Task modal --}}
					<div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-sm" role="document">
						    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Add a Task</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	{{-- @foreach($projects as $project) --}}
								        {{ Form::open(['action'=>['TaskController@store',$project->id],'method'=>'POST']) }}
								        <div class="form-group">
								        	{{ form::text('name',null,['class'=>'form-control']) }}
								        </div>
								        {{ form::submit('Add task',['class'=>'btn btn-primary btn-create']) }}
								        {{ form::close() }}
							        {{-- @endforeach --}}
							      </div>
						      
						    </div>
						  </div>
					</div>
			</div>
		</div>
	</div>
	
				{{-- End of Task modal --}}
@endsection