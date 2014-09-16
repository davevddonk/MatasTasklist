<div class="modal fade" id="myComplaintModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-lg">

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

				<h4 class="modal-title" id="myModalLabel">Add Complaint</h4>

			</div>

			<div class="modal-body">

			{{Form::open(['route' => ['tasks.complaint', $task->id],'method' => 'put'])}}

				{{ Form::label('title', 'Title:', ['class' => 'col-md-2 control-label']) }}

				</br>

					{{ Form::text('title', $task->title, ['class' => 'form-control', 'disabled']) }}

				</br>

				{{ Form::label('description', 'Description:', ['class' => 'col-md-2 control-label']) }}

					{{ Form::textarea('description', $task->description, ['class' => 'form-control', 'rows' => '5', 'disabled']) }}

				</br>

				{{ Form::label('complaint', 'Complaint:', ['class' => 'col-md-2 control-label']) }}

					{{ Form::textarea('Complaint', $task->complaint, ['class' => 'form-control', 'value' => 'complaint', 'name' => 'complaint', 'rows' => '5'])}}

				</div>

				<div class="modal-footer">

					<div class="pull-right">

						{{ Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => "modal" , 'type' => 'submit'])}}

					</div>

					<div class="pull-right">

						{{ Form::button('Save Changes', ['class' => 'btn btn-primary', 'type' => 'submit'])}}

					</div>

				</div>

			{{ Form::close()}}

		</div>

	</div>

</div>