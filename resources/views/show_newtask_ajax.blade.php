<div class="card" style="margin-top: 10px;">
  <div class="card-body">{{ $tasks['task_title'] }}</div>
  <div class="row">
      <div class="col-md-6" style="padding-left: 30px;">
          <i class="fa fa-user fa-lg"></i>
          {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
      </div>
      <div class="col-md-6">
        <i class="fa fa-clock-o fa-lg"></i>
            <?php $currentDate = date("Y-m-d"); ?>
            {{ date('d M Y', strtotime($currentDate)) }}
      </div>
  </div>
</div>
                                    