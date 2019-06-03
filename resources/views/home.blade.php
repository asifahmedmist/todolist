<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<!-- <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">TODO LIST</div>
                <div class="card-body">
                    
        <div id="sortable-div" class="col-md-12 addSub" style="display: inline-flex;">        
          <div class="padLR10"></div>
                      <div id="dragdrop" class="col-sm-4 col-xs-4 col-md-4">    
                        <div class="well clearfix">
                         
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-6"><p>To Do List</p></div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-primary btn-sm new_task" data-toggle="modal" data-target="#addNewTask">NEW TASK
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="dragbleList">
                            <ul class="sortable-list">
                            @foreach($tsk_todo as $todo_data)
                            <li class="sortable-item" sort_id="{{ $todo_data->sort_order }}" task_id="{{ $todo_data->id }}">
                                <div class="card">
                                  <div class="card-body">{{ $todo_data->task_title }}</div>
                                  <div class="row">
                                      <div class="col-md-6" style="padding-left: 30px;">
                                          <i class="fa fa-user fa-lg"></i>
                                          {{ isset($todo_data->user_data->name) ? $todo_data->user_data->name : '' }}
                                      </div>
                                      <div class="col-md-6">
                                        <i class="fa fa-clock-o fa-lg"></i>
                                          {{ date('d M Y', strtotime($todo_data->created_at)) }}
                                      </div>
                                  </div>
                                </div>
                            </li>
                            @endforeach
                            </ul>
                        </div>
                        </div>    
                      </div>
                    <div id="dragdrop" class="col-sm-4 col-xs-4 col-md-4">    
                        <div class="well clearfix">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-6"><p>IN WORK</p></div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-primary btn-sm new_task" data-toggle="modal" data-target="#addNewTask">NEW TASK
                                        </button>
                                    </div>
                                </div>
                            </div>
                                <ul class="sortable-list">
                                    <li class="sortable-item">Item51</li>
                                    <li class="sortable-item">Item52</li>   
                                    <li class="sortable-item">Item53</li>   
                                    <li class="sortable-item">Item54</li>                  
                                </ul>             
                        </div>
                    </div> 
 
                    <div id="dragdrop" class="col-sm-4 col-xs-4 col-md-4">        
                        <div id="my-timesheet" class="well clearfix">
                         <div class="header">
                             <div class="row">
                                    <div class="col-md-6"><p>DONE</p></div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-primary btn-sm new_task" data-toggle="modal" data-target="#addNewTask">NEW TASK
                                        </button>
                                    </div>
                                </div>
                         </div>
                            <ul class="sortable-list">
                                <li class="sortable-item">Item6</li>
                                <li class="sortable-item">Item7</li>    
                                <li class="sortable-item">Item8</li>    
                                <li class="sortable-item">Item9</li>          
                            </ul>
                        </div>  
                    </div>        
                </div>


                </div> <!-- cart body ends -->
            </div>
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

<script type="text/javascript">
$(document).ready(function(){
    // Example 1.3: Sortable and connectable lists with visual helper
      $('#sortable-div .sortable-list').sortable({
       connectWith: '#sortable-div .sortable-list',
        placeholder: 'placeholder',
        update: function (event, ui) {
            var data = $(this).sortable('serialize');
            var sortorder = (ui.item.attr('sort_id'));
            var task_id = (ui.item.attr('task_id'));
            // POST to server using $.post or $.ajax
            $.ajax({
                type: 'GET',
                url: "{{ url('home/updateSortorder') }}"+ '/'+ sortorder + '/' + task_id,
                success: function(data){
                    console.log(data);
                }
            });
        }
     });

    $(".submitTask").on( "click", function( event ) {
        $.ajax({
           type: 'GET',
           url: "{{ url('home/submitTask') }}",
           data: $('#addtask').serialize(),
           success: function(data){
                $('#addNewTask').modal('toggle');
                $(".sortable-list").append(data);
                $('html, body').animate({
                    scrollTop: $("#task_lists_todo").offset().top
                }, 1000)
                $("#task_title").val('');
                $("#task_status").val('');
            }
        });
    });  

});
</script>
