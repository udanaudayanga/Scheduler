@extends('layout.main')

@section('content')
<h1 class="mt-4">Schedule System</h1>
<h3 class="mt-3">Reserve Time Slot</h3>
<div class="row mt-4">
    <div class="col-auto">
        <label for="staticEmail2" class="visually-hidden">Reservation Date</label>
        <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Reservation Date">
      </div>
      <div class="col-auto">
        <label for="inputPassword2" class="visually-hidden">date</label>
        <input type="text" class="datepicker-here form-control digits" id="reserve_date" placeholder="YYYY-MM-DD">
      </div>
      <div class="col-auto">
        <a type="button" id="check_reserve_btn" data-url="{{ route('front.getslots') }}" class="btn btn-primary mb-3">Get Time Slots</a>
      </div>
</div>

<div id="reservations">
   
</div>

@endsection