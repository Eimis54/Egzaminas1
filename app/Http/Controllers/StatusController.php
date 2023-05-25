<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Request $request){
        $filterS=$request->session()->get('filterStatus',(object)['name'=>null]);
        $data = Status::filter($filterS)->get();
       
        return view('task-list',['data'=>$data,'filterS'=>$filterS, 'statuses'=>Status::all()]);
    }
    public function addStatus(){
        return view('add-status',['status'=>Status::all()]);
    }
    public function saveStatus(Request $request){
        $request->validate([
            'name'=> 'required|max:16',
        ]);

        $name = $request->name;

        $stat = new Status();
        $stat -> name = $name;
        $stat ->save();

        return redirect()->back()->with('success','Status Added Successfully');
    }
    public function editStatus($id){
        $data = Status::where('id','=',$id)->first();
        return view('edit-status',compact('data'));
    }
    public function updateStatus(Request $request){
        $request->validate([
            'name'=> 'required|max:16',
        ]);
        $id = $request->id;    
        $name = $request->name;

    
        Status::where('id','=',$id)->update([
            'name'=>$name
        ]);
        return redirect()->back()->with('success','Status Updated Successfully');
    }
    public function deleteTask($id){
        Status::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Status Deleted Successfully');
    }
}
