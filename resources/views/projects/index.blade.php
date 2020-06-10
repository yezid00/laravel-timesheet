@extends('layouts.app')

@section('content')

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="row">
						<div class="col">
							<h2>Project</h2>
						</div>
						<div class="col">
							<button type="button" class="btn btn-primary btn-create" data-toggle='modal' data-target='#createProject' >Create Project</button>
						</div>
					</div>
				<br>
				<div class="project">

					@if(count($projects)> 0)
					@foreach($projects as $project)
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="col">
										<a href="{{ route('projects.show',$project->id) }}">{{ $project->name }}</a>
									</div>
									<div class="col pro-del">
										{!! Form::open(['action'=>['ProjectController@destroy',$project->id],'method'=>'DELETE']) !!}
											{{ form::submit('Delete',['class'=>'btn btn-danger btn-sm']) }}
										{!! form::close() !!}
									</div>
								</div>
								
							</div>
							<div class="card-body">
								<p>{{ $project->description }}</p>
							</div>
						</div>
					@endforeach
				@else
					<h3>You have no Project</h3>
				@endif
				</div>
				{{-- Project modal --}}
					<div class="modal fade" id="createProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-sm" role="document">
						    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Create Project</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        {{ Form::open(['action'=>'ProjectController@store','method'=>'POST']) }}
							        <div class="form-group">
							        	{{ form::label('name','Project name') }}
							        	{{ form::text('name',null,['class'=>'form-control']) }}
							        	
							        </div>
							        <div class="form-group">
							        	{{ form::label('description','Description') }}
							        	{{ form::text('description',null,['class'=>'form-control']) }}
							        </div>
							        {{ form::submit('Create',['class'=>'btn btn-primary btn-create']) }}
							        {{ form::close() }}

							      </div>
						      
						    </div>
						  </div>
					</div>
				{{-- End of project modal --}}

				
			</div>
		
	</div>
				</div>
			</div>
		</div>		
@endsection