<div class="modal fade" id="myEditModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-lg">

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

				<h4 class="modal-title" id="myModalLabel">Edit Task</h4>

			</div>

			{{ Form::open(['route' => ['tasks.update', $task->id],'method' => 'put'])}}

			<div class="modal-body">

				{{ Form::label('title', 'Title:', ['class' => 'col-md-2 control-label']) }}

					{{ Form::text('title', $task->title, ['class' => 'form-control']) }}</br>

				{{ Form::label('description', 'Description:', ['class' => 'col-md-2 control-label']) }}

					{{ Form::textarea('description', $task->description, ['class' => 'form-control', 'rows' => '5']) }}</br>

			</div>

			<div class="modal-footer">

				<div class="row">

					<div class="pull-right">

						{{ Form::button('Close', ['class' => 'btn btn-default btn-block', 'data-dismiss' => "modal" , 'type' => 'submit'])}}

					</div>

					<div class="pull-right">

						{{ Form::open(['route' => 'session.store', 'method' => 'post']) }}

							{{ Form::button('Save Changes', ['class' => 'btn btn-primary btn-block', 'type' => 'submit'])}}

						{{ Form::close() }}

					</div>

					<div class="pull-right">

						@if($task->completed_at == '-0001-11-30 00:00:00')

							{{ Form::open(['route' => ['tasks.completed', $task->id], 'method' => 'get']) }}

								{{ Form::button('Completed Task', ['class' => 'btn btn-success btn-block', 'type' => 'submit'])}}

							{{ Form::close() }}

						@else

							{{ Form::open(['route' => ['tasks.notcompleted', $task->id], 'method' => 'get']) }}

								{{ Form::button('Not Completed Task', ['class' => 'btn btn-warning btn-block', 'type' => 'submit'])}}

							{{ Form::close() }}

						@endif

					</div>

					<div class="pull-right">

						{{ Form::open(['route' => ['tasks.recyclebin', $task->id], 'method' => 'get']) }}

							{{ Form::button('Delete Task', ['class' => 'btn btn-danger btn-block', 'type' => 'submit'])}}

						{{ Form::close() }}

					</div>

				</div>

			</div>

			{{ Form::close() }}

		</div>

	</div>

</div>