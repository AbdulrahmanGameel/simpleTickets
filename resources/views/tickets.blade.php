<form action="TicketsController@store">
  <legend>Available Tickets</legend>
  <div class="col-sm-10">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="student" id="gridcheckboxs1" value="1">
      <label class="form-check-label" for="gridcheckbox1">
        Student 
      </label>
      <span class="badge badge-primary badge-pill">{!!$events[$_GET['id']-1]->rem_std!!}</span>

    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="normal" id="gridcheckbox2" value="1">
      <label class="form-check-label" for="gridcheckbox2">
        Normal
      </label>
      <span class="badge badge-primary badge-pill">{!!$events[$_GET['id']-1]->rem_nrm!!}</span>
      
      
      {{-- <script>
        if(1)
        document.getElementById("gridcheckbox1").disabled = true;
        // Auth::user()->id
      </script> --}}
    </div>
    <button type="submit"  value="Submit" class="btn btn-primary">Reserve</button>
    <div class="badge badge-primary badge-pill">      {!! auth()->user()->id!!}</div>
  </div>
</form>