$(document).ready(function() {

    KanbanBoard.prototype.initTaskKanban = function (boards, jKanbanElemSelector) {
        var _this = this;
        var kanban = new jKanban({
            element: jKanbanElemSelector,
            gutter: '5px',
            widthBoard: '320px',
            dragBoards: true,
            dragItems: true,
            click: function (el) {
                //TODO: implement card clickable
                // _this.listApi.
                // getCard(el.dataset.eid).
                // then(_this.openCardModal.bind(_this));
            },
            dragEl: function (el, source) {
                $(el).addClass('dragging');
                isDraggingCard = true;
            },
            dragendEl: function (el) {
                $(el).removeClass('dragging');
                isDraggingCard = false;
            },
            dropEl: function (el, target, source, sibling) {
                var $el = $(el);

                $el.closest('.kanban-drag')[0]._ps.update();

                var $newParentStatus = $(target).parent('div.kanban-board').data('id');
                var $status = $(el).attr('data-parentid');

                //PROJECT MODULE:update status of task in db
                if (!$('.custom-kanban-board').hasClass('hide')) {
                    if ($newParentStatus !== $status) {
                        var data = {
                            project_id : $(el).data('project_id'),
                            status : $newParentStatus,
                            task_id: $(el).data('eid')
                        };

                         updateProjectTaskPriorityForKanban(data, $el);
                    }
                }
            },

            addItemButton: false,
            boards: boards
        });

        initializeAutoScrollOnKanbanWhileCardDragging(kanban);

        return kanban;
    };
    function initializeTaskKanbanBoard(argument) {
        //before creating kanban board, set div to empty.
        $('div#myKanban').html('');
        lists = getTaskListForKanban();

        KanbanBoard.prototype.run = function () {
            var _this = this;
            _this.lists = lists;
            var boards = lists.
            map(function (l) {return _this.listToKanbanBoard(l);}).
            map(function (b) {return _this.processBoard(b);});
            var kanbanTest = _this.initTaskKanban(boards, '#myKanban');
            $('.meta-tasks').each(function (i, el) {
                return new PerfectScrollbar(el, { useBothWheelAxes: true });
            });

            // _this.setupUI(kanbanTest);
        };

        new KanbanBoard().run();
    }



    function getTaskListForKanban() {

        var kanbanDataSet = [];
        $.ajax({
            method: 'GET',
            dataType: 'json',
            async: false,
            url: '/tasks',
            // data: data,
            success: function(result) {
                if (result.success) {
                    kanbanDataSet = result.project_tasks;
                } else {
                    toastr.error(result.msg);
                }
            }
        });

        return kanbanDataSet;
    }

    initializeTaskKanbanBoard();
    $(document).on('submit', 'form#task_form', function(e){
        e.preventDefault();
        var url = $('form#task_form').attr('action');
        var method = $('form#task_form').attr('method');
        var data = $('form#task_form').serialize();
        var ladda = Ladda.create(document.querySelector('.ladda-button'));
        ladda.start();
        $.ajax({
            method: method,
            dataType: "json",
            url: url,
            data:data,
            success: function(result){
                ladda.stop();
                if (result.success) {
                    $('.task_modal').modal("hide");

                    toastr.success(result.msg);

                    initializeTaskKanbanBoard();

                } else {
                    toastr.error(result.msg);
                }
            }
        });
    });

    $(document).on('click', '.edit_a_project', function() {
        var url  = $(this).data('href');
        $.ajax({
            method: "GET",
            dataType: "html",
            url: url,
            success: function(result){
                $('.task_modal').html(result).modal("show");
            }
        });
    });

    $(document).on('click', '.delete_a_project', function(e) {
        e.preventDefault();
        var url = $(this).data('href');
        swal({
            title: 'Are you Sure?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((confirmed) => {
            if (confirmed) {
                $.ajax({
                    method:'DELETE',
                    dataType: 'json',
                    url: url,
                    success: function(result){
                        if (result.success) {

                            toastr.success(result.msg);

                            initializeTaskKanbanBoard();
                        } else {
                            toastr.error(result.msg);
                        }
                    }
                });
            }
        });
    });

    function updateProjectTaskPriorityForKanban(data, el) {
        $.ajax({
            method: 'PUT',
            dataType: 'json',
            url: '/task/' + data.task_id + '/post-priority',
            data:data,
            success: function(result){
                if (result.success) {
                    $(el).attr('data-parentid', data.status);
                    toastr.success(result.msg);
                } else {
                    toastr.error(result.msg);
                }
            }
        });
    }


});
