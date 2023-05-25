<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
    <h2>Edit Task</h2>    
    @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
            </div>
    @endif
    <form method="post" action="{{url('update-task')}}">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="md-3">
                <label class="form-label">Task Name</label>
                <input type="text" class="form-control" name="task_name" placeholder="Enter Task Name" value="{{$data->task_name}}">
                @error('task_name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>
                @enderror
            </div>
            <div class="md-3">
                <label class="form-label">Task Description</label>
                <input type="text-area" class="form-control" name="task_description" placeholder="Enter Task Description" value="{{$data->task_description}}">
                @error('task_description')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>
                @enderror
            </div>
            <div class="md-3">
                <label class="form-label">Status Id</label>
                <input type="text" class="form-control" name="status_id" placeholder="Enter Status Id" value="{{$data->status_id}}">
                @error('status_id')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>
                @enderror
            </div><br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{url('task-list')}}" class="btn btn-danger">Back</a>
    </form>
            </div>
        </div>
    </div>
</body>
</html>