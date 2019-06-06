<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get all task with user assigned from database
        $alltasks = Task::with('user_data')->orderby('sort_order', 'asc')->get();

        $tsk_todo = array();
        $tsk_inwork = array();
        $tsk_done = array();

        foreach($alltasks as $data) {
            if($data->task_status == 0){
                $tsk_todo[] = $data;
            } elseif($data->task_status == 1) {
                $tsk_inwork[] = $data;
            } else {
                $tsk_done[] = $data;
            }
        }
        //dd($tsk_todo);

        return view('home', ['tsk_todo' => $tsk_todo, 'tsk_inwork'=> $tsk_inwork, 'tsk_done'=>$tsk_done]);
    }

    public function submitTask(Request $request){
        $tasks = $request->all();
        //echo '<pre>'.print_r($tasks, true).'</pre>'; exit;

        $tsk_model = new Task();

        $tsk_model->task_title  = $request->task_title;
        $tsk_model->task_status = $request->task_status;
        $tsk_model->created_by  = Auth::user()->id;
        $tsk_model->created_at  = \Carbon\Carbon::now();

        if($tsk_model->save() == true){
            $insertedId = $tsk_model->id;
            return view('show_newtask_ajax', ['tasks'=> $tasks, 'insertedId'=>$insertedId]);
        }
    }

    public function updateSortorder() {
        
        $tasks = Task::all();
        $id = Input::get('id');
        $sorting = Input::get('sorting');
        foreach ($tasks as $item) {
            return Task::where('id', '=', $id)->update(array('sort_order' => $sorting));
        }
    }

    public function updateTaskStatus() {
        $list_id = Input::get('list_id');
        $task_id = Input::get('task_id');

        if($list_id == 'sortable-todo') $list_type = 0;
        elseif($list_id == 'sortable-inwork') $list_type = 1;
        else $list_type = 2;

        return Task::where('id', '=', $task_id)->update(array('task_status' => $list_type));
    }
}
