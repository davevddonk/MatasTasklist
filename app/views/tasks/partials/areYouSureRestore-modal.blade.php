<div class="modal fade" id="areYouSureRestore{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-md">

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

				<h4 class="modal-title" id="myModalLabel">Are you sure you want to restore this task?</h4>

			</div>

			<div class="modal-footer">

			{{ Form::open(['route' => ['tasks.restore', $task->id], 'method' => 'get']) }}

				{{ Form::button('Restore Task', ['class' => 'btn btn-success btn-block', 'type' => 'submit']) }}

			{{ Form::close() }}

			{{ Form::open(['route' => 'tasks.showrecyclebin', 'method' => 'get']) }}

				{{ Form::button('No', ['class' => 'btn btn-default btn-block', 'type' => 'submit'])}}

			{{ Form::close() }}

			</div>

		</div>

	</div>

</div>