@extends('layout.main')

@section('content')
<h1 class="mt-4">Schedule System</h1>
<h3 class="mt-3">My Account</h3>
<h4>User ID: {{ $user_id }}</h4>
<div id="my_reservation" class="row mt-4">
    <table class="table">
        <thead>
          <tr>
            <th class="w-25" scope="col">DATE</th>
            <th scope="col">Reservations</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($reservs as $key => $reserv)
                <tr>
                    <th scope="row">{{ $key }}</th>
                    <td>
                        @foreach ($reserv as $res)
                            <label class="text-bg-secondary py-1 px-2 bg-opacity-75 rounded-1 mx-1" for="">{{ Str::substr($res->slot->time, 0 , 5) }} <a data-id="{{ $res->id }}" data-url="{{ route('front.delete') }}" title="Delete Reservation" class="link-danger text-decoration-none fw-bold ps-1 del_res" href="">X</a></label>
                        @endforeach                        
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>



@endsection