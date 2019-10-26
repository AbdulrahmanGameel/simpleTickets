
  <?php if(isset($_GET['id']))
          $id =$_GET['id'];
        else {
          $id =1;
        }
  ?>
  <legend>Available Tickets</legend>
  <div class="col-sm-10">
   
    
    {{ Form::open(['action'=>'TicketsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) }}
    <div class="form-group">
      {{Form::radio('type','1',['class'=>'form-control','placeholder'=>'Student'])}}    
      {{Form::label('student','Student')}}
      <span class="badge badge-primary badge-pill">{!!$events[$id-1]->rem_std!!}</span>
    </div>
    
    <div class="form-group">
      {{Form::radio('type','2',['class'=>'form-control','placeholder'=>'Normal'])}}    
      {{Form::label('normal','Normal')}}
      <span class="badge badge-primary badge-pill">{!!$events[$id-1]->rem_nrm!!}</span>
    </div>
    
    {!! Form::open(['action'=> ['TicketsController@store'], 'method'=>'POST', 'class'=>'text-center' ])!!}
        {{Form::hidden('event_id',$id)}}

        {{Form::hidden('_method','POST')}}
        {{Form::submit('Submit', ['class' => 'btn-primary btn'])}}
    {!! Form::close()!!}  
    
  </div>