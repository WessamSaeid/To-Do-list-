@extends('layouts.app')

@section('content')

<!-- Add New Task  -->
    <div class="card" >
        <div class="card-header">
            New Todo
        </div>

        <div class="card-body">
            <div class="form-group">
                <labe>Todo</label>
                <input type="text" class="form-control" id="taskName" placeholder="Enter task name" required>
            </div>
            <button class="btn btn-primary" id="taskAdd">Add</button>     
        </div>
    </div>
    <br>
    <br>

<!-- View TODO List -->

        
        <div class="card" >
        <div class="card-header">
             Todo List
        </div>

        <div class="card-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>To Do List</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                    <!-- TODO: Delete Button -->
                                    <form action="/task/{{ $task->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button>Delete Task</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
   
    

@endsection
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
           $(document).on('click','#taskAdd',function(){
            $.ajax({
                url:'http://127.0.0.1:8000/api/tasks',
                type: 'post',
                data: {"name":$('#taskName').val()},
                success: function(res){
                      console.log(res);
                    
                }
                });
         
        });
   

</script>