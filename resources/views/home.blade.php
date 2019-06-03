@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">TODO LIST</div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card_design">
                                <div class="list-header">
                                    <p>To Do List</p>
                                    <button class="btn btn-primary btn-sm new_task" data-toggle="modal" data-target="#addNewTask">NEW TASK</button>
                                </div>
                                <hr>
                                <div class="task_lists_todo">
                                    @foreach($tsk_todo as $todo_data)
                                        <div class="card">
                                          <div class="card-body">{{ $todo_data->task_title }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card_design">
                                <div class="list-header">
                                    <p>In Work</p>
                                    <button class="btn btn-primary btn-sm new_task">NEW TASK</button>
                                </div>
                                <hr>
                                <div class="task_lists_inwork">
                                    @foreach($tsk_inwork as $inwork_data)
                                        <div class="card">
                                          <div class="card-body">{{ $inwork_data->task_title }}</div>
                                        </div>     
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card_design">
                                <div class="list-header">
                                    <p>Done</p>
                                    <button class="btn btn-primary btn-sm new_task">NEW TASK</button>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Modal -->
                    <div id="addNewTask" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form id="addtask">
                                  <div class="form-group">
                                    <label for="formGroupExampleInput">Task Title</label>
                                    <input type="text" class="form-control" id="task_title" placeholder="Enter task title here.." name="task_title">
                                  </div>
                                  <div class="form-group">
                                    <label for="formGroupExampleInput2">Task Status</label>
                                    <select id="task_status" class="form-control" name="task_status">
                                        <option selected>Seelct Status</option>
                                        <option value="0" selected="selected">New Task</option>
                                        <option value="1">In Work</option>
                                        <option value="2">Done</option>
                                      </select>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary submitTask">Save changes</button>
                              </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(".submitTask").on( "click", function( event ) {
            $.ajax({
               type: 'GET',
               url: "{{ url('home/submitTask') }}",
               data: $('#addtask').serialize(),
               success: function(data){
                    $('#addNewTask').modal('toggle');
                    $(".task_lists_todo").append(data);
                    $('html, body').animate({
                        scrollTop: $(".task_lists_todo").offset().top
                    }, 1000)
                    $("#task_title").val('');
                    $("#task_status").val('');
                }
            });
        });

    });
    
</script>
@endsection
