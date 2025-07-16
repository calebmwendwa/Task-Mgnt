<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ToDoController extends Controller
{

    public function __construct()
    {
        $this->priority_colors = [
            'low' => 'bg-green',
            'medium' => 'bg-yellow',
            'high' => 'bg-orange',
            'urgent' => 'bg-red'
        ];

        $this->status_colors = [
            'new' => 'bg-yellow',
            'in_progress' => 'bg-light-blue',
            'on_hold' => 'bg-red',
            'completed' => 'bg-green'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            try {
                $tasks = ToDo::all()->groupBy('priority');
                $priorities = ToDo::getTaskPriorities();
                $sorted_tasks = [];
                foreach ($priorities as $key => $value) {
                    if (!isset($tasks[$key])) {
                        $sorted_tasks[$key] = [];
                    } else {
                        $sorted_tasks[$key] = $tasks[$key];
                    }
                }

                $projects_html = [];
                foreach ($sorted_tasks as $key => $tasks) {
                    //get all the project for particular board(status)
                    $cards = [];
                    foreach ($tasks as $task) {


                        $edit = action('App\Http\Controllers\ToDoController@edit', $task->id);
                        $delete = action('App\Http\Controllers\ToDoController@destroy', $task->id);
                        $date = $task->created_at->format('Y-m-d');
                        $cards[] = [
                            'id' => $task->id,
                            'title' => $task->task,
                            'editUrl' => $edit,
                             'editUrlClass' => 'edit_a_project',
                             'deleteUrl' => $delete,
                             'deleteUrlClass' => 'delete_a_project',
                             'endDate' => $date

                        ];
                    }

                    //get all the card & board title for particular board(status)
                    $kanban_tasks[] = [
                        'id' => $key,
                        'title' => $key,
                        'cards' => $cards,
                    ];
                }

                $output = [
                    'success' => true,
                    'project_tasks' => $kanban_tasks,
                    'msg' => __('Updated Successfully')
                ];

            } catch (Exception $e) {
                \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

                $output = [
                    'success' => false,
                    'msg' => __('messages.something_went_wrong')
                ];
            }

            return $output;
        }
          return view('todo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $task_statuses = ToDo::getTaskStatus();
        $priorities = ToDo::getTaskPriorities();


        return view('todo.create', compact('task_statuses', 'priorities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if (request()->ajax()) {
            try {
                $input = $request->only(
                    'task',
                    'priority',
                );

                $to_dos = ToDo::create($input);

                $output = [
                    'success' => true,
                    'msg' => __('Task Created Successfully'),
                    'todo_id' => $to_dos->id
                ];
            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());

                $output = [
                    'success' => false,
                    'msg' => __('Something Went Wrong')
                ];
            }
            return $output;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $todo = ToDo::findOrFail($id);

        $task_statuses = ToDo::getTaskStatus();
        $priorities = ToDo::getTaskPriorities();

        return view('todo.edit', compact('todo', 'task_statuses', 'priorities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (request()->ajax()) {
            try {

                    $input = $request->only(
                        'task',
                        'priority',

                    );


                $todo = ToDo::findOrFail($id);


                $todo->update($input);

                $output = [
                    'success' => true,
                    'msg' => __('Task Updated Successfully')
                ];
            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());

                $output = [
                    'success' => false,
                    'msg' => __('Something Went Wrong')
                ];
            }

            return $output;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request()->ajax()) {
            try {
                ToDo::where('id', $id)
                    ->delete();

                $output = [
                    'success' => true,
                    'msg' => __('Task Deleted Successfully')
                ];
            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());

                $output = [
                    'success' => false,
                    'msg' => __('Something went wrong')
                ];
            }
            return $output;
        }

    }

    public function postTaskPriority($id)
    {
        try {
            $project_task = ToDo::findOrFail($id);

            $project_task->priority = request()->input('status');
            $project_task->save();

            $output = [
                'success' => true,
                'msg' => __('Success')
            ];
        } catch (Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());

            $output = [
                'success' => false,
                'msg' => __('Something Went Wrong')
            ];
        }

        return $output;
    }
}
