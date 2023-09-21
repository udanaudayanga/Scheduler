@extends('layout.main')

@section('content')
<h1 class="mt-4">ADMIN</h1>
<h3 class="mt-3">Create Available Time Slots</h3>
<div class="row mt-4">
    <div class="col-auto">
        <label for="staticEmail2" class="visually-hidden">Schedule Date</label>
        <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Schedule Date">
      </div>
      <div class="col-auto">
        <label for="inputPassword2" class="visually-hidden">date</label>
        <input type="text" class="datepicker-here form-control digits" id="slot_date" placeholder="YYYY-MM-DD">
      </div>
      <div class="col-auto">
        <a type="button" id="check_btn" data-url="{{ route('admin.checkslot') }}" class="btn btn-primary mb-3">Check</a>
      </div>
</div>

<div id="results">
   
</div>

@endsection