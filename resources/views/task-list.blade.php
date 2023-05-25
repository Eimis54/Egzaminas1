@section('content')
@extends('layout')
<body>
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <h2>Tasks List</h2>
                <div style="margin-right:10px;float: right;"> 
                    <a href="{{url('add-status')}}" class="btn btn-primary">Add Status</a>
                </div>
                <div style="margin-right:10px;float: right;"> 
                    <a href="{{url('add-task')}}" class="btn btn-primary">Add Task</a>
                </div>
                <form method="post" action="{{route("task.search")}}">
                    @csrf
                    <div class="mb-3">
                        <select class="form-select" name="name">
                            <option {{($filter->status_id)?'':'selected'}} disabled>Select Status</option>
                        @foreach ($tasks as $task )
                            <option value="{{$task->status_id}}"{{($filter->status_id==$task->status_id)?'selected':''}}>{{$task->status_id}}</option>
                        @endforeach
                        </select>
                        </div>
                <button class="btn btn-info">Search</button>
                </form>
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
                </div>
        @endif
                <table class="table">
                    <thead><tr>
                    <th>#</th>
                    <th>Task name</th>
                    <th>Task Description</th> 
                    <th>Status</th>
                    <th>Action</th>
                    </tr></thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $taskD )
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$taskD->task_name}}</td>
                                <td>{{$taskD->task_description}}</td>
                                <td>{{$taskD->statuses}}</td>
                                <td><a href="{{url('edit-task/'.$taskD->id)}}" class="btn btn-primary">Edit</a>|<a href="{{url('delete-task/'.$taskD->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>