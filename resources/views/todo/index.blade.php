@extends('layouts.app')

@section('title', __('to do'))

@section('content')
{{--@include('essentials::layouts.nav_essentials')--}}
<section class="content">
	@component('components.filters', ['title' => __('filters'), 'class' => 'box-solid'])
{{--		@can('essentials.assign_todos')--}}
			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('user_id_filter', __('Assigned To') . ':') !!}
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-user"></i>
						</span>
						{!! Form::select('user_id_filter', [], null, ['class' => 'form-control select2', 'placeholder' => __('All')]); !!}
					</div>
				</div>
			</div>
{{--		@endcan--}}
		<div class="col-md-3">
			<div class="form-group">
				{!! Form::label('priority_filter', __('Priority') . ':') !!}
				{!! Form::select('priority_filter', [], null, ['class' => 'form-control select2', 'placeholder' => __('All')]); !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				{!! Form::label('status_filter', __('Status') . ':') !!}
				{!! Form::select('status_filter', [], null, ['class' => 'form-control select2', 'placeholder' => __('All')]); !!}
			</div>
		</div>
		<div class="col-md-3">
            <div class="form-group">
                {!! Form::label('date_range_filter', __('Date') . ':') !!}
                {!! Form::text('date_range_filter', '', ['placeholder' => __(''), 'class' => 'form-control', 'readonly']); !!}
            </div>
        </div>
	@endcomponent
	@component('components.widget', ['title' => __('Todo List'), 'icon' => '<i class="fas fa-clipboard"></i>', 'class' => 'box-solid'])
		@slot('tool')
			<div class="box-tools">
				<button class="btn btn-block btn-primary btn-modal" data-href="{{action([\App\Http\Controllers\ToDoController::class, 'create'])}}"
				data-container=".task_modal">
					<i class="fa fa-plus"></i> @lang( 'Add' )</a>
				</button>
			</div>
		@endslot
            <div class="custom-kanban-board show">
                <div class="page">
                    <div class="main">
                        <div class="meta-tasks-wrapper">
                            <div id="myKanban" class="meta-tasks"></div>
                        </div>
                    </div>
                </div>
            </div>
	@endcomponent


</section>
<div class="modal fade task_modal" tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
</div>

@endsection


{{--@section('javascript')--}}
{{--<script type="text/javascript">--}}
{{--	$(document).ready(function(){--}}

{{--        initializeProjectKanbanBoard();--}}

{{--        function getProjectListForKanban() {--}}

{{--            var kanbanDataSet = [];--}}
{{--            $.ajax({--}}
{{--                method: 'GET',--}}
{{--                dataType: 'json',--}}
{{--                // async: false,--}}
{{--                url: '/tasks',--}}

{{--                success: function(result) {--}}
{{--                    if (result.success) {--}}
{{--                        kanbanDataSet = result.projects_html;--}}
{{--                        console.log('results received');--}}
{{--                    } else {--}}
{{--                        toastr.error(result.msg);--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}

{{--            return kanbanDataSet;--}}
{{--        }--}}



{{--        function initializeProjectKanbanBoard() {--}}
{{--            //before creating kanban board, set div to empty.--}}
{{--            $('div#myKanban').html('');--}}
{{--            lists = getProjectListForKanban();--}}

{{--            KanbanBoard.prototype.run = function () {--}}
{{--                var _this = this;--}}
{{--                _this.lists = lists;--}}
{{--                var boards = lists.--}}
{{--                map(function (l) {return _this.listToKanbanBoard(l);}).--}}
{{--                map(function (b) {return _this.processBoard(b);});--}}
{{--                var kanbanTest = _this.initProjectKanban(boards, '#myKanban');--}}
{{--                $('.meta-tasks').each(function (i, el) {--}}
{{--                    return new PerfectScrollbar(el, { useBothWheelAxes: true });--}}
{{--                });--}}

{{--                // _this.setupUI(kanbanTest);--}}
{{--            };--}}

{{--            new KanbanBoard().run();--}}
{{--        }--}}

{{--        KanbanBoard.prototype.initProjectKanban = function (boards, jKanbanElemSelector) {--}}
{{--            var _this = this;--}}
{{--            var kanban = new jKanban({--}}
{{--                element: jKanbanElemSelector,--}}
{{--                gutter: '5px',--}}
{{--                widthBoard: '320px',--}}
{{--                dragBoards: false,--}}
{{--                click: function (el) {--}}
{{--                    //TODO: implement card clickable--}}
{{--                    // _this.listApi.--}}
{{--                    // getCard(el.dataset.eid).--}}
{{--                    // then(_this.openCardModal.bind(_this));--}}
{{--                },--}}
{{--                dragEl: function (el, source) {--}}
{{--                    $(el).addClass('dragging');--}}
{{--                    isDraggingCard = true;--}}
{{--                },--}}
{{--                dragendEl: function (el) {--}}
{{--                    $(el).removeClass('dragging');--}}
{{--                    isDraggingCard = false;--}}
{{--                },--}}
{{--                dropEl: function (el, target, source, sibling) {--}}
{{--                    var $el = $(el);--}}

{{--                    $el.closest('.kanban-drag')[0]._ps.update();--}}

{{--                    var $newParentStatus = $(target).parent('div.kanban-board').data('id');--}}
{{--                    var $status = $(el).attr('data-parentid');--}}

{{--                    //PROJECT MODULE:update status of project in db--}}
{{--                    if (!$('div.project-kanban-board').hasClass('hide')) {--}}
{{--                        if ($newParentStatus !== $status) {--}}
{{--                            var data = {--}}
{{--                                status : $newParentStatus,--}}
{{--                                project_id: $(el).data('eid')--}}
{{--                            };--}}

{{--                            // updateProjectStatusForKanban(data, $el);--}}
{{--                        }--}}
{{--                    }--}}
{{--                },--}}

{{--                addItemButton: false,--}}
{{--                boards: boards--}}
{{--            });--}}

{{--            initializeAutoScrollOnKanbanWhileCardDragging(kanban);--}}

{{--            return kanban;--}}
{{--        };--}}





{{--    });--}}
{{--</script>--}}
{{--@endsection--}}
