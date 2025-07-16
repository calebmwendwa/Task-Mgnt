<div class="modal-dialog" role="document">
  <div class="modal-content">
    {!! Form::open(['url' => action([\App\Http\Controllers\ToDoController::class, 'update'], $todo->id), 'id' => 'task_form', 'method' => 'put']) !!}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">@lang( 'Edit Task' )</h4>
    </div>

    <div class="modal-body">
    	<div class="row">
    		<div class="col-md-12">
		        <div class="form-group">
		            {!! Form::label('task', __('Task Name') . ":*")!!}
		            {!! Form::text('task', $todo->task, ['class' => 'form-control', 'required']) !!}
		         </div>
		    </div>

			<div class="clearfix"></div>
			<div class="col-md-6">
		        <div class="form-group">
					{!! Form::label('priority', __('Priority') . ':') !!}
					{!! Form::select('priority', $priorities, $todo->priority, ['class' => 'form-control select2', 'required', 'placeholder' => __('Please Select'), 'style' => 'width: 100%;']); !!}
				</div>
			</div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('project', __('Project') . ':') !!}
                    {!! Form::select('project', [], null, ['class' => 'form-control select2', 'placeholder' => __('Please Select'), 'style' => 'width: 100%;']); !!}
                </div>
            </div>
    	</div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary ladda-button" data-style="expand-right">
      	<span class="ladda-label">@lang( 'Save' )</span>
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'Close' )</button>
    </div>

    {!! Form::close() !!}

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
