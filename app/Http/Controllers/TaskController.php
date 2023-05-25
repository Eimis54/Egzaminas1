<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request){
        $filter=$request->session()->get('filterTask',(object)['task_name'=>null,'task_description'=>null,'status_id'=>null]);
        $data = Task::filter($filter)->get();
        
        $data = Task::orderBy('add_date','ASC')->get();
        return view('task-list',['data'=>$data,'filter'=>$filter, 'tasks'=>Task::all()]);
    }
    public function addTask(){
        return view('task-add',['tasks'=>Task::all()]);
    }
    public function saveTask(Request $request){
        $request->validate([
            'task_name'=> 'required',
            'task_description'=>'required',
            'status_id'=>'required'
        ]);

        $task_name = $request->task_name;
        $task_description = $request->task_description;
        $status_id = $request->status_id;

        $tsk = new Task();
        $tsk -> task_name = $task_name;
        $tsk -> task_description = $task_description;
        $tsk -> status_id = $status_id;
        $tsk ->save();

        return redirect()->back()->with('success','Task Added Successfully');
    }
    public function editTask($id){
        $data = Task::where('id','=',$id)->first();
        return view('edit-task',compact('data'));
    }
    public function updateTask(Request $request){
        $request->validate([
            'task_name'=> 'required',
            'task_description'=>'required',
            'status_id'=>'required'
        ]);
        $id = $request->id;    
        $task_name = $request->task_name;
        $task_description = $request->task_description;
        $status_id = $request->status_id;
    
        Task::where('id','=',$id)->update([
            'task_name'=>$task_name,
            'task_description'=>$task_description,
            'status_id'=>$status_id
        ]);
        return redirect()->back()->with('success','Task Updated Successfully');
    }
    public function deleteTask($id){
        Task::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Task Deleted Successfully');

    }
    public function search(Request $request){
        $filterStatus=new \stdClass();
        $filterStatus->status_id=$request->status_id;
     
        $request->session()->put('filterStatus',$filterStatus);
        return redirect()->back()->with('success','Search Was Successful');
    }
}
